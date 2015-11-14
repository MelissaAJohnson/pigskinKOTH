<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    public function getCreate() {
        return view('team.create');
    }
    

        // Responds to requests to POST /team
    public function postCreate(Request $request) { 
        // Validate fields
        //$this->validate($request, [
        //    'firstName' => 'required|numeric'
        //]);
        // Create team
            // Instantiate a new Team Model object
            $team = new \App\Team();

            // Grab user attributes of newly created account
            $user = \App\User::all()->last();

            
            // Set parameters
            $team->name = $request->teamName;
            $team->league_id = 0;
            $team->owner_id = $user->id;
            $team->active = 1;

            // This will generate a new row in the `teams` table, with the above data
            $team->save();
        // End create user 
        
        // return view()
        return redirect('/dashboard')->with('team', $team);

    }

}
