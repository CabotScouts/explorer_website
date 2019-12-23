<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\EventSource;
use App\Calendar;
use App\Event;

class EventTestController extends Controller
{
  // test methods for creating/manipulating event related things
  public function listEvents() {
    $events = Event::all();

    var_dump($events);
  }

  public function listSources() {

  }

  public function listCalendars() {

  }

  public function addSource(Request $request) {

  }
}
