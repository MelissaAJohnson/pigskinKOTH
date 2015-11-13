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
        for ($i=0; $i < 100; $i++) {

        	# Generate random number for user_id foreign key
        	$id = rand(1, 101);

        	# Instantiate a new Teams Model object
			$team = new \App\Team();

			# Set the parameters
			$team->name = $faker->word;
			$team->league_id = 0;
			$team->owner_id = $id;
            $team->active=rand(0,1);

			# This will generate a new row in the `teams` table, with the above data
			$team->save();
        }
    }
}
