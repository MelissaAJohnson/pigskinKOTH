<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

# Show login form
Route::get('/login', 'Auth\AuthController@getLogin');

# Process login form
Route::post('/login', 'Auth\AuthController@postLogin');

# Process logout
Route::get('/logout', 'Auth\AuthController@getLogout');

# Show registration form
Route::get('/register', 'Auth\AuthController@getRegister');

# Process registration form
Route::post('/register', 'Auth\AuthController@postRegister');


Route::get('/', function () {

	$teams = \App\Team::all();

	// Teams count
	$team_count = DB::table('teams')->count();
	$active_count = DB::table('teams')->where('active', '=', 1)->count();

    return view('layouts.index')->with("team_count", $team_count)->with("active_count", $active_count);
});


// Route::get('/account/create', 'AccountController@getCreate');
//Route::post('/account/create', 'AccountController@postCreate');

// Route::get('/team/create', 'TeamController@getCreate');

// Route::get('/dashboard/{id?}', 'DashboardController@getIndex');
Route::get('dashboard/{id?}', [
    'middleware' => 'auth',
    'uses' => 'DashboardController@getIndex'
]);

Route::post('/dashboard/pickCreate', 'DashboardController@postPick');

Route::get('/team/create', [
    'middleware' => 'auth',
    'uses' => 'TeamController@getCreate'
]);

Route::post('/team/create', 'TeamController@postCreate');


/*----------------------------------------------------
Debugging/Local/Misc
-----------------------------------------------------*/
if(App::environment('local')) {
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

    Route::get('/drop', function() {
        DB::statement('DROP database pigskinKOTH');
        DB::statement('CREATE database pigskinKOTH');
        return 'Dropped pigskinKOTH; created pigskinKOTH';
    });

    Route::get('/confirm-login-worked', function() {
        # You may access the authenticated user via the Auth facade
        $user = Auth::user();

        if($user) {
            echo 'You are logged in.';
            dump($user->toArray());
        } else {
            echo 'You are not logged in.';
        }

        return;

    });
};


Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
    //print_r(config('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});