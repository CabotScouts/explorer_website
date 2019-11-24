<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use App\AccidentReport;
use App\Unit;

class AccidentReportMail extends Mailable
{
    use Queueable, SerializesModels;

		public $id;
		public $unit;
		public $report;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(AccidentReport $report, Request $request)
    {
        $this->id = $report->id;
				$this->report = $request;
				$unit = Unit::where('shortname', $request->theirUnit)->first();
				$this->unit = $unit ? $unit->name : false;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('[' . env('APP_NAME') . '] Accident Report (#' . $this->id . ')')
				->from(env('ADDRESS_NOREPLY'))
				->markdown('mail.accidentreport');
    }
}
