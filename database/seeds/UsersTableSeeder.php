s<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Code that creates fake information
        $faker = \Faker\Factory::create();

        // Add 100 users to database
        for ($i=0; $i < 100; $i++) {

        	# Instantiate a new Users Model object
			$user = new \App\User();

			# Set the parameters
			$user->first_name = $faker->firstName;
			$user->last_name = $faker->lastName;
			$user->email = $user->first_name.$user->last_name.'@'.$faker->safeEmailDomain ;
			$user->password = $faker->password;

			# This will generate a new row in the `users` table, with the above data
			$user->save();
        }

        // Required users
        $user = new \App\User();
        $user->first_name="Jill";
        $user->last_name="";
        $user->email="jill@harvard.edu";
        $user->password = \Hash::make('helloworld');
        $user->save();

        $user = new \App\User();
        $user->first_name="Jamal";
        $user->last_name="";
        $user->email="jamal@harvard.edu";
        $user->password = \Hash::make('helloworld');
        $user->save();
    }
}
