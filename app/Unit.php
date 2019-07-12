<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Page;

class Unit extends Model
{
    public function getDayStringAttribute() {
			$days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
			if($this->day >= 0 && $this->day < 7) return $days[$this->day];
			return '';
		}

		public function getUrlAttribute() {
			// Less intensive way to do this?
			$slug = "units/" . $this->shortname;
			$page = Page::where('slug', $slug)->where('status', 1)->first();
			if($page) return route('page', ['page' => $slug]);
			return false;
		}
}
