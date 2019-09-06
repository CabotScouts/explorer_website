<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    public function sources() {
			return $this->belongsToMany('App\EventSource');
		}
}
