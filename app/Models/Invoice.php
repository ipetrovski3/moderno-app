<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function articles()
    {
        return $this->belongsToMany(Product::class, 'article_invoice', 'invoice_id', 'product_id' )
            ->withPivot('qty')
            ->withPivot('single_price')
            ->withTimestamps();
    }

    public function invoice_payments()
    {
        return $this->hasMany(InvoicePayment::class);
    }

}
