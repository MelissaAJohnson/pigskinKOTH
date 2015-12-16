<?php

use Illuminate\Database\Seeder;

class PicksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        // Add 3 weeks of picks for each team
		for ($w=1; $w<2; $w++) {
        	// Loop through each team by id
        	for ($i=1; $i < 106; $i++) {

        		// Instantiate a new Picks Model object
				$pick = new \App\Pick();

        		// Randomly select from pick list for pick
				// $r = rand(0,31); 
				// $new_pick = $new_pick.$team_codes[$r];
				// Generate random number for pick
				// $id = rand(1,32);

    			// Set parameters
				$pick->nflteam_id = rand(1,32);
				$pick->week = $w;
				$pick->pick_loss = rand(0,1);
				$pick->team_id = $i;

				// This will generate a new row in the `picks` table, with the above data
				$pick->save();

				// Clear pick value
				// $new_pick = "";
			}
    	}
    }
}
