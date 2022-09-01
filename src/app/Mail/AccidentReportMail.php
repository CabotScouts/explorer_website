<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

use App\Models\AccidentReport;
use App\Models\Unit;

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
				$this->report = $request->all();
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
        return $this->subject('Accident Report (#' . $this->id . ')')
				->markdown('mail.accidentreport');
    }
}
