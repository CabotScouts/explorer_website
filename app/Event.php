<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;

class Event extends Model {

  protected $hidden  = ['created_at', 'updated_at', 'event_source_id'];
  protected $appends = ['source_name'];
  protected $fillable = ['uid', 'event_source_id'];

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

    $start = new DateTime($remote->dtstart);
    $end   = new DateTime($remote->dtend);

    $this->start_date = $start->format("Y-m-d");
    $this->end_date   = $end->format("Y-m-d");
    $this->start_time = $start->format("H:i");
    $this->end_time   = $end->format("H:i");
  }

  public function toICS() {
    // so we can export calendars as new ICS files
  }
}
