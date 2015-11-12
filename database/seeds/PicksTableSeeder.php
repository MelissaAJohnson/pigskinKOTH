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
        // Create pick list
			$team_codes = array(
				"ATL",
				"ARI",
				"BAL",
				"BUF",
				"CAR",
				"CHI",
				"CIN",
				"CLE",
				"DAL",
				"DEN",
				"DET",
				"GB",
				"HOU",
				"IND",
				"JAX",
				"KC",
				"MIA",
				"MIN",
				"NE",
				"NO",
				"NYG",
				"NYJ",
				"OAK",
				"PHI",
				"PIT",
				"SD",
				"SEA",
				"SF",
				"STL",
				"TB",
				"TEN",
				"WAS",

			);

			$new_pick = "";

        // Add 3 weeks of picks for each team
		for ($w=1; $w<4; $w++) {
        	// Loop through each team by id
        	for ($i=1; $i < 101; $i++) {

        		// Instantiate a new Picks Model object
				$pick = new \App\Pick();

        		// Randomly select from pick list for pick
				$r = rand(0,31); 
				$new_pick = $new_pick.$team_codes[$r];

    			// Set parameters
				$pick->pick = $new_pick;
				$pick->week = $w;
				$pick->pick_loss = rand(0,1);
				$pick->pick_owner = $i;

				// This will generate a new row in the `picks` table, with the above data
				$pick->save();

				// Clear pick value
				$new_pick = "";
			}
    	}
    }
}
