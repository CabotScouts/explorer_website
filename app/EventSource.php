<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventSource extends Model
{
    public function calendars() {
			return $this->belongsToMany('App\Calendar');
		}

		public function events() {
			return $this->hasMany('App\Event');
		}
}
