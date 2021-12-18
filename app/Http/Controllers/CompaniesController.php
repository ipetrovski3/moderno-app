<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CompaniesController extends Controller
{
    public function create()
    {
        return view('dashboard.companies.create');
    }

    public function store(Request $request)
    {
        $company = new Company($request->all());
        $company->save();
        return redirect()->route('home');
    }
}
