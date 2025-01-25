@props(['products'])

<div>
    @foreach($products as $product)
    <p>{{ $product->name }}</p>
    <p>{{ $product->price }}</p>
    <p>{{ $product->image }}</p>
    @endforeach
</div>