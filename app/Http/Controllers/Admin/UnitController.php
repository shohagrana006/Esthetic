<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UnitController extends Controller
{
    public function index()
    {
        $unit = Unit::all();
        return response()->json($unit);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'unit_name' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->RespondWithEorror('validation unit error ', $validator->errors(), 422);
        }
        try {
            $data = Unit::create(array_merge(
                $request->except('unit_slug'),
                [
                    'unit_slug' => Str::slug($request->unit_name),
                ]
            ));
            return $this->RespondWithSuccess('unit  successful', $data, 200);
        } catch (Exception $e) {
            return $this->RespondWithEorror('unit not successful  ', $e->getMessage(), 400);
        }

    }

    public function edit($id)
    {
        $data = Unit::find($id);
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'unit_name' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->RespondWithEorror('validation unit error ', $validator->errors(), 422);
        }
        try {
            $data = Unit::find($id)->update(array_merge(
                $request->except('unit_slug'),
                [
                    'unit_slug' => Str::slug($request->unit_name),
                ]
            ));
            return $this->RespondWithSuccess('unit update successful', $data, 200);
        } catch (Exception $e) {
            return $this->RespondWithEorror('unit update not successful  ', $e->getMessage(), 400);
        }


    }

    public function destroy($id)
    {
        Unit::destroy($id);
        return response()->json([
            'success' => true,
            'message' => 'unit  Deleted Successful'
        ]);

    }
}
