<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class defineFreeIssues extends Model
{
    use HasFactory;

    protected $fillable = [
        "label","type","product_code","product_price","pu_product","free_product", "pu_quantity", "free_quantity", "lower_limit", "upper_limit", "weight_volume", "ratio"
    ];
    
}
