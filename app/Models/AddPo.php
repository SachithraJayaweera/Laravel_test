<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddPo extends Model
{
    use HasFactory;
    protected $fillable = [
        "po_no","zone","region","po_territory","distributor","date","remark","totalSum"
    ];
}
