<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UnitController extends Controller
{
	public function index() {
		$units = App\Unit::orderBy('day', 'asc')->get();
		return view('unit.index');
	}

  public function showUnit($name) {
		$unit = App\Unit::where('name', $name)->get();
    return view('unit.show', $unit);
  }
}
