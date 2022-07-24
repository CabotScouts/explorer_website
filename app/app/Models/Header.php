<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
	public function pages() {
		return $this->hasMany('App\Models\Page');
	}
}
