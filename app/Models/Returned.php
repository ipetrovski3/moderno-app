<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Returned extends Model
{
    use HasFactory;


    public function articles()
    {
        return $this->belongsToMany(Product::class, 'returned_articles', 'returned_id', 'product_id' )
            ->withPivot('qty')
            ->withPivot('single_price')
            ->withTimestamps();
    }
}
