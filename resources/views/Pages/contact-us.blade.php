@extends('template')

@section('abc')
<section class="grid grid-cols-1 md:grid-cols-3 gap-5 my-10">
  <div class="contact-info col-span-2">
    <h1 class="text-4xl font-bold mb-3">Contact Us</h1>
    <p class="mb-9">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
    <div class="flex gap-5 mb-8">
      <input type="text" placeholder="Your Name" class="border-2 border-gray-500 px-5 py-3 w-1/2 outline-none">
      <input type="text" placeholder="Your Email" class="border-2 border-gray-500 px-5 py-3 w-1/2 outline-none">
    </div>
    <input type="text" placeholder="subject" class="border-2 w-full border-gray-500 px-5 py-3 outline-none mb-8">
    <textarea name="Message" rows="5" id="message" class="block border-2 border-gray-500 hover: px-2 py-3 w-full outline-none" placeholder="message"></textarea>
    <div class="flex items-center w-fit mt-8 gap-4 font-semibold">
      <input type="checkbox" name="sub" id="sub" class="h-5 w-5 text-5xl">
      <label for="checkbox">Also subscribe us</label>
    </div>
    <button class="bg-gray-900 hover:bg-red-500 px-4 py-3 text-white mt-8">Send message</button>
  </div>
  <div class="img">
    <img src="{{asset ('img/overlay.jpg')}}" alt="">
  </div>
</section>
@endsection