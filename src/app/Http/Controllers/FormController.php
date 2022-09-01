<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

use App\Models\Unit;
use App\Models\AccidentReport;
use App\Mail\AccidentReportMail;

class FormController extends Controller
{
	public function index() {
		return "";
	}

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
			recaptchaFieldName() => recaptchaRuleName()
		],
		[
			'reporterName.required'  => 'You need to enter your name',
			'reporterEmail.required' => 'You need to enter your email address',
			'reporterEmail.email'    => 'You need to enter a valid email address',
			'theirName.required'     => 'You need to enter their name',
			'recaptcha'              => 'You need to prove you\'re not a robot'
		]
		)->validate();

		// Store basic report info in DB (report ID, who reported (name and IP address), time of report)
		$report = new AccidentReport;
		$report->reporter = $request->reporterName;
		$report->ip = $request->ip();
		$report->save();

		$contact = config('explorers.emails.accidents');
		$desc = config('explorers.emails.DESC');

		$orig = new AccidentReportMail($report, $request);
		$orig = $orig->replyTo($request->reporterEmail);
		$orig = $orig->cc(config('explorers.emails.DESC'));
		
		$copy = new AccidentReportMail($report, $request);
		$copy = $copy->replyTo($contact);

		// Future: render email output to PDF to attach to email (for storage)

		// Send out report to accidents email & reporter
		Mail::to($contact)->send($orig);
		if($request->reporterEmail !== $contact) {
			// Unlikely, but emails are limited so better to check!
			Mail::to($request->reporterEmail)->send($copy);
		}

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
