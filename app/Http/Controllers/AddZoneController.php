<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddZone;

class AddZoneController extends Controller
{
    public function addZone()
    {
        return view('addzone');
    }
    
    public function save(Request $request){
        $result = AddZone::create($request->all());
        return ($result);
    }

}
