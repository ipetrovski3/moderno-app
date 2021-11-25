<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Mail\ContactCustomer;
use App\Notifications\NofityAllCustomers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Notifications\Notification;

class CustomersController extends Controller
{
    public function index()
    {
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

    public function email_all(Request $request) 
    {
        $title = $request->title;
        $message = $request->message;
        $customer_emails = Customer::all()->pluck('email');


        return response()->json();
    }
}
