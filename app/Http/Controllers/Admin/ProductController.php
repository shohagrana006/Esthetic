<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::with(
            'category',
            'sub_category',
            'unit',
            'brand',
            'branch'
        )
            ->orderBy('id', 'desc')
            ->get();
        return $this->RespondWithSuccess(
            'All Product view  successful',
            $product,
            200
        );
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required|unique:products',
            'barcode' => 'required',
            'sku' => 'required',
            'product_status' => 'required',
            'image' => 'required',

        ]);
        if ($validator->fails()) {
            return $this->RespondWithEorror(
                'validation product error ',
                $validator->errors(),
                422
            );
        }
        try {
            $input = $request->all();
            $input['image'] = null;
            if ($request->hasFile('image')) {
                $input['image'] =
                    'public/files/product/' .
                    Str::slug($input['product_name'], '-') .
                    '.' .
                    $request->image->getClientOriginalExtension();
                $request->image->move(
                    public_path('public/files/product/'),
                    $input['image']
                );
            }

            $data = Product::create($input);
            return $this->RespondWithSuccess('product  successful', $data, 200);
        } catch (Exception $e) {
            return $this->RespondWithEorror(
                'product not successful  ',
                $e->getMessage(),
                400
            );
        }
    }

    public function edit($id)
    {
        $data = Product::find($id);
        if (!empty($data)) {
            return $this->RespondWithSuccess(
                'product edit successful',
                $data,
                200
            );
        } else {
            return $this->RespondWithEorror(
                'product edit not successful  ',
                $data,
                400
            );
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'unique:products,product_name,' . $id,
        ]);
        if ($validator->fails()) {
            return $this->RespondWithEorror(
                'validation product error ',
                $validator->errors(),
                422
            );
        }
        try {
            $input = $request->all();
            $data = Product::find($id);

            $input['image'] = $data->image;
            if ($request->hasFile('image')) {
                if (!$data->image == null) {
                    unlink(public_path($data->image));
                }
                $input['image'] =
                    'public/files/product/' .
                    Str::slug($input['product_name'], '-') .
                    '.' .
                    $request->image->getClientOriginalExtension();
                $request->image->move(
                    public_path('public/files/product/'),
                    $input['image']
                );
            }

            $data->update($input);

            return $this->RespondWithSuccess(
                'product Update successful',
                $data,
                200
            );
        } catch (Exception $e) {
            return $this->RespondWithEorror(
                'product update not successful  ',
                $e->getMessage(),
                400
            );
        }
    }

    public function destroy($id)
    {
        $data = Product::find($id);
        if (!$data->image == null) {
            unlink(public_path($data->image));
        }
        $data = Product::destroy($id);
        if ($data) {
            return response()->json(
                [
                    'success' => true,
                    'message' => ' Product  Deleted Successful',
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'error' => true,
                    'message' => ' Product not Deleted Successful',
                ],
                400
            );
        }
    }
}
