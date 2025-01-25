@extends('template')

@section('abc')
<section class="flex justify-center items-center">
  <div class="w-full flex-1 px-20 py-5">
    <h1 class="text-2xl font-semibold">Billing Address</h1>
    <h2 class="text-lg">Contents here ..............</h2>
  </div>

  <div class="w-full flex-1 flex flex-col items-center px-20 py-5">
    <h1 class="mb-10">Total here ......</h1>
    <h1>Payment METHODS</h1>
    <a href="{{route('esewa.pay')}}"><button class="mt-5 w-fit bg-green-500 px-4 py-2 text-white text-lg font-semibold">Esewa</button></a>
  </div>
</section>
@endsection