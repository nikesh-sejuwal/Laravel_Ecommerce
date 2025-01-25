<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $products = Product::paginate(12);
        // dd($products);
        return view('Pages.product', compact('products'));
    }
    public function show($id)
    {
        $product = Product::find($id);
        return view('Pages.product-details', compact('product'));
    }
}
