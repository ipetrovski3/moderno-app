<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        $newArr = [];
        $orders_total_price = Order::where('status', 'completed')->pluck('total_price');
        foreach ($orders_total_price as $price) {
            $newArr[] += str_replace(',', '', $price);
        };
        $total_money = number_format(array_sum($newArr), 2, ',', '.');


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


        // return $data;

        return view('home')->with([
            'data' => $data,
            'total_money' => $total_money
        ]);
    }
}
