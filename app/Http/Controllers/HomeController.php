<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getCategory(Request $request)
    {
        $categories = Category::all();
        return view('admin.category.manage', compact('categories'));
    }
    public function postAddCategory(Request $request)
    {
        $category = new \App\Models\Category();
        $category->name = $request->input('name');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/categories'), $filename);
            $category->image = $filename;
        }
        $category->description = $request->input('description');
        $category->save();

        return redirect()->back()->with('success', 'Category added successfully!');
    }

    public function getProduct(Request $request)
    {
        $products = Product::paginate(10);
        $categories = Category::all();
        return view('admin.product.manage', compact('products', 'categories'));
    }


    public function postAddProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,jpeg,png',
            'description' => 'sometimes|string|max:65535',
            'category_id' => 'required|exists:categories,id',
        ]);

        $data = ($validator->validated());

        if ($validator->fails()) {
            return redirect()->back()->with('failed', $validator->errors());
        }

        // $name = $request->input('name');
        // $price = $request->input('price');
        $image = $request->file('image');
        // $description = $request->input('description');
        // $category_id = $request->input('category_id');

        $filename = md5($image) . '.' . $request->image->extension();
        $request->image->move(public_path('images/products/'), $filename);

        $data['image'] = $filename;

        Product::create($data);

        return redirect()->back()->with('success', 'Product added successfully!');
    }


    // ESEWA INTEGRATION

    public function paideSewa()
    {

        $amount = '200';

        $skey = '8gBm/:&EnhH.1/q';
        $transaction_uuid =  Str::random(10);
        $product_code = 'EPAYTEST';


        // Create signature
        $dataString = "total_amount={$amount},transaction_uuid={$transaction_uuid},product_code={$product_code}";
        $hash = hash_hmac('sha256', $dataString, $skey, true); // Use hex output
        $signature = base64_encode($hash); // Base64 encode the hash

        $form = '
            <form id="esewa_form" action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
            <input type="hidden" id="amount" name="amount" value="' . $amount . '" required>
            <input type="hidden" id="tax_amount" name="tax_amount" value ="0" required>
            <input type="hidden" id="total_amount" name="total_amount" value="' . $amount . '" required>
            <input type="hidden" id="transaction_uuid" name="transaction_uuid" value="' . $transaction_uuid . '" required>
            <input type="hidden" id="product_code" name="product_code" value ="' . $product_code . '" required>
            <input type="hidden" id="product_service_charge" name="product_service_charge" value="0" required>
            <input type="hidden" id="product_delivery_charge" name="product_delivery_charge" value="0" required>
            <input type="hidden" id="success_url" name="success_url" value="https://localhost:8000/esewa/success" required>
            <input type="hidden" id="failure_url" name="failure_url" value="https://google.com" required>
            <input type="hidden" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required>
            <input type="hidden" id="signature" name="signature" value="' . $signature . '" required>
            <input value="Submit" type="submit" style="opacity: 0;">
            </form>
            ';
        // dd($form);

        $form .= '<script type="text/javascript">document.getElementById("esewa_form").submit();</script>';

        return response($form);
    }
}
