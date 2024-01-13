<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;
use App\Http\Requests\Admin\CategoryRequest;


use Exception;
use Auth;
use DB;

class CategoryController extends Controller
{
     ## Categories function
     public function index()
     {
         $categories = Category::select('*')->with('user')->orderBy('id', 'desc')->get();
         return view("admin.categories.index", compact('categories'));
     }

     ## Add Category function
     public function addCategory()
     {
         return view('admin.categories.add');
     }

     ## Edit Category function
     public function editCategory($id)
     {
         # Validation of parameter ID, you need to apply

         # Call the category data
         //$category = Category::find($id);
         return view('admin.categories.edit', compact('category'));
     }

     ## Function to insert/update category in DB
    public function storeCategory(CategoryRequest $request)
    {
         ## Validation - Todo (You need to do this)
         try {
            $validated = $request->validated();
             $param = $request->safe()->except(['_token']);
             $param['user_id'] = Auth::user()->id;

             # Update category
             if (isset($request->id)) {
                 //unset($param['_method']); // if PUT route is defined
                 Category::where('id', $param['id'])->update($param);
                 $msg = "Category has been updated successfully";
             }
             # Insert
             else {
                 Category::create($param);
                 $msg = "Category has been created successfully";
             }
         } catch (Exception $e) {
             return redirect()->back()->withError($e->getMessage());
         }
         # Redirect to all categories
         return redirect()->route('categories')->withStatus($msg);
    }
}
