<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class placingOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        "customer_name","order_number","net_amount","product_name","product_code", "price", "quantity","free","amount","total_count"
    ];
}

