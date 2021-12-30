<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UnitController extends Controller
{
    public function index()
    {
        $unit = Unit::all();
        return view('admin.unit.unit', compact('unit'));
    }
    public function create()
    {
        return view('admin.unit.addunit');
    }

    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'unit_name' => 'required|unique:units',

        ]);
        if ($validator->fails()) {
            return redirect()-> route('unit.index')->withErrors($validator)->withInput();
        }


        try {
            $data = Unit::create(array_merge(
                $request->except('unit_slug'),
                [
                    'unit_slug' => Str::slug($request->unit_name),
                ]
                ));
             $this->RespondWithSuccess('unit  successful');
           return redirect()-> route('unit.index');




        } catch (Exception $e) {
            // return $this->RespondWithEorror('unit not successful  ', $e->getMessage());
            $this->RespondWithEorror('unit not successful  ', $e->getMessage());
           return redirect()-> route('unit.create');

        }


    }

    public function edit($id)
    {
        $unit = Unit::find($id);
        return view('admin.unit.unitedit',compact('unit'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'unit_name' => 'required',
        ]);
        if ($validator->fails()) {
            $this->RespondWithEorror('validation unit error ', $validator->errors());
            return redirect()->back();
        }
        try {
            $data = Unit::find($id)->update(array_merge(
                $request->except('unit_slug'),
                [
                    'unit_slug' => Str::slug($request->unit_name),
                ]
            ));
            $this->RespondWithSuccess('unit update successful');
            return redirect()-> route('unit.index');
        } catch (Exception $e) {
            $this->RespondWithEorror('unit update not successful  ', $e->getMessage());
            return redirect()->back();

        }


    }

    public function destroy($id)
    {
        Unit::destroy($id);
        $this->RespondWithSuccess('unit delete  successful');
        return redirect()->back();
    }
}
