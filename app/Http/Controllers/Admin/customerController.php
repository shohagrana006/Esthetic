<?php

namespace App\Http\Controllers;
use App\Models\customer;

use Illuminate\Http\Request;

class customerController extends Controller
{
    
    public function index()
    {
        // $customer = customer::latest()->get();
        // return response()->json($customer);
        return "ok";

       
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {

       
        $customer= new customer;
        $customer->name=$request->name;
        $customer->phone=$request->phone;
        $customer->address=$request->address;
        $result=$customer->save();

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
        $customer = customer::find($id);
        return response()->json($customer);

        // $doctors= doctor::find($id);
        // return view('doctor.edit',compact('doctors'));
       
    }

    
    public function update( Request $request,$id)
    {
        $customer = customer::find($id);
        $name = request('name');
        $phone = request('phone');
        $address = request('address');
        
        $result= $customer->update([

            'name'=> $name,
            'phone'=>  $phone,
            'address'=> $address,
            

            ]);

            if($result){
                return["data has been updated"];

                //return response()->json(["data has been updated"]);
            }
            else{
               // return response()->json(["not updated"]);
                return["not updated"];
            }
       
    }

    
    public function destroy($id)
    {

       // return["Successfully deleted!".$id]; 
        
        

        $customer = customer::find($id);


         $data =  $customer ->delete();

        

         if ($data) {
            return["Successfully deleted!"];
            
            
         } else {
            return["not deleted!"]; 
            
         }
    }


    // public function login(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'email' => 'required|email|exists:users,email',
    //         'password' => 'required'
    //     ]);
    //     if ($validator->fails()) {
    //         return $this->RespondWithEorror('validation registration error ', $validator->errors(), 422);
    //     }
    //     if (Auth::attempt([
    //         'email' => $request->email,
    //         'password' => $request->password,
    //     ])) {
    //         $user = Auth::user();

    //         $token = $user->createToken($user->email.'-'.now());

    //         return response()->json([
    //             'token' => $token->accessToken,
    //         ]);
    //     } else {
    //         return response()->json([
    //             'message' => "Invalid email or password",
    //         ]);
    //     }
    // }
}
