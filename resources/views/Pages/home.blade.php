@props(['categories'])
@props(['products'])
@props(['carts'])
@extends('template')

@section('abc')
<section id="hero-container" class=" flex mt-10 items-center gap-6 h-[550px]">
  <div class="w-[300px] shadow-xl shadow-gray-300 flex-0.4">
    <div class=" flex justify-center items-center gap-2 bg-gray-800 text-white h-[70px]">
      <div>
        <i class='bx bx-menu-alt-left text-3xl'></i>
      </div>
      <div>
        <h1>Browse Our Sales</h1>
      </div>
    </div>
    <div>
      <ul>
        <li class="flex items-center pl-5 gap-2 border-b-[1px] border-b-gray-300 h-[70px] hover:text-red-400 cursor-pointer"><i class='bx bx-star text-2xl'></i><a href="#" class="font-[500]">Newest item</a></li>
        <li class="flex items-center pl-5 gap-2 border-b-[1px] border-b-gray-300 h-[70px] hover:text-red-400 cursor-pointer"><i class='bx bx-star text-2xl'></i><a href="#" class="font-[500]">On Sale</a></li>
        <li class="flex items-center pl-5 gap-2 border-b-[1px] hover:text-red-400 cursor-pointer  border-b-gray-300 h-[70px]"><i class='bx bx-star text-2xl'></i><a href="#" class="font-[500]">Accessories</a></li>
        <li class="flex items-center hover:text-red-400 cursor-pointer pl-5 gap-2 h-[55px] border-b-[1px] border-b-gray-300"><i class='bx bx-star text-2xl'></i><a href="#" class="font-[500]">Backpack</a></li>
        <li class="flex items-center hover:text-red-400 cursor-pointer pl-5 gap-2 border-b-[1px] border-b-gray-300 h-[70px]"><i class='bx bx-star text-2xl'></i><a href="#" class="font-[500]">Dresses</a></li>
        <li class="flex items-center hover:text-red-400 cursor-pointer pl-5 gap-2 border-b-[1px] border-b-gray-300 h-[70px]"><i class='bx bx-star text-2xl'></i><a href="#" class="font-[500]">Tops and T-shirts</a></li>
        <li class="flex items-center hover:text-red-400 cursor-pointer pl-5 gap-2 border-b-[1px] border-b-gray-300 h-[70px]"><i class='bx bx-star text-2xl'></i><a href="#" class="font-[500]">Others</a></li>

      </ul>
    </div>
  </div>
  <div id="right-container" class="flex-0.6 w-full h-full">
    <div class="bg-cover bg-no-repeat bg-center h-full w-full"
      style="background-image: url({{asset('img/slider-1.jpg')}})">
      <div class="p-16">
        <h1 class="bg-red-500 text-white px-3 max-w-32 py-1 text-center rounded-sm text-[15px]">SUM-24</h1>
        <h1 class="text-6xl font-bold m-0 h-fit mt-5">SS-2024</h1>
        <h1 class="text-6xl font-bold mb-5 h-fit">Top Trending</h1>

        <button class="border-[1px] border-black px-10 py-4 mt-5 ml-3 hover:bg-red-400 hover:border-white hover:text-white ease-in-out duration-300">Shop Now</button>
      </div>
    </div>

</section>

<section class="text-center mt-20">
  <div>
    <h1 class="text-[45px] font-semibold">Trending Category</h1>
    <p class="text-gray-500 mb-10">Find a bright ideal to suit your taste with our great selection of suspension.</p>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 mx-5 gap-10">
      @foreach($categories as $category)
      <div class="flex flex-col mx-auto">
        <img src="{{asset('images/categories/'. $category->image)}}" alt="no-img" class="rounded-full w-fit">
        <h1 class="mx-auto font-semibold text-2xl hover:border-b-red-500 hover:text-red-400">{{$category->name}}</h1>
        <p class="mx-auto text-gray-500"><span>5</span> products</p>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section class="mt-20 text-center mx-auto">
  <div>
    <h1 class="text-[45px] font-semibold">New Arrivals</h1>
    <p class="text-gray-500 mb-10">Add our new arrivals to your weekly lineups</p>
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
          <div class="flex justify-between items-center gap-4 rounded-lg h-2 mt-1 w-full">
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
  </div>

</section>

<section class="grid grid-cols-1 md:grid-cols-5 gap-5 mx-5 mt-20 h-[470px]">
  <div class="max-md:hidden md:col-span-2">
    <div style="background-image: url('{{ asset('img/banner-1.jpg') }}')" class="bg-cover bg-no-repeat bg-center w-full h-full">
      <div class="flex flex-col justify-center items-center h-full">
        <img src="{{asset('img/Special-Sale.png')}}" alt="special sale">
        <div>
          <h1 class="uppercase font-semibold">enter code: <span class="bg-red-400 text-white px-2 py-1">sum50</span></h1>
        </div>
        <h1 class="text-red-500 text-6xl font-bold my-5">50% OFF</h1>
        <button class="text-white text-lg bg-black px-10 py-4 hover:bg-red-400">Shop Now</button>
      </div>
    </div>
  </div>

  <div class="col-span-1 md:col-span-3">
    <div style="background-image: url('{{ asset('img/banner-2.jpg') }}')" class="bg-cover bg-no-repeat bg-center w-full h-full">
      <div class="flex flex-col justify-end items-start pl-8 pb-12 h-full mx-5">
        <h1 class="font-bold text-2xl text-red-400 mb-3">New Season</h1>
        <h1 class="text-white bg-black text-4xl font-bold mb-12 p-1">Summer Collection</h1>
        <button class="text-white text-lg bg-black px-10 py-4 hover:bg-red-400 mb-12">Shop Now</button>
      </div>
    </div>
  </div>
</section>

<section class="bg-green-50 h-[200px] w-full mt-32 flex justify-around
 items-center">
  <div class="flex-1 flex flex-col justify-center items-center ">
    <h1 class="text-left text-[2.5rem] font-semibold"><span><i class='bx bx-arrow-back bx-rotate-180 text-3xl font-bold'></i></span> Get In Touch</h1>
    <p class="text-gray-500 font-semibold text-[17px]">Subscribe for latest Stories and promotion.</p>
  </div>
  <div class="flex-1 flex w-full justify-center items-center">
    <input type="text" name="newsletter" id="newsletter" placeholder="Get in touch" class="outline-none border-2 h-12 px-1 w-[50%] ">
    <button class="px-9 py-3 bg-black text-white hover:bg-red-400">Subscribe</button>
  </div>
</section>

@endsection