<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;
use ICal\ICal;

class EventSource extends Model
{
    public function calendars() {
			return $this->belongsToMany('App\Calendar');
		}

		public function events() {
			return $this->hasMany('App\Event');
		}

    public function removeAllEvents() {
      foreach($this->events() as $event) {
        $event->delete();
      }
    }

    public function updateFromRemote() {
      $calendar = new ICal($this->cal);

      if($calendar->eventsCount > 0) {
        $this->removeAllEvents();
        foreach($calendar->events() as $remoteEvent) {
          $event = new Event;
          $event->eventsource_id = $this->id;
          $event->fromRemote($remoteEvent);
          $event->save();
        }
      }

    $this->save();
    }
}
