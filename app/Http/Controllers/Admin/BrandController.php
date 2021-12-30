<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('id', 'desc')->get();
        return view('admin.brand.brand', compact('brands'));
    }
    public function create()
    {
        return view('admin.brand.addbrand');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'brand_name' => 'required|unique:brands',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('brand.create')
                ->withErrors($validator)
                ->withInput();
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

            Brand::create($input);
            $this->RespondWithSuccess('brand  successful');
            return redirect()->route('brand.index');
        } catch (Exception $e) {
            $this->RespondWithEorror(
                'brand not successful  ',
                $e->getMessage()
            );
            return redirect()->route('brand.index');
        }
    }

    public function edit($id)
    {
        $data = Brand::find($id);
        return view('admin.brand.addbrand', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'brand_name' => 'unique:brands,brand_name,' . $id,
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('brand.create')
                ->withErrors($validator)
                ->withInput();
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

            $this->RespondWithSuccess('Brand Update successful');
            return redirect()->route('brand.index');
        } catch (Exception $e) {
            $this->RespondWithEorror(
                'Brand update not successful  ',
                $e->getMessage()
            );
            return redirect()->route('brand.index');
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
            $this->RespondWithSuccess(' Brand  Deleted Successful');
            return redirect()->route('brand.index');
        } else {
            $this->RespondWithEorror(' Brand not Deleted Successful');
            return redirect()->route('brand.index');
        }
    }
}
