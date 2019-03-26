<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public function getDayStringAttribute() {
			$days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
			if($this->day >= 0 && $this->day < 7) return $days[$this->day];
			return '';
		}
}
