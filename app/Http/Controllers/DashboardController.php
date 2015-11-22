<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class DashboardController extends Controller
{
    public function getIndex() {

        $user = Auth::User();

        // Get all records in Picks table
        $teams = \App\Team::with('pick')->orderBy('name', 'ASC')->get();
        // dump($teams->toArray()); // for debugging

        $picks = \App\Pick::all();
        $currentWeek = $picks->last();
        // dump($picks->toArray()); // for debugging
        // echo $currentWeek->week; // for debugging

        $myPicks = $teams->where('user_id', $user->id);
        // dump($myPicks->toArray()); // for debugging

        return view('dashboard')->with('teams', $teams)->with('currentWeek', $currentWeek)->with('myPicks', $myPicks)->with('user', $user);
    }

    public function postPick(Request $request) {

        $picksWeek = \App\Pick::all()->last();
        $currentWeek = $picksWeek->week;

        // Make Pick
            // Instantiate a new Pick Model object
            $pick = new \App\Pick();
            
            // Set parameters
            $pick->week = $currentWeek + 1;
            $pick->team_id = $request->pick_team_id; 
            $pick->pick = $request->pick;

            // This will generate a new row in the `picks` table, with the above data
            $pick->save();
        // End make pick
        
        // return view()
        return redirect('/dashboard/');
    }

}
