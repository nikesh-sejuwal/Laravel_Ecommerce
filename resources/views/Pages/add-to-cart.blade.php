@extends('template')


@section('abc')

@if(session('success'))
<div class="bg-green-400 text-white p-3">{{ session('success') }}</div>
@endif
<section class="flex items-start gap-5">
  <table class="flex-1 border-2 table-fixed w-full">
    <thead>
      <tr>
        <th class="w-1/6 overflow-hidden text-ellipsis">Photo</th>
        <th class="w-1/6 overflow-hidden text-ellipsis">Product</th>
        <th class="w-1/6 overflow-hidden text-ellipsis">Price</th>
        <th class="w-1/6 overflow-hidden text-ellipsis">Quantity</th>
        <th class="w-1/6 overflow-hidden text-ellipsis">Subtotal</th>
        <th class="w-1/6 overflow-hidden text-ellipsis">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($cartItems as $item)
      <tr class="text-center ml-6 border-y-2">

        <td class="w-1/6">
          <img src="{{ asset('images/products/'.$item->product->image) }}" alt="{{ $item->product->name }}" class="w-16 h-16 object-cover">
        </td>
        <td class="w-1/6 overflow-hidden text-ellipsis">{{ $item->product->name }}</td>
        <td class="w-1/6 overflow-hidden text-ellipsis">${{ $item->product->price }}</td>
        <td class="w-1/6 overflow-hidden text-ellipsis">{{ $item->quantity }}</td>
        <td class="w-1/6 overflow-hidden text-ellipsis">${{ $item->product->price * $item->quantity }}</td>
        <td>
          <form action="{{ route('remove.from.cart', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this item?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">X</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>

  </table>

  <div class="flex-0.5 border-2 px-6 py-10">
    <div>
      <h1 class="text-center text-2xl font-bold mb-10">Cart totals</h1>
      <div class="flex justify-center gap-10 items-center">
        <div class="flex flex-col gap-5">
          <h1 class="text-xl font-semibold">Sub total:</h1>
          <h1 class="text-lg font-semibold">Shipping Cost</h1>
          <h1 class="text-lg font-semibold">Total</h1>
        </div>
        <div class="flex flex-col gap-5">
          <h2 class="text-red-400 font-bold">${{ $subtotal }}</h2>
          <h2 class="text-red-400 font-bold">FREE</h2>
          <h2 class="text-red-400 font-bold border-t-red-400 border-t-2">${{ $subtotal }}</h2>
        </div>
      </div>
    </div>
    <div class="flex justify-end mt-5">
      <a href="{{route('checkout')}}" class="bg-black hover:bg-red-400 text-white font-bold py-2 px-4 rounded">
        Proceed to Checkout
      </a>
    </div>
  </div>
</section>
@endsection