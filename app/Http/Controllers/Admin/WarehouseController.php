<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WarehouseController extends Controller
{
    public function index()
    {
        $warehouse= Warehouse::all();
        return response()->json($warehouse);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'warehouse_name' => 'required|unique:warehouses',
            'warehouse_address'=>'required',
            'warehouse_phone'=>'required|unique:warehouses',
        ]);
        if ($validator->fails()) {
            return $this->RespondWithEorror('validation warehouse error ', $validator->errors(), 422);
        }
        try {
            $data = Warehouse::create($request->all());
            return $this->RespondWithSuccess('warehouse  successful', $data, 200);
        } catch (Exception $e) {
            return $this->RespondWithEorror('warehouse not successful  ', $e->getMessage(), 400);
        }

    }
    public function edit($id)
    {
        $data = Warehouse::find($id);
        return response()->json($data);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
             'warehouse_name' => 'unique:warehouses,warehouse_name,'.$id,
             'warehouse_phone'=>'unique:warehouses,warehouse_phone'.$id,
        ]);
        if ($validator->fails()) {
            return $this->RespondWithEorror('validation unit error ', $validator->errors(), 422);
        }
        try {
            $data = Warehouse::find($id)->update($request->all());
            return $this->RespondWithSuccess('warehouse update successful', $data, 200);
        } catch (Exception $e) {
            return $this->RespondWithEorror('warehouse update not successful  ', $e->getMessage(), 400);
        }

    }
    public function destroy($id)
    {
        Warehouse::destroy($id);
        return response()->json([
            'success' => true,
            'message' => 'Warehouse  Deleted Successful'
        ]);

    }
}
