<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'transaction_detail';
    public $timestamps = false;
    protected $fillable = [
        'document_code',
        'document_number',
        'product_code',
        'price',
        'quantity',
        'unit',
        'sub_total',
        'currency',

    ];
}
