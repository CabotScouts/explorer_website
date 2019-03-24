<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;
use App\Page;

class UnitController extends Controller
{
	public function index() {
		$units = Unit::where('status', 'visible')->orderBy('name', 'asc')->get();
		return view('unit.index', ['units' => $units]);
	}

  public function showUnit($name) {
		$page = Page::where('slug', ("units/" . $name))->where('status', 1)->firstOrFail();
		return view('page', ['page' => $page]);
  }
}
