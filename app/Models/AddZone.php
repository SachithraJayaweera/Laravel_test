<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddZone extends Model
{
    use HasFactory;
    protected $fillable = [
        "short_description","zone_long_description"
    ];
}
