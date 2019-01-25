<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UnitController extends Controller
{
	public function index() {
		return view('units');
	}

  public function showUnit($unit) {
    return $unit;
  }
}
