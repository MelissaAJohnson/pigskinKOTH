<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // Code that references faker package
        $faker = \Faker\Factory::create();

        // Add 100 teams to database
        for ($i=0; $i < 101; $i++) {

        	# Generate random number for user_id foreign key
        	$id = rand(1, 100);

        	# Instantiate a new Teams Model object
			$team = new \App\Team();

			# Set the parameters
			$team->name = $faker->word;
			$team->league_id = 0;
			$team->user_id = $id;
            $team->active=rand(0,1);

			# This will generate a new row in the `teams` table, with the above data
			$team->save();
        }

        // Make sure Jamal and Jill have teams
        $team = new \App\Team();
        $team->name = "Jamal.1";
        $team->league_id = 0;
        $team->user_id = 102;
        $team->active=rand(0,1);
        $team->save();

        $team = new \App\Team();
        $team->name = "Jamal.2";
        $team->league_id = 0;
        $team->user_id = 102;
        $team->active=rand(0,1);
        $team->save();

        $team = new \App\Team();
        $team->name = "Jamal.3";
        $team->league_id = 0;
        $team->user_id = 102;
        $team->active=rand(0,1);
        $team->save();

        $team = new \App\Team();
        $team->name = "Jill.1";
        $team->league_id = 0;
        $team->user_id = 101;
        $team->active=rand(0,1);
        $team->save();

    }
}
