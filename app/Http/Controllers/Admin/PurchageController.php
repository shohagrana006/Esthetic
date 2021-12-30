<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Product;
use App\Models\Purchage;
use App\Models\Supplier;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PurchageController extends Controller
{
    public function index()
    {
        $purchases = Purchage::with(
            'supplier',
            'warehouse',
            'product',
            'branch'
        )
            ->orderBy('id', 'desc')
            ->get();
        return view('admin.purchase.purchase', compact('purchases'));
    }
    public function create()
    {
        $suppliers = Supplier::all();
        $warehouses = Warehouse::all();
        $products = Product::all();
        $branchs = Branch::all();
        return view(
            'admin.purchase.addpurchase',
            compact('suppliers', 'warehouses', 'products', 'branchs')
        );
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'purchase_date' => 'required',
            'purchage_quantity' => 'required',
            'purchage_unit_price' => 'required',
            'parchage_payable_amount' => 'required',
            'parchage_due_amount' => 'required',
            'parchage_due_amount' => 'required',
            'purchage_status' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('purchage.create')
                ->withErrors($validator)
                ->withInput();
        }
        try {
            Purchage::create($request->all());

            $this->RespondWithSuccess('purchage  successful');
            return redirect()->route('purchage.index');
        } catch (Exception $e) {
            $this->RespondWithEorror(
                'purchage not successful  ',
                $e->getMessage()
            );
        }
    }

    public function edit($id)
    {
        $suppliers = Supplier::all();
        $warehouses = Warehouse::all();
        $products = Product::all();
        $branchs = Branch::all();
        $data = Purchage::find($id);

        return view(
            'admin.purchase.addpurchase',
            compact('data', 'suppliers', 'warehouses', 'products', 'branchs')
        );
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'purchase_date' => 'required',
            'purchage_quantity' => 'required',
            'purchage_unit_price' => 'required',
            'parchage_payable_amount' => 'required',
            'parchage_due_amount' => 'required',
            'parchage_due_amount' => 'required',
            'purchage_status' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('purchage.edit')
                ->withErrors($validator)
                ->withInput();
        }
        try {
            Purchage::find($id)->update($request->all());
            $this->RespondWithSuccess('purchage Update successful');
            return redirect()->route('purchage.index');
        } catch (Exception $e) {
            return $this->RespondWithEorror(
                'purchage update not successful  ',
                $e->getMessage()
            );
        }
    }

    public function destroy($id)
    {
        $data = Purchage::destroy($id);
        if ($data) {
            $this->RespondWithSuccess(' purchage edit successful');
            return redirect()->route('purchage.index');
        } else {
            $this->RespondWithEorror(' purchage edit not successful');
            return redirect()->route('purchage.index');
        }
    }
    public function getPending()
    {
        $product = Purchage::where('purchage_status', 0)
            ->with('supplier', 'warehouse', 'product', 'branch')
            ->orderBy('id', 'desc')
            ->get();
        return $this->RespondWithSuccess(
            'All Purchage view  successful',
            $product,
            200
        );
    }
    public function updatePurchaseStatus(Request $request, $id)
    {
        try {
            $purchase = Purchage::find($id);
            $data = $product = Product::where(
                'id',
                $purchase->product_id
            )->first();
            $purchase_qty =
                ((float) $purchase->purchage_quantity) +
                ((float) $product->quantity);
            $product->quantity = $purchase_qty;
            $updateProductQuantity = $product->save();
            if ($updateProductQuantity == true) {
                Purchage::where('id', $id)->update(['purchage_status' => 1]);
            }
            return $this->RespondWithSuccess(
                'purchage Update pending successful',
                $data,
                200
            );
        } catch (Exception $e) {
            return $this->RespondWithEorror(
                'purchage update pending not successful  ',
                $e->getMessage(),
                400
            );
        }
    }
}
