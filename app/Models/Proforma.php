<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proforma extends Model
{
    use HasFactory;

    public function articles()
    {
        return $this->belongsToMany(Product::class, 'article_proformas', 'proforma_id', 'product_id' )
            ->withPivot('qty')
            ->withPivot('single_price')
            ->withTimestamps();
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
