<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddPo;
use App\Models\AddSku;
use App\Models\AddZone;
use App\Models\Region;
use App\Models\Territory;
use App\Models\AddUser;

class AddPoController extends Controller
{
    public function save(Request $request){
        $result = AddPo::create($request->all());
        return ($result);
    }

    public function addPo(){
        $items = AddSku::all();
        $zones = AddZone::all();
        $regions = Region::all();
        $territory = Territory::all();
        $user = AddUser::all();
        return view('addpo',['items'=> $items,'zones'=>$zones,'regions'=> $regions, 'territory'=>$territory, 'user'=> $user]);
    }


    // public function getOne($id){
    //     return (AddPo::find($id));
        
    // }

    // public function region(){
    //     // Pass the data to a view
    //     return view('region');
    // }

}
