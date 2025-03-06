@extends('layouts.app')

@if(session('failed'))
<div class="bg-red-500 text-white">{{ session('failed') }}</div>
@endif
@if(session('success'))
<div class="bg-green-500 text-white">{{ session('success') }}</div>
@endif
@section('content')
<div class="container mx-auto p-4">
  <div class="flex justify-center">
    <div class="w-full max-w-4xl">
      <div class="bg-white shadow-lg rounded-lg">
        <div class="bg-gray-200 px-4 py-2 text-lg font-semibold">{{ __('Edit Product') }}</div>
        <div class="p-4">
          <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if($errors->any())
            <div class="bg-red-500 text-white p-4 mb-4 rounded-lg">
              <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <div class="grid gap-4 mb-4 grid-cols-2">
              <div class="col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Product Name</label>
                <input type="text" name="name" id="name" value="{{ $product->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
              </div>
              <div class="col-span-2">
                <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Product Image</label>
                {{$product->image}}
                <input type="file" name="image" id="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
              </div>
              <div class="col-span-2">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Product Description</label>
                <textarea id="description" rows="4" name="description" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{ $product->description }}</textarea>
              </div>
              <div class="col-span-2">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
                <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="$2999" value="{{$product->price}}">
              </div>
              <div class="col-span-2">
                <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                <select name="category_id" id="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                  <option value="">Select a category</option>
                  @foreach($categories as $category)
                  <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                  </option>
                  @endforeach
                </select>
              </div>
            </div>
            <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
              Update Product
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection