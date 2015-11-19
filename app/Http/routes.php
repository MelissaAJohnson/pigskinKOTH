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

Route::get('/', function () {

	$teams = \App\Team::all();

	// Teams count
	$team_count = DB::table('teams')->count();
	$active_count = DB::table('teams')->where('active', '=', 1)->count();

    return view('layouts.index')->with("team_count", $team_count)->with("active_count", $active_count);
});


/*
Route::get('/{user_id}', function($user_id) {
	return view('dashboard');
});
*/

Route::get('/account/create', 'AccountController@getCreate');
Route::post('/account/create', 'AccountController@postCreate');

Route::get('/team/create', 'TeamController@getCreate');
Route::post('/team/create', 'TeamController@postCreate');

Route::get('/dashboard/{id?}', 'DashboardController@getIndex');
Route::post('/dashboard', 'DashboardController@postPick');


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