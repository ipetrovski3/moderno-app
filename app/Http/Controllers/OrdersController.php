<?php

namespace App\Http\Controllers;

use App\Mail\AdminOrderNotification;
use App\Models\Customer;
use App\Models\Order;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Svg\Tag\Rect;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
        if ($request->status == 'all')
            $orders = Order::all();
        elseif ($request->status == 'received')
            $orders = Order::where('status', 'received')->get();
        elseif ($request->status == 'confirmed')
            $orders = Order::where('status', 'confirmed')->get();
        elseif ($request->status == 'in_production')
            $orders = Order::where('status', 'in_production')->get();
        elseif ($request->status == 'shipped')
            $orders = Order::where('status', 'shipped')->get();
        elseif ($request->status == 'completed')
            $orders = Order::where('status', 'completed')->get();

        return view('dashboard.orders.index', compact('orders'));
    }

    public function store(Request $request)
    {
        if (Cart::count() < 1) {
            return redirect()->back()->with(['errors' => 'Вашата кошничка е празна']);
        }

        $customer = new Customer;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->town = $request->town;

        $customer->save();

        $order = new Order;
        $order->customer_id = $customer->id;
        $order->total_price = Cart::total();

        $order->save();


        $cart_items = Cart::content();
        foreach ($cart_items as $item) {
            $order->products()->attach([$item->id => ['qty' => $item->qty, 'size' => $item->options['size']]]);
        }

        $admins = User::all()->pluck('email');
        Mail::to($admins)
            ->send(new AdminOrderNotification($order));

        Cart::destroy();
        return redirect()->route('homepage');
    }

    public function update_status(Request $request)
    {
        $data = $request->all();

        $order = Order::findOrFail($data['id']);
        $order->status = $data['status'];
        $order->save();

        return response()->json($data);
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        $customer = $order->customer;
        $products = $order->products;

        return view('dashboard.orders.show', compact('products', 'order', 'customer'));
    }

    public function destroy(Request $request) 
    {
        
        $order = Order::findOrFail($request->order_id);
        $order->delete();

        return redirect()->back()->with(['deleted' => 'Нарачката е успешно избришана']);
    }
}
