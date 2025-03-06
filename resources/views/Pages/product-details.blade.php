@props(['product'])
@extends('template')

@section('abc')
<div class="container mx-auto mt-10 flex gap-8">

  <div class="flex flex-col gap-4">

    <div class="flex flex-col gap-2">
      @for ($i = 1; $i <= 4; $i++)
        <img src="{{ asset('img/'.'product' . $i . '.jpg') }}" alt="product-thumb-{{ $i }}"
        class="max-w-[150px] max-h-[90px] border hover:border-red-400 cursor-pointer">
        @endfor
    </div>
  </div>

  <div class="flex-grow w-full">
    <div class="relative">
      <span class="absolute top-2 left-2 bg-red-500 text-white px-2 py-1 text-sm font-bold">SALE!</span>
      <img src="{{ asset("images/products/$product->image") }}" alt="Product Image" class="w-full max-w-lg h-auto">
    </div>
  </div>

  <div class="w-full">
    <h1 class="text-2xl font-bold mb-2">{{$product->name}}</h1>
    <div class="text-lg mb-2">
      <del class="text-gray-500">$70.00</del>
      <span class="text-red-500 font-bold">${{$product->price}}.00</span>
    </div>

    <ul class="list-disc pl-2 text-gray-700 mb-4">
      <p>{{$product->description}}</p>
    </ul>
    <p class="text-green-500 font-bold mb-4">99 in stock</p>

    <div class="flex items-center gap-4 mb-4">
      <!-- Quantity Selection Form -->
      <form action="{{ route('add.to.cart') }}" method="POST" class="flex items-center border border-gray-300 rounded">
        @csrf

        <!-- Product ID (hidden) -->
        <input type="hidden" name="product_id" value="{{ $product->id }}">

        <!-- Decrease quantity button -->
        <button type="button" class="px-4 py-2 bg-gray-200" onclick="decreaseQuantity(this)">-</button>

        <!-- Input field for quantity -->
        <input type="number" name="quantity" value="{{ old('quantity', 1) }}" min="1" max="99" class="w-12 text-center border-0" id="quantity-input">

        <!-- Increase quantity button -->
        <button type="button" class="px-4 py-2 bg-gray-200" onclick="increaseQuantity(this)">+</button>

        <!-- Add to Cart Button -->
        <button type="submit" class="bg-black text-white px-6 py-2 rounded hover:bg-red-500">Add To Cart</button>
      </form>

      <!-- JavaScript for handling quantity increment/decrement -->
      <script>
        function decreaseQuantity(button) {
          let input = button.nextElementSibling;
          let value = parseInt(input.value);
          if (value > 1) {
            input.value = value - 1;
          }
        }

        function increaseQuantity(button) {
          let input = button.previousElementSibling;
          let value = parseInt(input.value);
          if (value < 99) {
            input.value = value + 1;
          }
        }
      </script>
    </div>

    <!-- Additional Details -->
    <div class="mt-4 text-gray-700">
      <p><strong>SKU:</strong> WWN-21-1</p>
      <p><strong>Categories:</strong> {{$product->category->name}}</p>
      <p><strong>Tags:</strong> Tag-02</p>
    </div>
  </div>
</div>
@endsection