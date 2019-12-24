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
    $sources = EventSource::all();

    foreach($sources as $source) {
      print($source->id . " " . $source->name . " " . $source->ics);
    }
  }

  public function listCalendars() {
    $calendars = Calendar::all();
    var_dump($calendars);
  }

  public function newEvent() {
    return view('eventTest.newevent');
  }

  public function createEvent(Request $request) {

  }

  public function newSource() {
    return view('eventTest.newsource');
  }

  public function createSource(Request $request) {
    $s = new EventSource;
    $s->name = $request->sourceName;
    $s->ics = $request->sourceURL;
    $s->type = "remote";
    $s->save();

    return "source saved";
  }

  public function flushSource($id) {
    $source = EventSource::where('id', $id)->first();
    $source->removeAllEvents();
  }

  public function updateSource($id) {
    $source = EventSource::where('id', $id)->first();
    $source->updateFromRemote();
  }

  public function newCalendar() {
    return view('eventTest.newcalendar');
  }

  public function createCalendar(Request $request) {

  }
}
