<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\defineFreeIssues;
use App\Models\AddSku;
use App\Models\DefineDiscounts;

class DefineDiscountsController extends Controller
{

    public function defineDiscounts(){
        $skus = AddSku::all();
        $def_skus = defineDiscounts::pluck('pu_product')->toArray();
        $def_free_Issues = defineFreeIssues::pluck('pu_product')->toArray();
        return view('defineDiscounts',['skus' => $skus, 'def_skus' => $def_skus, 'def_free_Issues' => $def_free_Issues]);
    }
    
    // public function defineFreeIssuesEdit(){
    //     return view('defineFreeIssuesEdit');
    // }

    public function save(Request $request){
        $data = $request->all();
    
        //Calculate ratio only if both purchase and free quantities are provided
        if(isset($data['pu_quantity']) && isset($data['discount']) != 0) {
            $ratio = $data['discount'] /100;
            $data['ratio'] = $ratio;
        }
        
        // Use $data array that includes the calculated ratio
        $result = defineDiscounts::create($data);
        return ($result);
     
    }
    
}
