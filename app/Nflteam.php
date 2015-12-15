<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nflteam extends Model
{
	public function pick() {
        # Nflteam has many Picks
        # Define a one-to-many relationship.
        return $this->hasMany('\App\Pick');
    }

	public function getTeamsForDropdown() {
        $nflteams = $this->orderby('abbreviation','ASC')->get();
        $teams_for_dropdown = [];
        foreach($nflteams as $nflteam) {
            $teams_for_dropdown[$nflteam->id] = $nflteam->name.', '.$nflteam->abbreviation;
        }
        return $teams_for_dropdown;
    }
}
