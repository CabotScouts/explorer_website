<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function source() {
			return $this->hasOne('App\EventSource');
		}

    public function fromRemote() {
      // populate fields from parsed ical event
      
    }
}
