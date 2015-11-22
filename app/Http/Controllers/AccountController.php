<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class AccountController extends Controller
{
    // Responds to requests to GET /account
    public function getIndex() {
        $user = Auth::User();
        return view('account.create')->with('user', $user);
    }

    // Responds to requests to POST /account
    public function postEdit(Request $request) { 
        // Validate fields
        //$this->validate($request, [
        //    'firstName' => 'required|numeric'
        //]);

        // Edit user
            // Instantiate a new User Model object
            $user = Auth::User();
            
            // Set parameters
            $user->first_name = $request->firstName;
            $user->last_name = $request->lastName;
            $user->email = $request->email;
            $user->password = $request->password;

            // This will generate a new row in the `users` table, with the above data
            $user->save();
        // End edit user

            \Session::flash('flash_message','Your account was updated');
        
        
        // return view()
        return redirect('/dashboard')->with('user', $user);

    }
}
