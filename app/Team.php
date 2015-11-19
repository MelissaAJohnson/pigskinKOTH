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
    	return $this->hasMany('\App\Pick');
    }
}
