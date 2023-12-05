<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\defineFreeIssues;
//use App\Models\AddSku;

class DefineFreeIssuesViewController extends Controller
{
    public function defineFreeIssuesView()
    {
        $dfIssuse = defineFreeIssues::all();
        //dd($dfIssuse);
        return view('definefreeissuesview',['dfIssuse' => $dfIssuse]);
    }

}
