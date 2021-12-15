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
        $customer =Supplier::orderBy('id', 'desc')->get();
        return $this->RespondWithSuccess('All supplier view  successful', $customer, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'supplier_name' => 'required',
            'supplier_email' => 'string|email|max:255|unique:suppliers',
            'supplier_phone_number' => 'unique:suppliers',
        ]);
        if ($validator->fails()) {
            return $this->RespondWithEorror('validation customer error ', $validator->errors(), 422);
        }
        try {
            $data = Supplier::create($request->all());
            return $this->RespondWithSuccess('Supplier  successful', $data, 200);
        } catch (Exception $e) {
            return $this->RespondWithEorror('Supplier not successful  ', $e->getMessage(), 400);
        }

    }

    public function edit($id)
    {
        $data = Supplier::find($id);
        return $this->RespondWithSuccess('Customer edit successful', $data, 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'supplier_email' => 'string|email|max:255|unique:suppliers,supplier_email,' . $id,
            'supplier_phone_number' => 'unique:suppliers,supplier_phone_number,' . $id,

        ]);
        if ($validator->fails()) {
            return $this->RespondWithEorror('validation supplier error ', $validator->errors(), 422);
        }
        try {
            $data = Supplier::where('id', $id)->update($request->all());
            return $this->RespondWithSuccess('supplier update successful', $data, 200);
        } catch (Exception $e) {
            return $this->RespondWithEorror('supplier update not successful  ', $e->getMessage(), 400);
        }
    }

    public function destroy($id)
    {
        Supplier::destroy($id);
        return response()->json([
            'success' => true,
            'message' => ' Supplier Deleted Successful'
        ]);


    }
}
