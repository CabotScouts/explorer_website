<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Calendar;

class CalendarController extends Controller {

  public function index() {
    $this->show(1);
  }

  public function show($calendar) {
    $calendar = Calendar::where('id', $calendar)->firstOrFail();
  }

  public function month($calendar, $year = false, $month = false) {
    $calendar = Calendar::where('id', $calendar)->firstOrFail();
    $events = $calendar->getMonth($month, $year);

    return $events->toJSON();
  }

  public function export($calendar) {
    $calendar = Calendar::where('slug', $calendar)->firstOrFail();

    return "ICS";
  }
}
