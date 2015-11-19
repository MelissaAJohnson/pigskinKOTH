<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{

     public function getCreate() {
        $user = \App\User::all()->last();
        //if(is_null($user)) {
        //    \Session::flash('flash_message','User not found.');
        //    return redirect('\');
        //}
        return view('team.create')->with('user',$user);
    }
    

        // Responds to requests to POST /team
    public function postCreate(Request $request) { 
        $user = \App\User::all()->last();

        // Validate fields
        //$this->validate($request, [
        //    'firstName' => 'required|numeric'
        //]);
        // Create team
            // Instantiate a new Team Model object
            $team = new \App\Team;
            
            // Set parameters
            $team->name = $request->teamName;
            $team->user_id = $user->id;
            $team->league_id = 0;
            $team->active = 1;

            // This will generate a new row in the `teams` table, with the above data
            $team->save();
        // End create user 
            
            // echo $team; // for debugging
        
        // return view()
        return redirect('/dashboard/')->with('team', $team)->with('user', $user);
    }

}
