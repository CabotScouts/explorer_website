<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;
use ICal\ICal;

class EventSource extends Model {
  public function calendars() {
		return $this->belongsToMany('App\Calendar');
	}

	public function events() {
		return $this->hasMany('App\Event');
	}

  public function removeAllEvents() {
    return $this->events()->delete();
  }

  public function updateFromRemote() {
    if($this->type == "remote") {
      $calendar = new ICal($this->ics);

      if($calendar->eventCount > 0) {
        $this->removeAllEvents();
        foreach($calendar->events() as $remoteEvent) {
          $event = new Event;
          $event->event_source_id = $this->id;
          $event->fromICS($remoteEvent);
          $event->save();
        }
        return $this->save();
      }
      return false;
    }
    return false;
  }
}
