<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Events\NewOrderEvent;

class OrderController extends Controller
{
    public function index()
    {

        $orders = Order::latest()->get();


        return view('admin.orders.index', compact('orders'));
    }
    public function store(Request $request)
    {

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
        ]);

        $productId = $request->product_id;
        $quantity = (int) $request->quantity;


        $product = Product::find($productId);
        $price = $product->discount_price ?? $product->price;


        $cart = session()->get('cart', []);


        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                "name"     => $product->name,
                "quantity" => $quantity,
                "price"    => $price,
                "image"    => $product->image
            ];
        }


        session()->put('cart', $cart);


        $cartCount = 0;
        foreach ($cart as $item) {
            $cartCount += $item['quantity'];
        }


        return response()->json([
            'success' => true,
            'message' => 'تم إضافة الوجبة للسلة بنجاح! 🛒',
            'cart_count' => $cartCount
        ]);
    }

    public function checkout(Request $request)
    {

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'سلتك فارغة حالياً!');
        }

        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }


        $order = Order::create([
            'user_id'     => Auth::id(),
            'total_price' => $totalPrice,
            'status'      => 'pending',
            'pickup_time' => \Carbon\Carbon::now()->addMinutes(25),
        ]);


        foreach ($cart as $productId => $details) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $productId,
                'quantity'   => $details['quantity'],
                'price'      => $details['price'],
            ]);
        }


        $order->customer_name = Auth::user()->name;

        Log::info('تم إطلاق حدث الطلب الجديد: ' . $order->id);
        event(new NewOrderEvent($order));


        session()->forget('cart');

        return redirect()->back()->with('success_order', 'تم إرسال طلبك للمطبخ بنجاح! 🎉');
    }
}
