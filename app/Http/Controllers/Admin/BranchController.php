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
        return $this->RespondWithSuccess(
            'All Branch view  successful',
            $branchs,
            200
        );
    }

    public function store(Request $request)
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
            $input = $request->all();
            $input['branch_slug'] = null;
            $input['branch_slug'] = Str::slug($request->branch_name);
            $data = Branch::create($input);
            return $this->RespondWithSuccess('branch  successful', $data, 200);
        } catch (Exception $e) {
            return $this->RespondWithEorror(
                'branch not successful  ',
                $e->getMessage(),
                400
            );
        }
    }

    public function edit($branch_slug)
    {
        $data = Branch::Where('branch_slug', $branch_slug)->get();
        if (!empty($data)) {
            return $this->RespondWithSuccess(
                'Branch edit successful',
                $data,
                200
            );
        } else {
            return $this->RespondWithEorror(
                'branch edit not successful  ',
                $data,
                400
            );
        }
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
