<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categoryz = Category::all();
        return view('admin.category.index', compact('categoryz'));
    }
    public function add()
    {
        return view('admin.category.add');
    }
    public function insert(Request $request)
    {
        $category = new Category();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/category', $filename);
            $category->image = $filename;
        }

        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->custom_url = $request->input('custom_url');
        $category->status = $request->input('status') == True ? '1' : '0';
        $category->is_popular = $request->input('is_popular') == True ? '1' : '0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_description = $request->input('meta_description');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->save();
        return redirect('/dashboard')->with('status', 'Category sucessfully added');
    }
}
