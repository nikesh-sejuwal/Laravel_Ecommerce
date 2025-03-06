@props(['products'])
@extends('template')

@section('abc')
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">

  @foreach($products as $product)
  <a href="{{route('product.details',['id'=>$product->id])}}">
    <div class="flex flex-col items-center mx-auto justify-center">
      <div class="relative">
        <img src="{{ asset('images/products/' . $product->image) }}" alt="no-img" class="max-w-[250px] max-h-[360px]">

        <div class="absolute top-0 flex flex-col right-0 rounded-3xl cursor-pointer "><i class='bx bx-heart text-3xl text-gray-400 hover:bg-red-500 hover:text-white rounded-3xl p-2'></i>
          <i class='bx bx-cart-alt text-3xl text-gray-400 hover:bg-red-500 hover:text-white rounded-3xl p-2'></i>
        </div>
      </div>
      <h1 class="mt-2 text-[15px] hover:border-b-red-500 hover:text-red-400">{{$product->name}}</h1>
      <div class="flex justify-between items-center gap-4 rounded-lg h-2 mt-1 w-[70%]">
        <div class="bg-gray-300 rounded-lg w-[100%] h-2">
          <div class="bg-black rounded-e-sm rounded-s-lg w-[70%] h-2"></div>
        </div>
        <div>
          <h1>7/10</h1>
        </div>
      </div>
      <div class="flex gap-2 mt-1 items-center">
        <del>$10.00</del>
        <p class="text-red-400 font-bold text-[18px]">${{$product->price}}.00</p>
      </div>
    </div>
  </a>
  @endforeach
</div>
<!-- Pagination Links -->
<div class="w-[80%] mt-10">
  {{ $products->links() }}
</div>
@endsection