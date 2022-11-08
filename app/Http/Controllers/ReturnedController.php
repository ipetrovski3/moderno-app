<?php

namespace App\Http\Controllers;

use App\Models\Returned;
use Illuminate\Http\Request;

class ReturnedController extends Controller
{
    public function index()
    {
        $invoices = Returned::all();

        return view('dashboard.returned.index', compact('invoices'));
    }
}
