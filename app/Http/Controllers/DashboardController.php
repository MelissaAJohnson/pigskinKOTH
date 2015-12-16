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
        $picksWeek = $picks->last();
        $currentWeek = $picksWeek->week; // Future functionality will restrict picks to only be future so using last will work
        // dump($picks->toArray()); // for debugging
        // echo $currentWeek->week; // for debugging

        $nflteamModel = new \App\Nflteam();
        $teams_for_dropdown = $nflteamModel->getTeamsForDropdown();
        // dump($teams_for_dropdown);

        $nflteams = \App\Nflteam::with('pick')->get();
        // dump($nflteams->toArray());

        // $myPicks = \App\Pick::with('nflteam')->get();
        $myPicks = $teams->where('user_id', $user->id);
        // dump($myPicks->toArray()); // for debugging

        return view('dashboard')->with([ 'teams'=>$teams, 'picks'=>$picks, 'nflteams'=>$nflteams, 'currentWeek'=>$currentWeek, 'myPicks'=>$myPicks, 'user'=>$user, 'teams_for_dropdown'=>$teams_for_dropdown]);
    }

    public function postEdit(Request $request) {

        $currentWeek = 1;

        // Edit Pick
            // Retrieve Pick to be edited
            $pick = \App\Pick::find($request->editPickId);
            // dump($pick);
            
            // Set parameters
            $pick->week = $currentWeek;
            $pick->team_id = $request->editPickTeamId; 
            $pick->nflteam_id = $request->pick;

            // This will update the record with the above data
            $pick->save();
        // End edit pick
        
        // return view()
        return redirect('/dashboard/');

    }

    public function postPick(Request $request) {

        $currentWeek = 1;

        // Make Pick
            // Instantiate a new Pick Model object
            $pick = new \App\Pick();
            
            // Set parameters
            $pick->week = $currentWeek+1;
            $pick->team_id = $request->makePickTeamId; 
            $pick->nflteam_id = $request->pick;

            // This will generate a new row in the `picks` table, with the above data
            $pick->save();
        // End make pick
        
        // return view()
        return redirect('/dashboard/');
    }

}
