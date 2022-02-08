<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomingInvoice extends Model
{
    use HasFactory;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function articles()
    { 
        return $this->belongsToMany(Product::class, 'article_incoming_invoice', 'incoming_invoice_id', 'product_id' )
            ->withPivot('qty')
            ->withTimestamps();
    }

}
