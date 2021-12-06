<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $category=Category::all();
        return response()->json($category);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|unique:categories',

        ]);
        if ($validator->fails()) {
            return $this->RespondWithEorror('validation category error ', $validator->errors(), 422);
        }
        try {
            $data = Category::create(array_merge(
                $request->except('category_slug'),
                [
                    'category_slug' => Str::slug($request->category_name),
                ]
            ));
            return $this->RespondWithSuccess('category  successful', $data, 200);
        } catch (Exception $e) {
            return $this->RespondWithEorror('category not successful  ', $e->getMessage(), 400);
        }

    }
    public function edit($id)
    {
        $data = Category::find($id);
        return response()->json($data);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'categories' => 'unique:categories,category_name,'.$id,

        ]);
        if ($validator->fails()) {
            return $this->RespondWithEorror('validation category error ', $validator->errors(), 422);
        }
        try {
            $data = Category::find($id)->update(array_merge(
                $request->except('category_slug'),
                [
                    'category_slug' => Str::slug($request->category_name),
                ]
            ));
            return $this->RespondWithSuccess('category update successful', $data, 200);
        } catch (Exception $e) {
            return $this->RespondWithEorror('category update not successful  ', $e->getMessage(), 400);
        }
    }
    public function destroy($id)
    {
        Category::destroy($id);
        return response()->json([
            'success' => true,
            'message' => 'Category  Deleted Successful'
        ]);

    }
}
