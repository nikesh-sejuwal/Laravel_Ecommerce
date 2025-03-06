<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit-category', compact('category'));
    }

    public function update(Request $request, $id)
    {
        // Find the category by ID
        $category = Category::find($id);

        if (!$category) {
            return redirect()->back()->with('failed', 'Category not found.');
        }

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'description' => 'sometimes|string|max:65535',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $data = $validator->validated();


        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($category->image && file_exists(public_path('images/categories/' . $category->image))) {
                unlink(public_path('images/categories/' . $category->image));
            }

            // Generate an MD5-encrypted filename
            $image = $request->file('image');
            $filename = md5($image->getClientOriginalName() . time()) . '.' . $image->extension();

            // Move the uploaded image to the desired folder
            $image->move(public_path('images/categories/'), $filename);

            // Add the new image filename to the data array
            $data['image'] = $filename;
        }

        // Update the category with the new data
        $category->update($data);

        // Redirect with a success message
        return redirect()->route('category')->with('success', 'Category updated successfully');
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return redirect()->route('category')->with('failed', 'Category not found.');
        }

        // Delete the category image if it exists
        if ($category->image && file_exists(public_path('images/categories/' . $category->image))) {
            unlink(public_path('images/categories/' . $category->image));
        }

        $category->delete();

        return redirect()->route('category')->with('success', 'Category deleted successfully');
    }
}
