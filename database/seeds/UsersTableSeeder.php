<?php

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

		# Instantiate a new User Model object
		$book = new \App\Book();

        // Add 100 users to database
        for ($i=0; $i < 100; $i++) {

        	# Instantiate a new Users Model object
			$user = new \App\User();

			# Set the parameters
			$user->name = $faker->name;
			$user->email = $faker->email;
			$user->password = $faker->password;

			# This will generate a new row in the `users` table, with the above data
			$user->save();
        }
    }
}
