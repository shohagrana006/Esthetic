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
use Illuminate\Http\Request;
use Auth;
use DB;
use Exception;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\DB as FacadesDB;

class InvoiceController extends Controller
{
    protected  $product_find;

    public function index()
    {
        
        $invoice =Invoice::orderBy('id','desc')->get();
        return $this->RespondWithSuccess('All invoice view  successful', $invoice, 200);
    }


    public function productSearch($sku)
    {
        try {

            $product_search=$this->product_find = Product::where('sku', 'LIKE', '%' . $sku . '%')->get();

            return $this->RespondWithSuccess(
                'product search view successful',
                $product_search,
                200
            );
        } catch (Exception $e) {
            return $this->RespondWithEorror(
                'product search not successful ',
                $e->getMessage(),
                400
            );
        }
    }





    public function create()
    {
        //
    }





    public function store(Request $request)
    {
        $randomNumber =mt_rand(100000, 888888) ;
        // $product=array();
        // $search=$this->product_find;
        // array_push($product,$search);

        try {
            $invoice = new Invoice ();
            $date = Carbon::now();

            $invoice->invoice_no = $randomNumber;
            $invoice->date = $date->format('Y-m-d');
            $invoice->description = $request->description;
            $invoice->status = 0;
            $invoice->created_by =FacadesAuth::id();
            $invoice->save();


            FacadesDB::transaction(function() use($request, $invoice){
                $product=array($request->product);
                if($invoice->save()) {
                    $date = Carbon::now();
                    $product_id = count ($product);

                    for ($i = 0; $i < $product_id; $i++) {
                        $invoice_details = new InvoiceDetail();
                        $invoice_details->date = $date->format('Y-m-d');
                        $invoice_details->invoice_id = $invoice->id;
                                                
                        $invoice_details->product_id = $request->product_id[$i];
                        $invoice_details->selling_quantity = $request->selling_quantity[$i];
                        $invoice_details->unit_price = $request->unit_price[$i];
                        $invoice_details->selling_price = $request->selling_price[$i];
                        $invoice_details->status = 0;
                        $invoice_details->save();
                    }}

                    if($request->customer == '0') {
                        $customer = new Customer();
                        $customer->customer_name = $request->customer_name;
                        $customer->customer_email = $request->customer_email;
                        $customer->customer_phone_number = $request->customer_phone_number;
                        $customer->customer_about_info = $request->customer_about_info;
                        $customer->save();
                        $customer_id = $customer->id;
                    } else {
                        $customer_id = $request->customer_id;
                    }

                    $payment = new Payment();
                    $payment_details = new PaymentDetail();
                    $payment->invoice_id = $invoice->id;
                    $payment->customer_id = $customer_id;
                    $payment->paid_status = $request->paid_status;
                    $payment->total_amount = $request->estimated_amount;
                    $payment->discount_amount = $request->discount_amount;

                    if($request->paid_status == 'full_paid')
                    {
                        $payment->paid_amount = $request->estimated_amount;
                        $payment->due_amount = '0';
                        $payment_details->current_paid_amount = $request->estimated_amount;
                    } else if($request->paid_status == 'full_due')
                    {
                        $payment->paid_amount = '0';
                        $payment->due_amount = $request->estimated_amount;
                        $payment_details->current_paid_amount = '0';
                    } else if($request->paid_status == 'partial_paid')
                    {
                        $payment->paid_amount = $request->paid_amount;
                        $payment->due_amount = $request->estimated_amount - $request->paid_amount;
                        $payment_details->current_paid_amount = $request->paid_amount;
                    }

                    $payment->save();
                    $payment_details->invoice_id = $invoice->id;
                    $payment_details->date = date('Y-m-d', strtotime($request->date));
                    $payment_details->save();



            });
            return $this->RespondWithSuccess(
                'Invoice create successful',
                $invoice,
                200
            );
        } catch (Exception $e) {
            return $this->RespondWithEorror(
                'Invoice created not successful  ',
                $e->getMessage(),
                400
            );
        }
    }

    
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
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
        $invoice = Invoicedetail::where('status', 0)->orderBy('id', 'desc')->get();
        
        return $this->RespondWithSuccess(
            'All Invoice view  successful',
            $invoice,
            200
        );
    }

}
