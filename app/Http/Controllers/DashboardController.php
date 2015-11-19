<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function getIndex() {
    	
        // Get all records in Picks table
        $picks = \App\Pick::orderBy('week', 'ASC')->get();
        // dump($picks->toArray()); // for debugging
        
        $myPicks = $picks->where('team_id', 7); // UPDATE TO BE LOGGED-IN USER USER ID
        // dump($myPicks->toArray()); // for debugging

        return view('dashboard')->with('picks', $picks)->with('myPicks', $myPicks);
    }

    public function postPick(Request $request) {
    	// Make Pick
            // Instantiate a new Pick Model object
            $pick = new \App\Pick();
            
            // Set parameters
            $pick->week = 8; // UPDATE TO BE LAST WEEK IN PICK +1
            $pick->team_id = 7; // UPDATE TO BE TEAM DETERMINED BY TABLE ROW
            $pick->pick = $request->pick;

            // This will generate a new row in the `picks` table, with the above data
            $pick->save();
        // End make pick
        
        // return view()
        return redirect('/dashboard/')->with('pick', $pick);
    }

}
