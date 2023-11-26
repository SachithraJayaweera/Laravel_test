<?php

namespace App\Http\Controllers;

use App\Models\AddZone;
use App\Models\Region;
use Illuminate\Http\Request;
use App\Models\Territory;


class TerritoryController extends Controller
{

    public function territory()
    {
        $zones = AddZone::all();
        $regions = Region::all();
        return view('territory',['zones'=> $zones, 'regions'=> $regions]);
    }

    public function save(Request $request){
        $result = Territory::create($request->all());
        return ($result);
    }

}

