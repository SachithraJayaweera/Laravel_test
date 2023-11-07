<?php

namespace App\Http\Controllers;

use App\Models\AddPo;
use App\Models\Region;
use App\Models\Territory;
use Illuminate\Http\Request;
use App\Models\ViewPo;

class ViewPoController extends Controller
{
    public function save(Request $request){
        $result = ViewPo::create($request->all());
        return ($result);
    }

    // public function getAll(Request $request){
    //     return (ViewPo::all());
    // }

    // public function getOne($id){
    //     return (ViewPo::find($id));
        
    // }

    public function viewPo(){
        $regions = Region::all();
        $territory = Territory::all();
        $po_data = AddPo::all();
        return view('viewpo',['regions'=> $regions, 'territory'=>$territory, 'po_data' => $po_data]);
    }
}
