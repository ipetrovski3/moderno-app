<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id')
            ->withPivot('qty')
            ->withPivot('size')
            ->withTimestamps();
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public $statuses = [
        'received' => ['name' => 'Примена'],
        'confirmed' => ['name' => 'Потврдена'],
        'in_production' => ['name' => 'Во производство'],
        'shipped' => ['name' => 'Испратена'],
        'completed' => ['name' => 'Комплетирана']
    ];
}
