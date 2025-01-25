@extends('template')

@section('abc')
<section id="title" class=" text-center">
  <h1 class="text-5xl font-bold pb-4">About Us</h1>
  <p class=" text-center w-1/2 mx-auto text-[17px]">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo, atque. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam, quo.</p>
  <img src="{{asset('img/chill-guy.webp')}}" alt="no-about-img" class="mt-10 mx-auto w-[80%]">
</section>
<section class="w-[80%] mx-auto mt-16">
  <h1 class="text-[36px] mb-7">E-Mart - Your Premier Shopping Destination in Nepal</h1>
  <h3 class="text-[18px] mb-5">E-Mart brings you a curated collection of high-quality products focused on innovation, simplicity, and practicality. Our mission is to offer a unique range of items that inspire and elevate the everyday experience. From the design to the packaging, we ensure each product meets the highest standards of excellence, blending functionality with style.</h3>
  <p class="text-gray-500 mb-5">Our products are carefully selected and sourced from various countries around the world. Whether it's from the rich craftsmanship of Nepal or the contemporary designs of international brands, E-Mart offers products that reflect the latest trends and quality. Some of our featured items are exclusive to the Nepalese market, making us a one-of-a-kind shopping destination in the region.</p>
  <h4 class="font-semibold text-gray-600">If you have any questions or need assistance with a product or order, feel free to contact us at <span class="text-red-500 cursor-pointer">emart@gmail.com</span>. We're always here to help!</h4>
</section>
<section id="mission" class="w-[80%] mx-auto mt-16">
  <div class="flex justify-between items-start border-b-2 border-b-gray-300 pb-5">
    <h1 class="w-1/3 text-4xl font-bold">Our Mission</h1>
    <p class="flex-0.5 w-3/4">At E-Mart, we are committed to providing our customers with an exceptional shopping experience by offering a diverse selection of high-quality products. Our mission is to deliver innovation, simplicity, and practicality in every item we offer. We strive to source products that reflect the best of global craftsmanship and design while staying true to our roots in Nepal. By curating products that inspire and enhance daily life, we aim to be a trusted destination for all your shopping needs.</p>
  </div>
  <div class="flex justify-between items-start mt-5">
    <h1 class="w-1/3 text-4xl font-bold">Our Mission</h1>
    <p class="flex-0.5 w-3/4">E-Mart is dedicated to bringing you a seamless shopping experience with a focus on quality, affordability, and customer satisfaction. We aim to offer a thoughtfully curated selection of products from local and international brands, each designed to enhance your lifestyle. By sourcing the best of innovation and craftsmanship, we provide products that not only meet your needs but inspire your everyday moments. Our mission is to be your trusted partner in discovering products that make life simpler, smarter, and more enjoyable.</p>
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