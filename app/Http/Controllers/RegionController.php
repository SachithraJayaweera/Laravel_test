<?php

namespace App\Http\Controllers;

use App\Models\AddZone;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function region()
    {
        $zones = AddZone::all();
        return view('region',['zones'=> $zones]);
    }
    
    public function save(Request $request){
        $result = Region::create($request->all());
        return ($result);
    }
}
