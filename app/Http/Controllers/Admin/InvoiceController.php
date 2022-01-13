<?php

namespace App\Http\Controllers\Admin;
use App\Models\Invoice;
use App\Models\Invoicedetail;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\PaymentDetail;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\order_details;
use Illuminate\Http\Request;
use Cart;
use Auth;
use Barryvdh\DomPDF\Facade as PDF;
// use Illuminate\Support\Facades\Storage;
use DB;
use Exception;

use Illuminate\Contracts\Validation\Validator;

use Illuminate\Support\Facades\Validator as FacadesValidator;

class InvoiceController extends Controller
{
    protected $product_find;

    public function createinvoice(Request $request)
    {
        $inputs = $request->except('_token');
        // $rules = [
        //   'customer_id' => 'required | integer',
        // ];
        // // $customMessages = [
        //     'customer_id.required' => 'Select a Customer first!.',
        //     // 'customer_id.integer' => 'Invalid Customer!.'
        // ];
        // $validator = Validator::make($inputs, $rules, $customMessages);
        // if ($validator->fails())
        // {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        $customer_id = $request->input('customer_id');
        $customer = Customer::findOrFail($customer_id);
        $contents = Cart::content();
        // $company = Setting::latest()->first();
        return view('admin.sale.invoice', compact('customer', 'contents'));
    }

    public function print($customer_id)
    {
        $customer = Customer::findOrFail($customer_id);
        $contents = Cart::content();
        // $company = Setting::latest()->first();
        return view('admin.sale.print', compact('customer', 'contents'));
    }

    public function pending_order()
    {
        $pendings = Order::latest()->with('customer')->where('order_status', 'pending')->get();
        return view('admin.sale.pending_orders', compact('pendings'));
    }
    public function final_invoice(Request $request)
    {
        $inputs = $request->except('_token');
        // $rules = [
        //   'payment_status' => 'required',
        //   'customer_id' => 'required | integer',
        // ];
        // $customMessages = [
        //     'payment_status.required' => 'Select a Payment method first!.',
        // ];

        // $validator = Validator::make($inputs, $rules, $customMessages);
        // if ($validator->fails())
        // {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        $sub_total = str_replace(',', '', Cart::subtotal());
        $tax = str_replace(',', '', Cart::tax());
        $total = str_replace(',', '', Cart::total());

        $pay = $request->input('pay');
        $due = $total - $pay;

        $order = new order();
        $order->customer_id = $request->input('customer_id');
        $order->payment_status = $request->input('payment_status');
        $order->pay = $pay;
        $order->due = $due;
        $order->order_date = date('Y-m-d');
        $order->order_status = 'pending';
        $order->total_products = Cart::count();
        $order->sub_total = $sub_total;
        $order->vat = $tax;
        $order->total = $total;
        $order->save();

        $order_id = $order->id;
        $contents = Cart::content();

        foreach ($contents as $content)
        {
            $order_detail = new order_details();
            $order_detail->order_id = $order_id;
            $order_detail->product_id = $content->id;
            $order_detail->quantity = $content->qty;
            $order_detail->unit_cost = $content->price;
            $order_detail->total = $content->total;
            $order_detail->save();
        }

        Cart::destroy();

        // Toastr::success('Invoice created successfully', 'Success');
        $this->RespondWithSuccess('Invoice created successfully');
        return redirect()->route('order.pending');


    }

    public function show($id)
    {
        $order = Order::where('id', $id)->first();
        //return $order;
        $order_details = order_details::with('product')->where('order_id', $id)->get();
        //return $order_details;
        // $company = Setting::latest()->first();
        return view('admin.sale.order_confirmation', compact('order_details', 'order'));

    }
    public function order_print($order_id)
    {
        $order = Order::where('id', $order_id)->first();
        //return $order;
        $order_details = order_details::with('product')->where('order_id', $order_id)->get();
        //return $order_details;
        // $company = Setting::latest()->first();
        return view('admin.sale.pdf', compact('order_details', 'order',));
    }
    public function delete($id)
    {
        Order::findOrFail($id)->delete();
        $this->RespondWithSuccess('Delete invoice successfully');
        // return redirect()->route('order.pending');
        return redirect()->back();
    }



    public function index()
    {
        $products = Product::with('category')->get();
        $customers = Customer::all();
        $cart_products = Cart::content();

        return view(
            'admin.sale.sale',
            compact('products', 'customers', 'cart_products')
        );
    }


    public function productSearch(Request $request)
    {

        try {
            if ($request->has('term')) {
                $product_search = Product::where(
                    'product_name',
                    'LIKE',
                    '%' . $request->input('term') . '%'
                )->get();

                return response()->json($product_search);
            }
        } catch (Exception $e) {
            return $this->RespondWithEorror(
                'product search not successful ',
                $e->getMessage(),
                400
            );
        }
    }

    public function create(Request $request)
    {
        $inputs = $request->except('_token');
        $rules = [
            'customer_id' => 'required | integer',
        ];
        $customMessages = [
            'customer_id.required' => 'Select a Customer first!.',
            'customer_id.integer' => 'Invalid Customer!.',
        ];
        $validator = Validator::make($inputs, $rules, $customMessages);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $customer_id = $request->input('customer_id');
        $customer = Customer::findOrFail($customer_id);
        $contents = FacadesCart::content();
        return view('admin.invoice', compact('customer', 'contents'));
    }

    public function destroy($id)
    {
        $invoice = Invoice::find($id);
        InvoiceDetail::where('invoice_id', $invoice->id)->delete();
        Payment::where('invoice_id', $invoice->id)->delete();
        PaymentDetail::where('invoice_id', $invoice->id)->delete();
        $invoice->delete();
        if ($invoice) {
            return response()->json(
                [
                    'success' => true,
                    'message' => ' invoice  Deleted Successful',
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'error' => true,
                    'message' => ' invoice not Deleted',
                ],
                400
            );
        }
    }

    public function getPending()
    {
        $invoice = Invoicedetail::where('status', 0)
            ->orderBy('id', 'desc')
            ->get();

        return $this->RespondWithSuccess(
            'All Invoice view  successful',
            $invoice,
            200
        );
    }
    public function addCard(Request $request)
    {
        $inputs = $request->except('_token');
        $rules = [
            'id' => 'required | integer',
            'product_name' => 'required',
            'quantity' => 'required',
            'seling_price' => 'required',
        ];
        $validator = FacadesValidator::make($inputs, $rules);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $id = $request->input('id');
        $product_name = $request->input('product_name');
        $quantity = $request->input('quantity');
        $seling_price = $request->input('seling_price');

        $add = Cart::add([
            'id' => $id,
            'name' => $product_name,
            'qty' => $quantity,
            'price' => $seling_price,
            'weight' => 1,
        ]);
        if ($add) {
            $this->RespondWithSuccess(
                'Product successfully added to cart',
                'Success'
            );
            return redirect()->back();
        } else {
            $this->RespondWithEorror('Product not added to cart', 'Error');
            return redirect()->back();
        }
    }
    public function updateCard()
    {
    }
    public function UpdateQty($rowId, $qty)
    {
        Cart::update($rowId, ['qty' => $qty]);
        return response()->json('Successfully Updated!');
    }
    public function RemoveProduct($rowId)
    {
        Cart::remove($rowId);
        return response()->json('Success!');
    }
}
