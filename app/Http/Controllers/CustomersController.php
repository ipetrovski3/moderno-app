<?php

namespace App\Http\Controllers;

use App\Mail\ContactCustomer;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CustomersController extends Controller
{
    public function index()
    {
        // $customer = Customer::find(17);
        // $amounts = [];
        // foreach ($customer->orders as $order) {
        //     $amounts[] = intval(str_replace(',', '', $order->total_price));
        // }
        // return $amounts;
        // $customer = Customer::first();
        // return $customer->orders->first()->total_price;
        $customers = Customer::all();

        return view('dashboard.customers.index', compact('customers'));
    }

    public function contact_customer(Request $request)
    {   
        $customer = Customer::findOrFail($request->customer_id);
        $title = $request->title;
        $message = $request->message;
        $customer_name = $customer->full_name();

        Mail::to($customer->email)->send(new ContactCustomer($title, $message, $customer_name));

        return response()->json($customer->email);
    }
}
