<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    public function save(Request $request){
        $result = Zone::create($request->all());
        return ($result);
    }

    public function getAll(Request $request){
        return (Zone::all());
    }

    public function getOne($id){
        return (Zone::find($id));
        
    }

    public function region(){
        // Pass the data to a view
        return view('region');
    }
    
}