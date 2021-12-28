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
        $customers = Supplier::orderBy('id', 'desc')->get();
        return view('admin.supplier.supplier', compact('customers'));
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
            return  $validator->errors();
        }
        try {
            Supplier::create($request->all());
            $this->RespondWithSuccess('Supplier  successful');
            return redirect()->back();
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
        return $data;
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
           return  $validator->errors();
        }
        try {
            Supplier::where('id', $id)->update($request->all());
            return $this->RespondWithSuccess(
                'supplier update successful'
            );
        } catch (Exception $e) {
            return $this->RespondWithEorror(
                'supplier update not successful  ',
                $e->getMessage(),

            );
        }
    }

    public function destroy($id)
    {
        Supplier::destroy($id);
        return response()->json([
            'success' => true,
            'message' => ' Supplier Deleted Successful',
        ]);
    }
}
