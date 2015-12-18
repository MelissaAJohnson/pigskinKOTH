<?php

use Illuminate\Database\Seeder;

class NFLTeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			$nflteam = new \App\Nflteam();
			$nflteam->name = "Arizona Cardinals";
			$nflteam->abbreviation = "ARI";
			$nflteam->save();

			$nflteam = new \App\Nflteam();
			$nflteam->name = "Atlanta Falcons";
			$nflteam->abbreviation = "ATL";
			$nflteam->save();

			$nflteam = new \App\Nflteam();
			$nflteam->name = "Baltimore Ravens";
			$nflteam->abbreviation = "BAL";
			$nflteam->save();

			$nflteam = new \App\Nflteam();
			$nflteam->name = "Buffalo Bills";
			$nflteam->abbreviation = "BUF";
			$nflteam->save();

			$nflteam = new \App\Nflteam();
			$nflteam->name = "Carolina Panthers";
			$nflteam->abbreviation = "CAR";
			$nflteam->save();

			$nflteam = new \App\Nflteam();
			$nflteam->name = "Chicago Bears";
			$nflteam->abbreviation = "CHI";
			$nflteam->save();

			$nflteam = new \App\Nflteam();
			$nflteam->name = "Cincinnati Bengels";
			$nflteam->abbreviation = "CIN";
			$nflteam->save();

			$nflteam = new \App\Nflteam();
			$nflteam->name = "Cleveland Browns";
			$nflteam->abbreviation = "CLE";
			$nflteam->save();

			$nflteam = new \App\Nflteam();
			$nflteam->name = "Dallas Cowboys";
			$nflteam->abbreviation = "DAL";
			$nflteam->save();

			$nflteam = new \App\Nflteam();
			$nflteam->name = "Denver Broncos";
			$nflteam->abbreviation = "DEN";
			$nflteam->save();

			$nflteam = new \App\Nflteam();
			$nflteam->name = "Detroit Lions";
			$nflteam->abbreviation = "DET";
			$nflteam->save();

			$nflteam = new \App\Nflteam();
			$nflteam->name = "Green Bay Packers";
			$nflteam->abbreviation = "GB";
			$nflteam->save();

			$nflteam = new \App\Nflteam();
			$nflteam->name = "Houston Texans";
			$nflteam->abbreviation = "HOU";
			$nflteam->save();

			$nflteam = new \App\Nflteam();
			$nflteam->name = "Indianapolis Colts";
			$nflteam->abbreviation = "IND";
			$nflteam->save();

			$nflteam = new \App\Nflteam();
			$nflteam->name = "Jacksonville Jaguars";
			$nflteam->abbreviation = "JAX";
			$nflteam->save();

			$nflteam = new \App\Nflteam();
			$nflteam->name = "Kansas City Chiefs";
			$nflteam->abbreviation = "KC";
			$nflteam->save();

			$nflteam = new \App\Nflteam();
			$nflteam->name = "Miami Dolphins";
			$nflteam->abbreviation = "MIA";
			$nflteam->save();

			$nflteam = new \App\Nflteam();
			$nflteam->name = "Minnesota Vikings";
			$nflteam->abbreviation = "MIN";
			$nflteam->save();

			$nflteam = new \App\Nflteam();
			$nflteam->name = "New England Patriots";
			$nflteam->abbreviation = "NE";
			$nflteam->save();

			$nflteam = new \App\Nflteam();
			$nflteam->name = "New Orleans Saints";
			$nflteam->abbreviation = "NO";
			$nflteam->save();

			$nflteam = new \App\Nflteam();
			$nflteam->name = "New York Giants";
			$nflteam->abbreviation = "NYG";
			$nflteam->save();

			$nflteam = new \App\Nflteam();
			$nflteam->name = "New York Jets";
			$nflteam->abbreviation = "NYJ";
			$nflteam->save();

			$nflteam = new \App\Nflteam();
			$nflteam->name = "Oakland Raiders";
			$nflteam->abbreviation = "OAK";
			$nflteam->save();

			$nflteam = new \App\Nflteam();
			$nflteam->name = "Philadelphia Eagles";
			$nflteam->abbreviation = "PHI";
			$nflteam->save();

			$nflteam = new \App\Nflteam();
			$nflteam->name = "Pittsburgh Steelers";
			$nflteam->abbreviation = "PIT";
			$nflteam->save();

			$nflteam = new \App\Nflteam();
			$nflteam->name = "Saint Louis Rams";
			$nflteam->abbreviation = "STL";
			$nflteam->save();

			$nflteam = new \App\Nflteam();
			$nflteam->name = "San Diego Chargers";
			$nflteam->abbreviation = "SD";
			$nflteam->save();

			$nflteam = new \App\Nflteam();
			$nflteam->name = "San Francisco 49ers";
			$nflteam->abbreviation = "SF";
			$nflteam->save();

			$nflteam = new \App\Nflteam();
			$nflteam->name = "Seattle Seahawks";
			$nflteam->abbreviation = "SEA";
			$nflteam->save();

			$nflteam = new \App\Nflteam();
			$nflteam->name = "Tampa Bay Buccaneers";
			$nflteam->abbreviation = "TB";
			$nflteam->save();

			$nflteam = new \App\Nflteam();
			$nflteam->name = "Tennessee Titans";
			$nflteam->abbreviation = "TN";
			$nflteam->save();

			$nflteam = new \App\Nflteam();
			$nflteam->name = "Washington Redskins";
			$nflteam->abbreviation = "WAS";
			$nflteam->save();
    }
}
