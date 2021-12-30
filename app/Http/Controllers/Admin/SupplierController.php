<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::orderBy('id', 'desc')->get();
        return view('admin.supplier.supplier', compact('suppliers'));
    }

    public function create()
    {
        return view('admin.supplier.addsupplier');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'supplier_name' => 'required',
            'supplier_email' => 'string|email|max:255|unique:suppliers',
            'supplier_phone_number' => 'unique:suppliers',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('supplier.create')
                ->withErrors($validator)
                ->withInput();
        }
        try {
            Supplier::create($request->all());
            $this->RespondWithSuccess('Supplier  successful');
            return redirect()->route('supplier.index');
        } catch (Exception $e) {
            $this->RespondWithEorror(
                'Supplier not successful',
                $e->getMessage()
            );
        }
    }

    public function edit($id)
    {
        $data = Supplier::find($id);
        return view('admin.supplier.addsupplier', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'supplier_email' =>
                'string|email|max:255|unique:suppliers,supplier_email,' . $id,
            'supplier_phone_number' =>
                'unique:suppliers,supplier_phone_number,' . $id,
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('supplier.edit')
                ->withErrors($validator)
                ->withInput();
        }
        try {
            Supplier::find($id)->update($request->all());
            $this->RespondWithSuccess('supplier update successful');
            return redirect()->route('supplier.index');
        } catch (Exception $e) {
            return $this->RespondWithEorror(
                'supplier update not successful  ',
                $e->getMessage()
            );
        }
    }

    public function destroy($id)
    {
        $data = Supplier::destroy($id);
        if ($data) {
            $this->RespondWithSuccess('supplier  Deleted Successful');
            return redirect()->route('supplier.index');
        } else {
            $this->RespondWithEorror('supplier not Deleted Successful');
            return redirect()->route('supplier.index');
        }
    }
}
