<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Unit;
use App\AccidentReport;
use App\Mail\AccidentReportMail;

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
			'theirName'     => 'required'
		],
		[
			'reporterName.required'  => 'You need to enter your name',
			'reporterEmail.required' => 'You need to enter your email address',
			'reporterEmail.email'    => 'You need to enter a valid email address',
			'theirName.required'     => 'You need to enter their name'
		]
		)->validate();

		// Store basic report info in DB (report ID, who reported (name and IP address), time of report)
		$report = new AccidentReport;
		$report->reporter = $request->reporterName;
		$report->ip = $request->ip();
		$report->save();

		$contact = env('ADDRESS_ACCIDENTS');
		$orig = new AccidentReportMail($report, $request);
		$copy = new AccidentReportMail($report, $request);

		// Future: render email output to PDF to attach to email (for storage)

		// Send out report to accidents email & reporter
		Mail::to($contact)->send($orig->replyTo($request->reporterEmail));
		Mail::to($request->reporterEmail)->send($copy->replyTo($contact));

		return view('form.accident.store', [
			'form' => $request,
			'id'   => $report->id
		]);
  }

	public function contactCreate() {

	}

	public function contactStore() {

	}
}
