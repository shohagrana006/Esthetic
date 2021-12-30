<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BranchController extends Controller
{
    public function index()
    {
        $branchs = Branch::orderBy('id', 'desc')->get();
        return view('admin.branch.index',compact('branchs'));

    }
    public function create(){
        return view('admin.branch.form');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'branch_name' => 'required',
        ]);
        try {
            $input = $request->all();
            $input['branch_slug'] = null;
            $input['branch_slug'] = Str::slug($request->branch_name);
            Branch::create($input);
            $this->RespondWithSuccess('branch  successful');
            return redirect()->route('branch.index');

        } catch (Exception $e) {
             $this->RespondWithEorror(
                'branch not successful  ',
                $e->getMessage(),
            );
            return redirect()->route('branch.index');
        }
    }

    public function edit($id)
    {
        $data = Branch::find( $id);
        return view('admin.branch.form',compact('data'));

    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'branch_name' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('branch.create')->withErrors($validator)
            ->withInput();
        }
        try {
            $data = Branch::find($id)->update(
                array_merge($request->except('branch_slug'), [
                    'branch_slug' => Str::slug($request->branch_name),
                ])
            );

          $this->RespondWithSuccess(
                'Branch Update successful',

            );
            return redirect()->route('branch.index');
        } catch (Exception $e) {
             $this->RespondWithEorror(
                'Branch update not successful  ',
                $e->getMessage()
            );
            return redirect()->route('branch.index');
        }
    }

    public function destroy($id)
    {
        $data = Branch::Where('id', $id)->delete();
        if ($data) {
            $this->RespondWithSuccess(' Branch  Deleted Successful');
            return redirect()->route('branch.index');
        } else {

                $this->RespondWithEorror(' Branch not Deleted Successful');
                return redirect()->route('branch.index');

        }
    }
}
