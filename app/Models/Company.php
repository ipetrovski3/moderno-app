<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'tax_number',
        'EDB',
        'phone',
        'email',
        'due_days',
        'town',
        'post_code'
    ];

    public static function find($company_id)
    {
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
