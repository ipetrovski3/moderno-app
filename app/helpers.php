<?php

class Helper
{
  public static function color($status)
  {
    switch ($status) {
      case 'received':
        return 'danger';
        break;
      case 'confirmed':
        return 'warning';
        break;
      case 'in_production':
        return 'primary';
        break;
      case 'shipped':
        return 'info';
        break;
      case 'completed':
        return 'success';
        break;
    }
  }

  public static function sum_prices($customer)
  {
    $customer_orders = $customer->orders->where('status', 'completed')->all();
    $amounts = [];
    foreach ($customer_orders as $order) {
        $amounts[] = intval(str_replace(',', '', $order->total_price));
    }
    return number_format(array_sum($amounts), 2);
  }
}
