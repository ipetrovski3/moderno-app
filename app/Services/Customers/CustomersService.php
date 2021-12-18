<?php

namespace App\Services\Customers;

use App\Models\Customer;

class CustomersService
{
  public function store_customer($request)
  {
    $request = (object) $request;
    $customer = new Customer;
    $customer->first_name = $request->first_name;
    $customer->last_name = $request->last_name;
    $customer->phone = $request->phone;
    $customer->email = $request->email;
    $customer->address = $request->address;
    $customer->town = $request->town;
    if (isset($request->receive_promotions)) {
        $customer->receive_promotions = $request->receive_promotions;
    } else {
        $customer->receive_promotions = false;
    }

    $customer->save();

  }
}
