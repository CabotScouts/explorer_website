<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;
use App\Page;

class UnitController extends Controller
{
	public function index() {
		$units = Unit::where('status', 1)->orderBy('name', 'asc')->get();
		$page = Page::where('slug', ("units"))->where('status', 1)->first();
		return view('units.index', ['units' => $units, 'page' => $page]);
	}

  public function viewUnit($name) {
		$unit = Unit::where('shortname', $name)->firstOrFail();
		$page = Page::where('slug', ("units/" . $name))->where('status', 1)->first();
		return view('units.view', ['unit' => $unit, 'page' => $page]);
  }
}
