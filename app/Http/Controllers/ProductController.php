<?php

namespace App\Http\Controllers;

use App\Models\Model\Cart;
use App\Models\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view("backend.product", compact('products'));
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view("Products.show", ["result" => $product]);
    }
    public function delete($id)
    {
        $product = Product::findOrFail($id);
        if ($product->cate_img && file_exists(public_path("img/products/" . $product->cate_img))) {
            unlink(public_path("img/products/" . $product->cate_img));
        }
        $product->delete();
        return redirect()->route("products")->with("message2", "Deleted successfully");
    }
    public function create()
    {
        return view("Products.create");
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'price' => 'required|numeric',
                'quantity' => 'required|integer',
                'cate_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ],
        );
        $imageName = null;
        if ($request->hasFile("cate_img")) {
            $image = $request->cate_img;
            $imageName = time() . "_" . rand(1, 1000) . "." . $image->extension();
            $image->move(public_path("img/products"), $imageName);
        }
        Product::create([
            "cate_img" => $imageName,
            "name" => $request->name,
            "description" => htmlspecialchars($request->description, ENT_QUOTES, 'UTF-8'),
            "price" => floatval($request->price),
            "quantity" => intval($request->quantity),
        ]);
        return redirect()->route("products")->with("message", "Created successfuly");
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view("Products.edit", ["result" => $product]);
    }

    public function update(Request $request)
    {
        $old_id = $request->old_id;
        $product = Product::findOrFail($old_id);

        $request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);
        if ($request->hasFile("cate_img")) {
            $image = $request->cate_img;
            $imageName = time() . "_" . rand(1, 1000) . "." . $image->extension();
            $image->move(public_path("img/products"), $imageName);
        } else {
            $imageName = $product->cate_img;
        }

        $product->update([
            "cate_img" => $imageName,
            "name" => $request->name,
            "description" => htmlspecialchars($request->description, ENT_QUOTES, 'UTF-8'),
            "price" => $request->price,
            "quantity" => $request->quantity,
        ]);
        return redirect()->route("products")->with("message", "updated successfuly");
    }
    public function shop()
    {
        $products = Product::all(); // جلب كل المنتجات
        return view('include.product', compact('products')); // إرسال المنتجات إلى صفحة المتجر
    }
    public function show2($id)
    {
        $product = Product::findOrFail($id); // البحث عن المنتج أو إرجاع خطأ 404
        return view('include.show', compact('product')); // تمرير المنتج لصفحة التفاصيل
    }
}
