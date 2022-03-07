<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\InvoicePayment;
use App\Services\Companies\CardService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use stdClass;

class CompaniesController extends Controller
{
    public function index()
    {
        $companies = Company::all();

        return view('dashboard.companies.index', compact('companies'));
    }

    public function show($id)
    {
        $company = Company::findOrFail($id);
        $invoices = $company->invoices;
        return view('dashboard.companies.show', compact('company', 'invoices'));
    }

    public function create()
    {
        $default_due_days = Schema::getConnection()->getDoctrineColumn('companies', 'due_days')->getDefault();
        return view('dashboard.companies.create', compact('default_due_days'));
    }

    public function store(Request $request)
    {
        $company = new Company($request->all());
        $company->save();
        return redirect()->route('home');
    }

    public function card($company_id)
    {


        $company = Company::findOrFail($company_id);
        $finances = CardService::generate_card($company);

        return view('dashboard.companies.card', compact('finances'));
    }
}
