<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function index()
    {
        $customer = Brand::orderBy('id', 'desc')->get();
        return $this->RespondWithSuccess(
            'All Brand view  successful',
            $customer,
            200
        );
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'brand_name' => 'required|unique:brands',
        ]);
        if ($validator->fails()) {
            return $this->RespondWithEorror(
                'validation brand error ',
                $validator->errors(),
                422
            );
        }
        try {
            $input = $request->all();
            $input['brand_slug'] = null;
            $input['brand_slug'] = Str::slug($request->brand_name);
            $input['brand_logo'] = null;
            if ($request->hasFile('brand_logo')) {
                $input['brand_logo'] =
                    'public/files/brand/' .
                    Str::slug($input['brand_name'], '-') .
                    '.' .
                    $request->brand_logo->getClientOriginalExtension();
                $request->brand_logo->move(
                    public_path('public/files/brand/'),
                    $input['brand_logo']
                );
            }

            $data = Brand::create($input);
            return $this->RespondWithSuccess('brand  successful', $data, 200);
        } catch (Exception $e) {
            return $this->RespondWithEorror(
                'brand not successful  ',
                $e->getMessage(),
                400
            );
        }
    }

    public function edit($brand_slug)
    {
        $data = Brand::Where('brand_slug', $brand_slug)->get();
        if (!empty($data)) {
            return $this->RespondWithSuccess(
                'Brand edit successful',
                $data,
                200
            );
        } else {
            return $this->RespondWithEorror(
                'brand edit not successful  ',
                $data,
                400
            );
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'brand_name' => 'unique:brands,brand_name,' . $id,
        ]);
        if ($validator->fails()) {
            return $this->RespondWithEorror(
                'validation brand error ',
                $validator->errors(),
                422
            );
        }
        try {
            $input = $request->all();
            $data = Brand::find($id);
            $input['brand_slug'] = Str::slug($request->brand_name);
            $input['brand_logo'] = $data->brand_logo;
            if ($request->hasFile('brand_logo')) {
                if (!$data->brand_logo == null) {
                    unlink(public_path($data->brand_logo));
                }
                $input['brand_logo'] =
                    'public/files/brand/' .
                    Str::slug($input['brand_slug'], '-') .
                    '.' .
                    $request->brand_logo->getClientOriginalExtension();
                $request->brand_logo->move(
                    public_path('public/files/brand/'),
                    $input['brand_logo']
                );
            }

            $data->update($input);

            return $this->RespondWithSuccess(
                'Brand Update successful',
                $data,
                200
            );
        } catch (Exception $e) {
            return $this->RespondWithEorror(
                'Brand update not successful  ',
                $e->getMessage(),
                400
            );
        }
    }

    public function destroy($id)
    {
        $data = Brand::find($id);
        if (!$data->brand_logo == null) {
            unlink(public_path($data->brand_logo));
        }
        $data = Brand::destroy($id);
        if ($data) {
            return response()->json(
                [
                    'success' => true,
                    'message' => ' Brand  Deleted Successful',
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
