<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;
use App\Page;
use App\IGTag;

class UnitController extends Controller
{
	public function showUnits() {
		$units = Unit::where('status', 1)->orderBy('name', 'asc')->get();
		$page  = Page::where('slug', ("units"))->where('status', 1)->first();
		return view('units.index', ['units' => $units, 'page' => $page]);
	}

  public function viewUnitIndex($name) {
		$units = Unit::where('status', 1)->orderBy('name', 'asc')->get();
		$unit  = Unit::where('shortname', $name)->firstOrFail();
		$media = IGTag::where('tag', $unit->tag);
		$page  = Page::where('slug', ("units/" . $name))->where('status', 1)->first();

		return view('units.view', [
			'root'  => true,
			'unit'  => $unit,
			'units' => $units,
			'page'  => $page,
			'media' => (($media->count() > 0) ? $media->first()->media()->limit(6)->get() : false)
		]);
  }

	public function viewUnitPage($name, $slug) {
		$units = Unit::where('status', 1)->orderBy('name', 'asc')->get();
		$unit  = Unit::where('shortname', $name)->firstOrFail();
		$page  = Page::where('slug', ("units/" . $name . "/" . $slug))->where('status', 1)->firstOrFail();

		return view('units.view', [
			'unit'  => $unit,
			'units' => $units,
			'page'  => $page
		]);
	}

	public function viewUnitProgramme($name) {
		return $this->viewUnitIndex($name);
	}

	public function viewUnitContact($name) {
		return $this->viewUnitIndex($name);
	}
}
