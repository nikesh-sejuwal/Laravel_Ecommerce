<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-COM</title>
  @vite(['resources/css/app.css'])
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: "Quicksand", sans-serif;
    }

    .is-active {
      color: red;
      border-bottom: 1px solid red;
      width: fit-content;
    }
  </style>
</head>

<body class="w-[95%] xl:w-[85%] mx-auto mt-5 scroll-smooth">
  <section>
    <div class="flex justify-between items-center mb-2 p-2.5 border-b border-gray-200">
      <div class="font-bold text-lg cursor-pointer border border-transparent hover:border-red-400 px-1.5 py-1">
        <a href="/"><img class="w-44" src="{{ asset('img/EmartLogo.png') }}" alt="Logo goes here"></a>
      </div>

      <div class="flex items-center space-x-3">
        <a href="{{ route('add.to.cart') }}">
          <i class='relative bx bx-shopping-bag text-4xl mr-4 cursor-pointer hover:text-red-400' title="Add to Cart">
            @php
            $cartCount = \App\Models\Cart::where('user_id', Auth::id())->sum('quantity');
            @endphp
            <span class="bg-red-500 text-white px-2 py-1 text-[14px] font-semibold absolute top-[-10px] left-4 rounded-full">
              {{ $cartCount > 0 ? $cartCount : 0 }}
            </span>
          </i>
        </a>

        <a href="/login"><i class='bx bx-user text-4xl  cursor-pointer hover:text-red-400' title="User"></i></a>
      </div>
    </div>
    <nav class="flex justify-between items-center px-4 pb-5 shadow-md">
      <ul class="flex space-x-4 text-lg flex-wrap">
        <li class="navs"><a href="/" class="border border-transparent px-1 py-1 hover:border-b-red-400 hover:text-red-500 font-[500]">Home</a></li>
        <li class="navs"><a href="{{ route('products') }}" class="border border-transparent px-1 py-1 hover:border-b-red-400 hover:text-red-500 font-[500]">Product</a></li>
        <li class="navs"><a href="/about-us" class="border border-transparent px-1 py-1 hover:border-b-red-400 hover:text-red-500 font-[500]">About Us</a></li>
        <li class="navs"><a href="/contact-us" class="border border-transparent px-1 py-1 hover:border-b-red-400 hover:text-red-500 font-[500]">Contact Us</a></li>
      </ul>
      <div class="flex items-center space-x-4">
        <i class='bx bx-phone-call text-red-400 text-3xl'></i>
        <div>
          <p class="text-gray-400 mb-1">Support</p>
          <p class="font-bold">012-23-43-23</p>
        </div>
      </div>
    </nav>
  </section>

  <!-- PAGE CONTENT -->
  <section id="page-content" class="mt-7 max-md:mx-5">
    @yield('abc')
  </section>


  <!-- Footer -->

  <section id="footer" class="flex justify-between items-start mt-24 pb-12 px-5 border-b border-gray-300">
    <div class="space-y-4">
      <img class="w-52" src="{{asset('img/EmartLogo.png')}}" alt="no-logo">
      <div>
        <p>Address: Ranipauwa 11 Pokhara</p>
        <p>Phone: +977-9809898098</p>
        <p>Email: <span class="text-red-400">emart@gmail.com</span></p>
      </div>
    </div>
    <div class="flex flex-[0.6] justify-around">
      <div>
        <p class="font-bold mb-2 text-lg">About Us</p>
        <ul class="space-y-3">
          <li><a href="#" class="hover:text-red-400">Shipping</a></li>
          <li><a href="#" class="hover:text-red-400">Order Tracking</a></li>
          <li><a href="#" class="hover:text-red-400">FAQs</a></li>
          <li><a href="#" class="hover:text-red-400">Help</a></li>
        </ul>
      </div>
      <div>
        <p class="font-bold mb-2 text-lg">Connect</p>
        <ul class="space-y-3">
          <li><a href="#" class="hover:text-red-400">Facebook</a></li>
          <li><a href="#" class="hover:text-red-400">Twitter</a></li>
          <li><a href="#" class="hover:text-red-400">Google</a></li>
          <li><a href="#" class="hover:text-red-400">Instagram</a></li>
        </ul>
      </div>
    </div>
    <div>
      <p class="font-bold mb-2 text-lg">Useful Links</p>
      <div class="flex space-x-10">
        <ul class="space-y-3">
          <li><a href="#" class="hover:text-red-400">Women</a></li>
          <li><a href="#" class="hover:text-red-400">Men</a></li>
          <li><a href="#" class="hover:text-red-400">Kid</a></li>
          <li><a href="#" class="hover:text-red-400">Accessories</a></li>
        </ul>
        <ul class="space-y-3">
          <li><a href="#" class="hover:text-red-400">Newest items</a></li>
          <li><a href="#" class="hover:text-red-400">On Sale</a></li>
          <li><a href="#" class="hover:text-red-400">Shoes</a></li>
          <li><a href="#" class="hover:text-red-400">Tops</a></li>
        </ul>
      </div>
    </div>
  </section>
  <div class="text-center text-gray-500 text-base mt-6">
    &copy; Copyright 2024 Emart - All Rights Reserved - <a href="https://www.nikeshsejuwal.com.np" target="_blank" class="text-red-400">nikeshsejuwal</a>
  </div>

  @vite(['resources/js/app.js'])
  <!-- <script src="{{ asset('js/app.js') }}"></script> -->
</body>

</html>