<?php

namespace App\Http\Controllers;
use App\Models\Supplier;


use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $supplier = Supplier::latest()->get();
        return response()->json($supplier);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $supplier= new Supplier;
        $supplier->name=$request->name;
        $supplier->phone=$request->phone;
        $supplier->address=$request->address;
        $result=$supplier->save();

        if($result){
            return["data has been saved"];
        }
        else{
            return["operation failed"];
        }
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return response()->json($supplier);
    }

    
    public function update(Request $request, $id)
    {
        $supplier = Supplier::find($id);
        $name = request('name');
        $phone = request('phone');
        $address = request('address');
        
        $result=  $supplier->update([

            'name'=> $name,
            'phone'=>  $phone,
            'address'=> $address,
            

            ]);

            if($result){
               // return["updated successfully"];

                return response()->json(["data has been updated"]);
            }
            else{
               return response()->json(["not updated"]);
                //return["not updated"];
            }
    }

    
    public function destroy($id)
    {
        $supplier = Supplier::find($id);


         $data =  $supplier ->delete();

        

         if ($data) {
            return["Successfully deleted!"];
            
            
         } else {
            return["not deleted!"]; 
            
         }
    }
}
