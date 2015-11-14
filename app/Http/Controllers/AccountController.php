<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    // Responds to requests to GET /account
    public function getCreate() {
        return view('account.create');
    }

    // Responds to requests to POST /account
    public function postCreate(Request $request) { 
        // Validate fields
        //$this->validate($request, [
        //    'firstName' => 'required|numeric'
        //]);

        // Create user
            // Instantiate a new User Model object
            $user = new \App\User();
            
            // Set parameters
            $user->first_name = $request->firstName;
            $user->last_name = $request->lastName;
            $user->email = $request->email;
            $user->password = $request->password;

            // This will generate a new row in the `users` table, with the above data
            $user->save();
        // End create user
        
        // return view()
        return redirect('/team/create')->with('user', $user);

    }
}
