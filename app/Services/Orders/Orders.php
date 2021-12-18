<?php

namespace App\Services\Orders;

use App\Models\Order;
use Illuminate\Http\Request;

class Orders
{
  public function orders_query($request)
  {
    if ($request == 'all')
      $orders = Order::orderBy('created_at', 'DESC')->get();
    else 
      $orders = Order::where('status', $request)->orderBy('created_at', 'DESC')->get();

    return $orders;
  }
}
