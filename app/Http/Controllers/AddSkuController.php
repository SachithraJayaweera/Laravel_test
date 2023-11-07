<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddSku;

class AddSkuController extends Controller
{
    public function addSku()
    {
        return view('addsku');
    }
    
    public function save(Request $request){
        $result = addSku::create($request->all());
        return ($result);
    }

}
