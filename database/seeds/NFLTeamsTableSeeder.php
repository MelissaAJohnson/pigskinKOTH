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
			$nflteam = new \App\NFLTeam();
			$nflteam->name = "Arizona Cardinals";
			$nflteam->abbreviation = "ARI";
			$nflteam->save();

			$nflteam = new \App\NFLTeam();
			$nflteam->name = "Atlanta Falcons";
			$nflteam->abbreviation = "ATL";
			$nflteam->save();

			$nflteam = new \App\NFLTeam();
			$nflteam->name = "Baltimore Ravens";
			$nflteam->abbreviation = "BAL";
			$nflteam->save();

			$nflteam = new \App\NFLTeam();
			$nflteam->name = "Buffalo Bills";
			$nflteam->abbreviation = "BUF";
			$nflteam->save();

			$nflteam = new \App\NFLTeam();
			$nflteam->name = "Carolina Panthers";
			$nflteam->abbreviation = "CAR";
			$nflteam->save();

			$nflteam = new \App\NFLTeam();
			$nflteam->name = "Chicago Bears";
			$nflteam->abbreviation = "CHI";
			$nflteam->save();

			$nflteam = new \App\NFLTeam();
			$nflteam->name = "Cincinnati Bengels";
			$nflteam->abbreviation = "CIN";
			$nflteam->save();

			$nflteam = new \App\NFLTeam();
			$nflteam->name = "Cleveland Browns";
			$nflteam->abbreviation = "CLE";
			$nflteam->save();

			$nflteam = new \App\NFLTeam();
			$nflteam->name = "Dallas Cowboys";
			$nflteam->abbreviation = "DAL";
			$nflteam->save();

			$nflteam = new \App\NFLTeam();
			$nflteam->name = "Denver Broncos";
			$nflteam->abbreviation = "DEN";
			$nflteam->save();

			$nflteam = new \App\NFLTeam();
			$nflteam->name = "Detroit Lions";
			$nflteam->abbreviation = "DET";
			$nflteam->save();

			$nflteam = new \App\NFLTeam();
			$nflteam->name = "Green Bay Packers";
			$nflteam->abbreviation = "GB";
			$nflteam->save();

			$nflteam = new \App\NFLTeam();
			$nflteam->name = "Houston Texans";
			$nflteam->abbreviation = "HOU";
			$nflteam->save();

			$nflteam = new \App\NFLTeam();
			$nflteam->name = "Indianapolis Colts";
			$nflteam->abbreviation = "IND";
			$nflteam->save();

			$nflteam = new \App\NFLTeam();
			$nflteam->name = "Jacksonville Jaguars";
			$nflteam->abbreviation = "JAX";
			$nflteam->save();

			$nflteam = new \App\NFLTeam();
			$nflteam->name = "Kansas City Chiefs";
			$nflteam->abbreviation = "KC";
			$nflteam->save();

			$nflteam = new \App\NFLTeam();
			$nflteam->name = "Miami Dolphins";
			$nflteam->abbreviation = "MIA";
			$nflteam->save();

			$nflteam = new \App\NFLTeam();
			$nflteam->name = "Minnesota Vikings";
			$nflteam->abbreviation = "MIN";
			$nflteam->save();

			$nflteam = new \App\NFLTeam();
			$nflteam->name = "New England Patriots";
			$nflteam->abbreviation = "NE";
			$nflteam->save();

			$nflteam = new \App\NFLTeam();
			$nflteam->name = "New Orleans Saints";
			$nflteam->abbreviation = "NO";
			$nflteam->save();

			$nflteam = new \App\NFLTeam();
			$nflteam->name = "New York Giants";
			$nflteam->abbreviation = "NYG";
			$nflteam->save();

			$nflteam = new \App\NFLTeam();
			$nflteam->name = "New York Jets";
			$nflteam->abbreviation = "NYJ";
			$nflteam->save();

			$nflteam = new \App\NFLTeam();
			$nflteam->name = "Oakland Raiders";
			$nflteam->abbreviation = "OAK";
			$nflteam->save();

			$nflteam = new \App\NFLTeam();
			$nflteam->name = "Philadelphia Eagles";
			$nflteam->abbreviation = "PHI";
			$nflteam->save();

			$nflteam = new \App\NFLTeam();
			$nflteam->name = "Pittsburgh Steelers";
			$nflteam->abbreviation = "PIT";
			$nflteam->save();

			$nflteam = new \App\NFLTeam();
			$nflteam->name = "Saint Louis Rams";
			$nflteam->abbreviation = "STL";
			$nflteam->save();

			$nflteam = new \App\NFLTeam();
			$nflteam->name = "San Diego Chargers";
			$nflteam->abbreviation = "SD";
			$nflteam->save();

			$nflteam = new \App\NFLTeam();
			$nflteam->name = "San Francisco 49ers";
			$nflteam->abbreviation = "SF";
			$nflteam->save();

			$nflteam = new \App\NFLTeam();
			$nflteam->name = "Seattle Seahawks";
			$nflteam->abbreviation = "SEA";
			$nflteam->save();

			$nflteam = new \App\NFLTeam();
			$nflteam->name = "Tampa Bay Buccaneers";
			$nflteam->abbreviation = "TB";
			$nflteam->save();

			$nflteam = new \App\NFLTeam();
			$nflteam->name = "Tennessee Titans";
			$nflteam->abbreviation = "TN";
			$nflteam->save();

			$nflteam = new \App\NFLTeam();
			$nflteam->name = "Washington Redskins";
			$nflteam->abbreviation = "WAS";
			$nflteam->save();
    }
}
