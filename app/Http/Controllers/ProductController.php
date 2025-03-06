<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

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
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all(); // Fetch all categories
        return view('admin.product.edit-page', compact('product', 'categories'));
    }
    public function update(Request $request, $id)
    {
        // Find the product by ID
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('failed', 'Product not found.');
        }

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png', // Ensure the image is valid
            'description' => 'sometimes|string|max:65535',
            'category_id' => 'required|exists:categories,id',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Get validated data
        $data = $validator->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($product->image && file_exists(public_path('images/products/' . $product->image))) {
                unlink(public_path('images/products/' . $product->image));
            }

            // Generate an MD5-encrypted filename
            $image = $request->file('image');
            $filename = md5($image->getClientOriginalName() . time()) . '.' . $image->extension();

            // Move the uploaded image to the desired folder
            $image->move(public_path('images/products/'), $filename);

            // Add the new image filename to the data array
            $data['image'] = $filename;
        }

        // Update the product with the new data
        $product->update($data);

        // Redirect with a success message
        return redirect()->route('product')->with('success', 'Product updated successfully');
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product')->with("success", "Product deleted successfully");
    }
}
