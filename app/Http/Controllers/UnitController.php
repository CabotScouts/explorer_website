<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;
use App\Page;

class UnitController extends Controller
{
	public function index() {
		$units = Unit::where('status', 1)->orderBy('name', 'asc')->get();
		return view('units', ['units' => $units]);
	}

  public function showUnit($name) {
		$page = Page::where('slug', ("units/" . $name))->where('status', 1)->firstOrFail();
		return view('page', ['page' => $page]);
  }
}
