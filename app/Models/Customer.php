<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;


    public function full_name() {
        return $this->first_name . " " . $this->last_name;
    }

    public function delivery_address() {
        return $this->address . ", " . $this->town;
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function invoices()
    {
        return $this->hasMany(CustomerInvoice::class);
    }
}

