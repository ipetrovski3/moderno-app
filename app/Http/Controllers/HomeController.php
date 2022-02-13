<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\IncomingInvoice;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_invoices = Invoice::all()->pluck('total_price')->toArray();
        $total_incoming = IncomingInvoice::all()->pluck('total_price')->toArray();
        $money_owed = array_sum($total_incoming);
        $money = array_sum($total_invoices);
        $newArr = [];
        $orders_total_price = Order::where('status', 'completed')->pluck('total_price');
        foreach ($orders_total_price as $price) {
            $newArr[] += str_replace(',', '', $price);
        };
        $total_sum = array_sum($newArr);
        $total_money = number_format($total_sum, 2, ',', '.');
        $za_viceto = (( $total_sum * 10 ) / 100);


        $data = [];

        for ($month = 1; $month <= 12; $month++) {
            $date = Carbon::create(date('Y'), $month);
            $date_end = $date->copy()->endOfMonth();

            $orders_by_month = Order::all()
                ->where('created_at', '>=', $date)
                ->where('created_at', '<=', $date_end)
                ->count();

            $data[] = $orders_by_month;
        }

        $incoming = Invoice::all();


        // return $data;

        return view('home')->with([
            'data' => $data,
            'total_sum' => $total_sum,
            'za_viceto' => $za_viceto,
            'incoming' => $incoming,
            'total_money' => $money,
            'total_owed' => $money_owed
        ]);
    }
}
