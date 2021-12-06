<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UnitController extends Controller
{
    public function index(){
        $unit=Unit::all();
       return response()->json($unit);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'unit_name' => 'required',
        ]);
        if ($validator->fails()) {
            return  $this->RespondWithEorror('validation unit error ',$validator->errors(),422);
        }
        try {
            $user= Unit::create(array_merge(
                $request->except('unit_slug'),
                [
                    'unit_slug' =>Str::slug($request->unit_name),
                ]
            ));
            return  $this->RespondWithSuccess('unit  successful',$user,200);
        } catch (Exception $e) {
            return  $this->RespondWithEorror('unit not successful  ',$e->getMessage(),400);
        }


    }
    public function edit($id)
    {
        $data=Warehouse::find($id);
        return response()->json($data);
    }

    public function update(Request $request,$id )
    {
        $this->validate($request,[
            'warehouse_name'=>'required',
        ]);
        Warehouse::find($id)->update($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Update Created'
        ]);

    }
    public function destroy($id)
    {
        Warehouse::destroy($id);
        return response()->json([
            'success' => true,
            'message' => 'Warehouse Deleted'
        ]);

    }
}
