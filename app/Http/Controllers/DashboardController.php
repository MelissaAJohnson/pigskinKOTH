<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function getIndex() {

        $picks = \App\Pick::all();
        // $teams = \App\Team::all();

        return view('dashboard')->with('picks', $picks);
    }

}
