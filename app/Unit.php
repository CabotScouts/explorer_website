<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public function getDayAttribute($value) {
			$days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
			if($value >= 0 && $value < 7) return $days[$value];
			return false;
		}
}
