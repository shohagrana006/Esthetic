<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index()
    {
        $customer =Customer::orderBy('id','desc')->get();
        return $this->RespondWithSuccess('All Customer view  successful', $customer, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required',
            'customer_email' => 'string|email|max:255|unique:customers',
            'customer_phone_number' => 'unique:customers',
        ]);
        if ($validator->fails()) {
            return $this->RespondWithEorror('validation customer error ', $validator->errors(), 422);
        }
        try {
            $data =Customer::create($request->all());
            return $this->RespondWithSuccess('Customer  successful', $data, 200);
        } catch (Exception $e) {
            return $this->RespondWithEorror('Customer not successful  ', $e->getMessage(), 400);
        }

    }

    public function edit($id)
    {
        $data = Customer::find($id);
        return $this->RespondWithSuccess('Customer edit successful', $data, 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'customer_email' => 'string|email|max:255|unique:customers,customer_email,'.$id,
            'customer_phone_number' => 'unique:customers,customer_phone_number'.$id,

        ]);
        if ($validator->fails()) {
            return $this->RespondWithEorror('validation Customer error ', $validator->errors(), 422);
        }
        try {
            $data = Customer::where('id',$id)->update($request->all());
            return $this->RespondWithSuccess('customer update successful', $data, 200);
        } catch (Exception $e) {
            return $this->RespondWithEorror('customer update not successful  ', $e->getMessage(), 400);
        }
    }

    public function destroy($id)
    {
        Customer::destroy($id);
        return response()->json([
            'success' => true,
            'message' => ' Customer Deleted Successful'
        ]);

    }
}
