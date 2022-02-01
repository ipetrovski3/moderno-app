<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Services\Orders\Orders;
use App\Mail\AdminOrderNotification;
use App\Services\Customers\CustomersService;
use Illuminate\Support\Facades\Mail;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrdersController extends Controller
{
    private $query;

    public function __construct(Orders $query)
    {
        $this->query = $query;
    }

    public function index(Request $request)
    {
        $orders = $this->query->orders_query($request->status);

        return view('dashboard.orders.index', compact('orders'));
    }

    public function store(CustomersService $customer_service, Request $request)
    {
        if (Cart::count() < 1) {
            return redirect()->back()->with(['errors' => 'Вашата кошничка е празна']);
        }
        if (is_null(Customer::where('email', $request->email)->get()->first())) {
            $customer = $customer_service->store_customer($request->all());
        } else {
            $customer = Customer::where('email', $request->email)->get()->first();
        }
        $order = new Order;
        $order->customer_id = $customer['id'];
        $order->total_price = floatval(str_replace(',', '', Cart::total()));
        $order->uniqid = uniqid();

        $order->save();

        $cart_items = Cart::content();
        foreach ($cart_items as $item) {
            $order->products()->attach([$item->id => ['qty' => $item->qty, 'size' => $item->options['size']]]);
        }

        $admins = User::all()->pluck('email');
        Mail::to($admins)
            ->send(new AdminOrderNotification($order));

        Cart::destroy();
        return redirect()->route('homepage')->with(['success' => 'Вашата нарачка е примена и ќе ви биде доставена во краток временски период']);
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
