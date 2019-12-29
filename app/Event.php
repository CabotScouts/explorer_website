<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;

class Event extends Model {
  protected $hidden = ['created_at', 'updated_at', 'event_source_id'];
  protected $appends = ['source_name'];

  public function source() {
  	return $this->belongsTo('App\EventSource', 'event_source_id')->first();
  }

  public function getSourceNameAttribute() {
    return $this->source()->name;
  }

  public function fromICS($remote) {
    $this->name        = $remote->summary;
    $this->location    = $remote->location;
    $this->description = $remote->description;

    $this->start = new DateTime($remote->dtstart);
    $this->end   = new DateTime($remote->dtend);
  }

  public function toICS() {
    // so we can export calendars as new ICS files
  }
}
