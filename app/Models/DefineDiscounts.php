<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefineDiscounts extends Model
{
    use HasFactory;

    protected $fillable = [
        "label", "product_code", "product_price", "pu_product", "pu_quantity", "discount","weight_volume","ratio"
    ];
}
