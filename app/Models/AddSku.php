<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddSku extends Model
{
    use HasFactory;
    protected $fillable = [
        "skuid","sku_code","sku_name","mrp","distributor_price","weight_volume"
    ];
}
