<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function index()
    {
        $sub_category =SubCategory::with('category')->orderBy('id','desc')->get();
        return $this->RespondWithSuccess('subcategory view  successful', $sub_category, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sub_category_name' => 'required|unique:sub_categories',

        ]);
        if ($validator->fails()) {
            return $this->RespondWithEorror('validation subcategory error ', $validator->errors(), 422);
        }
        try {
            $data = SubCategory::create(array_merge(
                $request->except('sub_category_slug'),
                [
                    'sub_category_slug' => Str::slug($request->sub_category_name),
                ]
            ));
            return $this->RespondWithSuccess('subcategory  successful', $data, 200);
        } catch (Exception $e) {
            return $this->RespondWithEorror('subcategory not successful  ', $e->getMessage(), 400);
        }

    }

    public function edit($sub_category_slug)
    {
        $data = SubCategory::where('sub_category_slug',$sub_category_slug)->get();
        return $this->RespondWithSuccess('subcategory show successful', $data, 200);
    }

    public function update(Request $request, $sub_category_slug)
    {
        $validator = Validator::make($request->all(), [
            'categories' => 'unique:categories,sub_category_name,' .$sub_category_slug ,

        ]);
        if ($validator->fails()) {
            return $this->RespondWithEorror('validation subcategory error ', $validator->errors(), 422);
        }
        try {
            $data = SubCategory::where('sub_category_slug',$sub_category_slug)->update(array_merge(
                $request->except('sub_category_slug'),
                [
                    'sub_category_slug' => Str::slug($request->sub_category_name),
                ]
            ));
            return $this->RespondWithSuccess('subcategory update successful', $data, 200);
        } catch (Exception $e) {
            return $this->RespondWithEorror('subcategory update not successful  ', $e->getMessage(), 400);
        }
    }

    public function destroy($sub_category_slug)
    {
        SubCategory::destroy($sub_category_slug);
        return response()->json([
            'success' => true,
            'message' => 'SubCategory  Deleted Successful'
        ]);

    }
}
