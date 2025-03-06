@extends('layouts.app')

@section('content')
<section class="flex items-start gap-5 p-10">
  <!-- Billing Address Form -->
  <div class="flex-1">
    <h1 class="text-2xl font-semibold mb-5">Billing Address</h1>
    <form id="checkoutForm" class="bg-white p-6 rounded-lg shadow-md" method="POST" action="{{ route('esewa.pay') }}">
      @csrf
      <div class="grid gap-4">
        <!-- Full Name -->
        <div>
          <label for="full_name" class="block text-sm font-medium text-gray-700">Full Name</label>
          <input type="text" name="full_name" id="full_name" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <!-- Email -->
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input type="email" name="email" id="email" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <!-- Address -->
        <div>
          <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
          <input type="text" name="address" id="address" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <!-- City -->
        <div>
          <label for="city" class="block text-sm font-medium text-gray-700">City</label>
          <input type="text" name="city" id="city" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <!-- Province Dropdown -->
        <div>
          <label for="state" class="block text-sm font-medium text-gray-700">Province</label>
          <select name="state" id="state" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
            <option value="">Select Province</option>
            <option value="Province-1">Province-1</option>
            <option value="Province-2">Koshi</option>
            <option value="Province-3">Bagmati</option>
            <option value="Province-4">Gandaki</option>
            <option value="Province-5">Lumbuni</option>
            <option value="Province-6">Province-6</option>
            <option value="Province-7">Province-7</option>
          </select>
        </div>
      </div>

      <!-- Payment Method Selection (Only Esewa Option) -->
      <div class="mt-6">
        <h2 class="text-lg font-semibold mb-3">Payment Method</h2>
        <div class="flex flex-col gap-3">
          <!-- Esewa -->
          <label class="flex items-center">
            <input type="radio" name="payment_method" value="esewa" class="mr-2" checked>
            <span>Pay with Esewa</span>
          </label>
        </div>
      </div>
      <input type="hidden" name="subtotal" value="{{ $subtotal }}">
      <!-- Place Order Button -->
      <button type="submit" class="mt-6 w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">
        Place Order
      </button>
    </form>
  </div>

  <!-- Payment Method and Total Bill -->
  <div class="flex-0.5 border-2 px-6 py-10">
    <h1 class="text-center text-2xl font-bold mb-10">Cart Totals</h1>
    <div class="flex justify-center gap-10 items-center">
      <div class="flex flex-col gap-5">
        <h1 class="text-xl font-semibold">Subtotal:</h1>
        <h1 class="text-lg font-semibold">Shipping Cost</h1>
        <h1 class="text-lg font-semibold">Total</h1>
        <!-- Added a line for total in NPR -->
        <h1 class="text-lg font-semibold">Total (NPR)</h1>
      </div>
      <div class="flex flex-col gap-5">
        <h2 class="text-red-400 font-bold">${{ $subtotal ?? 0 }}</h2>
        <h2 class="text-red-400 font-bold">FREE</h2>
        <h2 class="text-red-400 font-bold border-t-red-400 border-t-2">${{ $subtotal ?? 0 }}</h2>
        <!-- Total in NPR (multiplied by 139) -->
        <h2 class="text-red-400 font-bold">Rs {{ ($subtotal ?? 0) * 139 }}</h2>
      </div>
    </div>
  </div>
</section>
@endsection