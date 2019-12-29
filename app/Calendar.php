<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime, DateInterval;

class Calendar extends Model {
  private $events = false;

  public function sources() {
		return $this->belongsToMany('App\EventSource');
	}

  public function events() {
    if(!$this->events) $this->getEventsThrough();
    return $this->events;
  }

  private function getEventsThrough() {
    // laravel doesn't natively support hasManyThrough through a many-to-many relationship, so we need
    // to work through each source and add it's events into a new collection
    $this->events = collect();
    foreach($this->sources()->get() as $source) {
      $this->events = $this->events->concat($source->events()->get());
    }

    return true;
  }

  public function getMonth($month = false, $year = false) {
    $year  = $year ? $year : (new DateTime)->format("Y");
    $month = $month ? $month : (new DateTime)->format("m");
    
    $d = new DateTime;
    $d->setDate($year, $month, 01);

    $start = $d->format("Y-m-d");
    $end = $d->add(new DateInterval("P1M"))->format("Y-m-d");

    return $this->events()->whereBetween('start', [$start, $end]);
  }
}
