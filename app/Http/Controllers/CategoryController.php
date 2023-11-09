<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate('5');
        return view('admin.category.category', compact('categories'));
    }

    public function AddCat(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);

        Category::create([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);


        return redirect()->back()->with('succes', 'Category Inserted Successfully');
    }
    public function Edit($id)
    {
        $categories = Category::find($id);
        return view('admin.category.edit', compact('categories'));
    }

    public function Update(Request $request, $id)
    {
        Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
        ]);
        return Redirect()->route('AllCat')->with('success', 'Updated Succesfully');
    }
    public function delete(Request $request, $id)
    {
        $category = Category::find($id);
        $category->forceDelete();
    
        return redirect()->route('AllCat')->with('success', 'Deleted Successfully');
    }
}