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
        $invoices_amount = Invoice::all()->pluck('total_price')->sum();
        $incoming_invoices_amount = IncomingInvoice::all()->pluck('total_price')->sum();

        $orders_total_price = Order::where('status', 'completed')->pluck('total_price');
        $orders_total_price->map(function($price) {
            return intval(str_replace(',', '', $price));
        });

        $total_money = number_format($orders_total_price->sum(), 2, ',', '.');
        $za_viceto = (( $orders_total_price->sum() * 10 ) / 100);
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

        return view('home')->with([
            'data' => $data,
            'total_sum' => $orders_total_price->sum(),
            'za_viceto' => $za_viceto,
            'incoming' => $incoming,
            'incoming_invoices_amount' => $incoming_invoices_amount,
            'invoices_amount' => $invoices_amount,
            'total_money' => $total_money

        ]);
    }
}
