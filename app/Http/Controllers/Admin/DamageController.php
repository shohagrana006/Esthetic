<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Damage;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;





class DamageController extends Controller
{

    public function index()
    {
        $Damage = Damage::with( 'product' )
        ->orderBy('id', 'desc')
        ->get();
    return $this->RespondWithSuccess(
        'All damage view  successful',
        $Damage,
        200
    );
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

             'damage_quantity' => 'required',

        ]);
        if ($validator->fails()) {
            return $this->RespondWithEorror(
                'validation damage error ',
                $validator->errors(),
                422
            );
        }
        try {
            $Damage = Damage::create($request->all());
            $data = $product = Product::where('id',$Damage->product_id)->first();
     //damage_quantity
             $damage_qty = ((float) $product->quantity) - ((float) $Damage->damage_quantity);
             $product->quantity =  $damage_qty;
             $updateProductQuantity = $product->save();
             return $this->RespondWithSuccess(
                 'damage create successful',
                 $Damage,
                 200
             );
         } catch (Exception $e) {
             return $this->RespondWithEorror(
                 'purchage created not successful  ',
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
        $data = Damage::find($id);
        if (!empty($data)) {
            return $this->RespondWithSuccess(
                'Damage edit successful',
                $data,
                200
            );
        } else {
            return $this->RespondWithEorror(
                'Damage edit not successful ',
                $data,
                400
            );
        }
    }



    public function update(Request $request, $id)
    {


        try {
            $Damag = Damage::where('id',$id)->first();
         //    $Damage = Damage::find($id)->update($request->all());
            $Damage = Damage::where('id',$id)->update($request->all());


         $data = $product = Product::where('id',$Damag->product_id)->first();

             //damage_quantity
            // dd($request->damage_quantity,$Damag->damage_quantity);
             if(((float) $request->damage_quantity) <((float) $Damag->damage_quantity)){

                $current_val = ((float) $Damag->damage_quantity) - (((float) $request->damage_quantity));
                 $damage_qty = ((float) $product->quantity) + ((float) $current_val);
                 $product->quantity =  $damage_qty;
                 $product->save();
             //dd($request->damage_quantity,$Damag->damage_quantity,$current_val);
             }
             else if (((float)$request->damage_quantity) >((float) $Damag->damage_quantity)){

                $current_val = ((float) $request->damage_quantity) - ((float) $Damag->damage_quantity) ;


                 $damage_qty = ((float) $product->quantity) - ((float) $current_val);
                 $product->quantity =  $damage_qty;
                 $product->save();
             }
             else{
                  $product->save();

             }

             // if ($updateProductQuantity == true) {
             //     Product::where('id', $id)->update(['product_status' => 1]);
             // }
             return $this->RespondWithSuccess(
                 'damage Update successful',
                 $data,
                 200
             );
         }
        catch (Exception $e) {
            return $this->RespondWithEorror(
                'purchage update not successful  ',
                $e->getMessage(),
                400
            );
        }
    }




    public function destroy($id)
    {
        $data = Damage::destroy($id);
        if ($data) {
            return response()->json(
                [
                    'success' => true,
                    'message' => ' Damage  Deleted Successful',
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'error' => true,
                    'message' => ' Damage not Deleted Successful',
                ],
                400
            );
        }
    }
}
