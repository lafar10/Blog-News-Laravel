<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.admin_category', compact('categories'));
    }

    public function store(Request $request)
    {
        $categories = Category::create([
            'category_name_en' => $request->input('category_name_en'),
            'category_name_ar' => $request->input('category_name_ar'),
        ]);

        $categories->save();
    }
}
