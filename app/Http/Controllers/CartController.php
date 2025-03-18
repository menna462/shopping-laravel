<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Model\Cart;
use App\Models\Model\Order;
use App\Models\Model\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
        return view('include.cart', compact('cartItems'));
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cartItem = Cart::where('user_id', Auth::id())->where('product_id', $id)->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $id,
                'quantity' => 1,
            ]);
        }

        // تحديث عدد المنتجات في الجلسة
        session()->put('cart_count', Cart::where('user_id', Auth::id())->sum('quantity'));

        return redirect()->route('cart')->with('message', 'تمت إضافة المنتج إلى السلة!');
    }


    public function updateCart(Request $request, $id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->update(['quantity' => $request->quantity]);

        return redirect()->route('cart')->with('message', 'تم تحديث الكمية!');
    }

    public function removeFromCart($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        // تحديث عدد المنتجات في الجلسة
        session()->put('cart_count', Cart::where('user_id', Auth::id())->sum('quantity'));

        return redirect()->route('cart')->with('message', 'تمت إزالة المنتج!');
    }
    public function getCartCount()
{
    $cartCount = Cart::where('user_id', Auth::id())->sum('quantity');
    session()->put('cart_count', $cartCount); // تخزين العدد في الجلسة
    return response()->json(['cart_count' => $cartCount]);
}
public function sendOrderToWhatsApp()
{
    $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
    $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

    // إنشاء الطلب في قاعدة البيانات وربطه بالمستخدم
    $order = Order::create([
        'customer_name' => Auth::user()->name ?? 'عميل غير مسجل',
        'total_amount' => $total,
        'status' => 'لم يتم الدفع',
        'user_id' => Auth::id(), // ✅ إضافة user_id لربط الطلب بالمستخدم
    ]);

    // تجهيز رسالة الواتساب
    $whatsappNumber = '972593012145';
    $message = "New order from the store:\n";
    foreach ($cartItems as $item) {
        $message .= "Product: " . trim($item->product->name) . "\n";
        $message .= "Price: " . number_format($item->product->price, 2) . "₪\n";
        $message .= "Quantity: " . $item->quantity . "\n";
    }
    $message .= "Total: " . number_format($total, 2) . "₪";

    // مسح السلة بعد إرسال الطلب
    Cart::where('user_id', Auth::id())->delete();
    session()->forget('cart_count'); // تحديث عداد السلة

    // توجيه المستخدم إلى واتساب
     return redirect("https://api.whatsapp.com/send?phone=$whatsappNumber&text=" . urlencode($message));
}

}
