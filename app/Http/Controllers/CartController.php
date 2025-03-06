<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function addToCart(Request $request)
    {
        $user = Auth::user();

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);


        $quantity = filter_var($quantity, FILTER_VALIDATE_INT);
        if ($quantity <= 0 || $quantity > 99) {
            return redirect()->back()->with('error', 'Invalid quantity');
        }


        $product = Product::find($productId);
        if (!$product) {
            return redirect()->route('home')->with('error', 'Product not found');
        }


        $cartItem = Cart::where('user_id', $user->id)->where('product_id', $productId)->first();

        if ($cartItem) {

            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $productId,
                'quantity' => $quantity
            ]);
        }

        return redirect()->route('add.to.cart')->with('success', 'Product added to cart successfully');
    }


    public function showCart()
    {
        $user = Auth::user();
        $cartItems = Cart::with('product')->where('user_id', $user->id)->get();

        $subtotal = 0;
        foreach ($cartItems as $item) {
            $subtotal += $item->product->price * $item->quantity;
        }


        return view('Pages.add-to-cart', compact('cartItems', 'subtotal'));
    }
    public function removeFromCart($id)
    {
        $user = Auth::user();


        $cartItem = Cart::where('user_id', $user->id)->where('id', $id)->first();

        if ($cartItem) {
            $cartItem->delete();
            return redirect()->route('add.to.cart')->with('success', 'Item removed from cart successfully.');
        } else {
            return redirect()->route('add.to.cart')->with('error', 'Item not found in cart.');
        }
    }

    public function getCheckout()
    {
        $user = Auth::user();
        $cartItems = Cart::with('product')->where('user_id', $user->id)->get();

        $subtotal = 0;
        foreach ($cartItems as $item) {
            $subtotal += $item->product->price * $item->quantity;
        }

        return view('Pages.checkout', compact('cartItems', 'subtotal'));
    }
}
