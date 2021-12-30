<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function index()
    {
        $sub_category =SubCategory::with('category')->orderBy('id','desc')->get();
        return view('admin.subcategory.subcategory', compact('sub_category'));

    }

    public function create()
    {
        $category= Category::all();
        return view('admin.subcategory.addsubcategory',compact('category'));
    }



    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'sub_category_name' => 'required|unique:sub_categories',

        ]);
        if ($validator->fails()) {
            // return $this->RespondWithEorror('validation subcategory error ', $validator->errors(), 422);
            return redirect()-> route('subcategory.create')->withErrors($validator)->withInput();

        }
        try {
            $sub_category = SubCategory::create(array_merge(
                $request->except('sub_category_slug'),
                [
                    'sub_category_slug' => Str::slug($request->sub_category_name),
                ]
            ));
            // return $this->RespondWithSuccess('subcategory  successful', $data, 200);
            $this->RespondWithSuccess('subcategory created successful');
            return redirect()-> route('subcategory.index');
        } catch (Exception $e) {
            // return $this->RespondWithEorror('subcategory not successful  ', $e->getMessage(), 400);
            $this->RespondWithEorror('subcategory created not successful  ', $e->getMessage());
            return redirect()-> route('subcategory.create');
        }

    }

    public function edit($id)
    {
        $sub_category = SubCategory::find($id);
        $category= Category::all();


        // return $this->RespondWithSuccess('subcategory show successful', $data, 200);
        return view('admin.subcategory.editsubcategory',compact('sub_category','category'));


    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'categories' => 'unique:categories,sub_category_name,' .$id ,

        ]);
        if ($validator->fails()) {
            // return $this->RespondWithEorror('validation subcategory error ', $validator->errors(), 422);
            // $this->RespondWithEorror('subcategory validation error ', $validator->errors());
            return redirect()->route('category.edit');
        }
        try {
            $sub_category= SubCategory::find($id)->update(array_merge(
                $request->except('sub_category_slug'),
                [
                    'sub_category_slug' => Str::slug($request->sub_category_name),
                ]
            ));
            // return $this->RespondWithSuccess('subcategory update successful', $data, 200);
            $this->RespondWithSuccess('subcategory update successful');
            return redirect()->route('subcategory.index');
        } catch (Exception $e) {
            // return $this->RespondWithEorror('subcategory update not successful  ', $e->getMessage(), 400);
            $this->RespondWithEorror('category update not successful  ', $e->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($sub_category_slug)
    {
        SubCategory::destroy($sub_category_slug);
        $this->RespondWithSuccess('subcategory delete  successful');
        return redirect()->back();

    }
}
