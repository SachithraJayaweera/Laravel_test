<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddUser extends Model
{
    use HasFactory;
    protected $fillable = [
        "name","nic","address","mobile","email", "gender", "territory", "username", "password"
    ];
}
