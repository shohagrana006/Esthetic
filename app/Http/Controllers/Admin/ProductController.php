<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Unit;
use Exception;
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
        // return $this->RespondWithSuccess(
        //     'All Product view  successful',
        //     $product,
        //     200
        // );
        return view('admin.product.product', compact('product'));

    }
    public function create()
    {
           $product = Product::all();
           $brand = Brand::all();
           $branch = Branch::all();
           $category = Category::all();
           $sub_category =SubCategory::all();
           $unit= Unit::all();
        return view('admin.product.addproduct',compact('product','brand','branch','category','sub_category','unit'));
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
            // return $this->RespondWithEorror('validation product error ',$validator->errors(),422);
            return redirect()->route('product.create')->withErrors($validator)->withInput();

        }
        try {
         
            // $input = $request->except('_token');
            $input =$request->all();
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
             Product::create($input);
          

            // return $this->RespondWithSuccess('product  successful', $data, 200);
            $this->RespondWithSuccess('product created successful');
            return redirect()-> route('product.index');
        } catch (Exception $e) {
        
            
            $this->RespondWithEorror('product created not successful  ', $e->getMessage());
            return redirect()-> route('product.create');
        }
    }

    public function edit($id)
    {
           $product = Product::find($id);
           $brand = Brand::all();
           $branch = Branch::all();
           $category = Category::all();
           $sub_category =SubCategory::all();
           $unit= Unit::all();
         return view('admin.product.editproduct',compact('product','brand','branch','category','sub_category','unit'));
        // if (!empty($data)) {
        //     return $this->RespondWithSuccess(
        //         'product edit successful',
        //         $data,
        //         200
        //     );
        // } else {
        //     return $this->RespondWithEorror(
        //         'product edit not successful  ',
        //         $data,
        //         400
        //     );
        // }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'unique:products,product_name,' . $id,
        ]);
        if ($validator->fails()) {
            
            $this->RespondWithEorror('product validation error ', $validator->errors());
            return redirect()->back();
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
            $this->RespondWithSuccess('product update successful');
            return redirect()-> route('product.index');
        } catch (Exception $e) {
            
            $this->RespondWithEorror('product update not successful  ', $e->getMessage());
            return redirect()->back();
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
            
            $this->RespondWithSuccess('Product delete  successful');
            return redirect()->back();
        } else {
            
            $this->RespondWithSuccess('Product not delete  successful');
            return redirect()->back();
        }
    }
}
