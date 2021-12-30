<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $category=Category::all();
        return view('admin.category.category', compact('category'));

    }

    public function create()
    {
        return view('admin.category.add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|unique:categories',

        ]);
        if ($validator->fails()) {
            return redirect()->route('category.create')->withErrors($validator)->withInput();

        }
        try {
            $data = Category::create(array_merge(
                $request->except('category_slug'),
                [
                    'category_slug' => Str::slug($request->category_name),
                ]
            ));
            $this->RespondWithSuccess('category created successful');
            return redirect()-> route('category.index');
        } catch (Exception $e) {
            $this->RespondWithEorror('category created not successful  ', $e->getMessage());
            return redirect()-> route('category.create');
        }

    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.categoryedit',compact('category'));

    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'categories' => 'unique:categories,category_name,'.$id,

        ]);
        if ($validator->fails()) {
            $this->RespondWithEorror('category validation error ', $validator->errors());
            return redirect()->back();
        }
        try {
            $data = Category::find($id)->update(array_merge(
                $request->except('category_slug'),
                [
                    'category_slug' => Str::slug($request->category_name),
                ]
            ));
            $this->RespondWithSuccess('category update successful');
            return redirect()-> route('category.index');
        } catch (Exception $e) {
            $this->RespondWithEorror('category update not successful  ', $e->getMessage());
            return redirect()->back();
        }
    }
    public function destroy($id)
    {
        Category::destroy($id);
        $this->RespondWithSuccess('category delete  successful');
        return redirect()->back();

    }
}
