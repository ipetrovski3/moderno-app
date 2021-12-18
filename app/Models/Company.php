<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'tax_number', 'EDB', 'phone', 'email'];

    public function invoices()
    {
        return $this->morphMany(Invoice::class, 'invoicable');
    }
}
