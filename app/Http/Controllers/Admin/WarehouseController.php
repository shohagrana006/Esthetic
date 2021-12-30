<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WarehouseController extends Controller
{
    public function index()
    {
        $warehouse= Warehouse::all();
        return view('admin.warehouse.warehouse', compact('warehouse'));

        // return response()->json($warehouse);
    }
    public function create()
    {
        return view('admin.warehouse.addwarehouse');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'warehouse_name' => 'required|unique:warehouses',
            'warehouse_address'=>'required',
            'warehouse_phone'=>'required|unique:warehouses',
        ]);
        if ($validator->fails()) {
            // return $this->RespondWithEorror('validation warehouse error ', $validator->errors(), 422);
            return redirect('warehouse/create')->withErrors($validator)->withInput();

        }
        try {
            $data = Warehouse::create($request->all());
            $this->RespondWithSuccess('warehouse successfully created');
            return redirect()-> route('warehouse.index');
        } catch (Exception $e) {
            $this->RespondWithEorror('warehouse not successful ');
            return redirect()-> route('warehouse.create');

        }

    }
    public function edit($id)
    {
        $warehouse = Warehouse::find($id);
        return view('admin.warehouse.warehouseedit',compact('warehouse'));
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
             'warehouse_name' => 'unique:warehouses,warehouse_name,'.$id,
             'warehouse_phone'=>'unique:warehouses,warehouse_phone,'.$id,
        ]);
        if ($validator->fails()) {
            $this->RespondWithEorror('warehouse validation error ', $validator->errors());
            return redirect()->back();
        }
        try {
            $warehouse  = Warehouse::find($id)->update($request->all());
            $this->RespondWithSuccess('warehouse update successful');
            return redirect()-> route('warehouse.index');
        } catch (Exception $e) {
            $this->RespondWithEorror('warehouse update not successful  ', $e->getMessage());
            return redirect()->back();
        }

    }
    public function destroy($id)
    {
        Warehouse::destroy($id);
        $this->RespondWithSuccess('Warehouse  Deleted  successful');
        return redirect()->back();

    }
}
