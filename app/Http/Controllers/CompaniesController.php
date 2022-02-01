<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;

class CompaniesController extends Controller
{
    public function index()
    {
        $companies = Company::all();

        return view('dashboard.companies.index', compact('companies'));
    }
    
    public function create()
    {   
        $default_due_days = Schema::getConnection()->getDoctrineColumn('companies', 'due_days')->getDefault();
        return view('dashboard.companies.create', compact('default_due_days'));
    }

    public function store(Request $request)
    {

        // return $request->due_days;
        $company = new Company($request->all());
        $company->save();
        return redirect()->route('home');
    }
}
