<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerInvoice extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }


    public function articles()
    { 
        return $this->belongsToMany(Product::class, 'article_cusinvoices', 'invoice_id', 'product_id' )
            ->withPivot('qty')
            ->withPivot('single_price')
            ->withTimestamps();
    }

}
