<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserHomeController extends Controller
{

    public function userHome()
    {
        return view('userhome');
    }
}
