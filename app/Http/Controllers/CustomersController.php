<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerInvoice;
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

    public function create()
    {
        return view('dashboard.customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required',
            'town' => 'required'
        ], [
            'first_name.required' => 'Задолжително поле',
            'last_name.required' => 'Задолжително поле',
            'phone.required' => 'Задолжително поле',
            'address.required' => 'Задолжително поле',
            'email.required' => 'Задолжително поле',
            'town.required' => 'Задолжително поле'
        ]);

        $customer = new Customer;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->town = $request->town;
        $customer->save();

        return redirect()->back()->with(['success' => 'Успешно креиран корисник']);
    }


    public function customer_invoices()
    {
        $invoices = CustomerInvoice::all();

        return view('dashboard.customers.invoices', compact('invoices'));
    }
}
