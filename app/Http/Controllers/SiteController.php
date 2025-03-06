<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use function compact;

class SiteController extends Controller
{
    public function getHome()
    {
        $categories = Category::all();
        $products = Product::paginate(8);
        return view('Pages.home', compact('categories', 'products'));
    }
    public function getCategory()
    {
        return view('Pages.category');
    }
    public function getProduct()
    {
        return view('Pages.product');
    }
    public function getAbout()
    {
        return view('Pages.about');
    }
    public function getContact()
    {
        return view('Pages.contact-us');
    }
    public function getProductDetails($id)
    {
        // Sample product data (replace with real data as needed)
        $product = [
            'id' => $id,
            'name' => 'Silky Printed Short Sleeve',
            'image' => 'product-01.jpg',
            'description' => 'A stylish and comfortable short sleeve.',
            'price' => '8.99',
            'original_price' => '10.00',
            'rating' => '7/10',
        ];

        return view('Pages.product-details', compact('product'));
    }
    public function getAddtoCart()
    {
        return view('Pages.add-to-cart');
    }
}
