<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function invoicable()
    {
        return $this->morphTo();
    }


    public function articles()
    { 
        return $this->belongsToMany(Product::class, 'article_invoice', 'invoice_id', 'product_id' )
            ->withPivot('qty')
            ->withTimestamps();
    }

}
