<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Unit;
use App\AccidentReport;

class FormController extends Controller
{
	public function accidentCreate() {
		$units = Unit::where('status', 1)->orderBy('name', 'asc')->get();
		return view('form.accident.create', ['units' => $units]);
	}

  public function accidentStore(Request $request) {
		$validator = Validator::make($request->all(),
		[
			'reporterName'  => 'required',
			'reporterEmail' => 'required|email',
			'theirName'     => 'required',
			'theirUnit'     => 'required|exists:units,shortname',
		],
		[
			'reporterName.required'  => 'You need to enter your name',
			'reporterEmail.required' => 'You need to enter your email address',
			'reporterEmail.email'    => 'You need to enter a valid email address',
			'theirName.required'     => 'You need to enter their name',
			'theirUnit.required'     => 'You need to select their Unit',
			'theirUnit.exists'       => 'You need to select a real Unit'
		]
		)->validate();

		// Store basic report info in DB (report ID, who reported (name and IP address), time of report)
		$report = new AccidentReport;
		$report->reporter = $request->reporterName;
		$report->ip = $request->ip();
		$report->save();

		// Send out report to accidents email - all info
		// Send copy of report to submitter - next steps

		return view('form.accident.store', [
			'treatment' => $request->furtherTreatment,
			'email'     => $request->reporterEmail,
			'id'        => $report->id
		]);
  }

	public function contactCreate() {

	}

	public function contactStore() {

	}
}
