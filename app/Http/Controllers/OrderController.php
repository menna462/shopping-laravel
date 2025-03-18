<?php

namespace App\Http\Controllers;

use App\Models\Model\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest('created_at', 'desc')->get();
        return view('backend.order', compact('orders'));
    }

    public function markAsPaid(Order $order)
    {
        if ($order->status !== 'تم الدفع') {
            $order->update(['status' => 'تم الدفع']);

            // تحديث نقاط المستخدم
            if ($order->user_id) {
                $user = User::find($order->user_id);
                if ($user) {
                    $user->point += $order->total_amount; // زيادة النقاط بناءً على المبلغ المدفوع
                    $user->updateRank(); // استدعاء الدالة لتحديث الترقية
                    $user->save();
                }
            }

            return redirect()->route('orders.index')->with('message', 'تم تحديث حالة الدفع وإضافة النقاط والترقية بنجاح!');
        }

        return redirect()->route('orders.index')->with('message', 'تم الدفع لهذا الطلب مسبقًا.');
    }
}
