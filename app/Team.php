<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function user() {
        # Team belongs to User
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('\App\User');
    }

    public function pick() {
    	# Team has many picks
    	# Define a one-to-many relationship.
    	return $this->hasMany('\App\Pick');
    }
}
