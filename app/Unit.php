<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Spatial;
use App\Page;

class Unit extends Model
{
	public function getRawCoords() {
		$coords = explode(',', $this->coordinates);
		return (count($coords) === 2) ? $coords : [ env("GOOGLE_MAPS_DEFAULT_CENTER_LAT"), env("GOOGLE_MAPS_DEFAULT_CENTER_LNG") ];
	}

	public function getCoordinates() {
		// mimic Voyager function to enable bread coordinates
		$coords = $this->getRawCoords();
		return ($coords) ? [ [ 'lat' => $coords[0], 'lng' => $coords[1] ]] : false;
	}

	public function getLatAttribute() {
		return $this->getRawCoords()[0];
	}

	public function getLngAttribute() {
		return $this->getRawCoords()[1];
	}

  public function getDayStringAttribute() {
		$days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
		return ($this->day >= 0 && $this->day < 7) ? $days[$this->day] : '';
	}

	public function getUrlAttribute() {
		// Less intensive way to do this?
		$slug = "units/" . $this->shortname;
		$page = Page::where('slug', $slug)->where('status', 1)->first();
		if($page) return route('page', ['page' => $slug]);
		return false;
	}
}
