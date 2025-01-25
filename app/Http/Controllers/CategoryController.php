<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
 use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(Request $request): View
    {
        $categories = Category::all();
        return view('admin.category.manage', compact('categories'));
    }
}
