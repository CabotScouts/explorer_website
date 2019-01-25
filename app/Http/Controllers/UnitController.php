<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;

class UnitController extends Controller
{
	public function index() {
		$units = Unit::orderBy('day', 'asc')->get();
		return view('unit.index', ['units' => $units]);
	}

  public function showUnit($name) {
		$unit = Unit::where('shortname', $name)->get();
		if($unit)	return view('unit.show', ['unit' => $unit]);
		//return view('404');
		return '404';
  }
}
