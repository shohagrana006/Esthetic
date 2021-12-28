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
        return view();

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
            return $this->RespondWithSuccess('branch  successful');
        } catch (Exception $e) {
            return $this->RespondWithEorror(
                'branch not successful  ',
                $e->getMessage(),
            );
        }
    }

    public function edit($branch_slug)
    {
        $data = Branch::Where('branch_slug', $branch_slug)->get();
        return view();

    }

    public function update(Request $request, $branch_slug)
    {
        $validator = Validator::make($request->all(), [
            'branch_name' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->RespondWithEorror(
                'validation branch error ',
                $validator->errors(),
                422
            );
        }
        try {
            $data = Branch::Where('branch_slug', $branch_slug)->update(
                array_merge($request->except('branch_slug'), [
                    'branch_slug' => Str::slug($request->branch_name),
                ])
            );

            return $this->RespondWithSuccess(
                'Branch Update successful',
                $data,
                200
            );
        } catch (Exception $e) {
            return $this->RespondWithEorror(
                'Branch update not successful  ',
                $e->getMessage(),
                400
            );
        }
    }

    public function destroy($branch_slug)
    {
        $data = Branch::Where('branch_slug', $branch_slug)->delete();
        if ($data) {
            return response()->json(
                [
                    'success' => true,
                    'message' => ' Br  Deleted Successful',
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'error' => true,
                    'message' => ' Brand not Deleted Successful',
                ],
                200
            );
        }
    }
}
