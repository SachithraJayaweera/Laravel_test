<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddUser;
use App\Models\Territory;

class AddUserController extends Controller
{
    public function addUser()
    {
        $territory = Territory::all();
        return view('adduser',['territory'=> $territory]);
    }
    
    public function save(Request $request){
        $result = AddUser::create($request->all());
        return ($result);
    }

    
}
