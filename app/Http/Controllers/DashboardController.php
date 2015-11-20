<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function getIndex() {

        // Get all records in Picks table
        $teams = \App\Team::with('pick')->orderBy('name', 'ASC')->get();
        // dump($teams->toArray()); // for debugging

        $picks = \App\Pick::all();
        $currentWeek = $picks->last();
        // dump($picks->toArray()); // for debugging
        // echo $currentWeek->week; // for debugging

        $myPicks = \App\Pick::where('team_id', 7)->get();
        // dump($myPicks->toArray());

        return view('dashboard')->with('teams', $teams)->with('currentWeek', $currentWeek)->with('myPicks', $myPicks);
    }

    public function postPick(Request $request) {

        // Make Pick
            // Instantiate a new Pick Model object
            $pick = new \App\Pick();
            
            // Set parameters
            $pick->week = 4; // UPDATE TO BE LAST WEEK IN PICK +1
            $pick->team_id = 7; // UPDATE TO BE TEAM DETERMINED BY TABLE ROW
            $pick->pick = $request->pick;

            // This will generate a new row in the `picks` table, with the above data
            $pick->save();
        // End make pick
        
        // return view()
        return redirect('/dashboard/');
    }

}
