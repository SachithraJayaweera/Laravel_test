<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\defineFreeIssues;
use App\Models\AddSku;

class DefineFreeIssuesController extends Controller
{
    public function defineFreeIssues(){
        $skus = AddSku::all();
        $def_skus = defineFreeIssues::pluck('pu_product')->toArray();
        return view('definefreeissues',['skus' => $skus, 'def_skus' => $def_skus]);
    }
    
    public function defineFreeIssuesEdit(){
        return view('defineFreeIssuesEdit');
    }


    public function save(Request $request){
        $data = $request->all();
    
        // Calculate ratio only if both purchase and free quantities are provided
        if(isset($data['pu_quantity']) && isset($data['free_quantity']) && $data['pu_quantity'] != 0) {
            $ratio = $data['free_quantity'] / $data['pu_quantity'];
            $data['ratio'] = $ratio;
        }
        
        // Use $data array that includes the calculated ratio
        $result = defineFreeIssues::create($data);
        return ($result);
     
    }
    
}
