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
        //dd($po_data);
        return view('viewpo',['regions'=> $regions, 'territory'=>$territory, 'po_data' => $po_data]);
    }

    public function filterData(Request $request){
        $selectedRegion = $request->input('region'); 
        // Fetch filtered data based on the selected region (use your logic here)
        $filteredData = AddPo::where('region', $selectedRegion)->get();
        return response()->json($filteredData);
        }

    
    public function filterDataTerritory(Request $request){
        $selectedRegion = $request->input('territory'); 
        // Fetch filtered data based on the selected region (use your logic here)
        $filteredData = AddPo::where('po_territory', $selectedRegion)->get();
        return response()->json($filteredData);
        }

}
