@php
	$needsParent = !($report["parentNotified"] ?? false);
	$needsHQ = ($report["furtherTreatment"] ?? false) && !($report["hqNotified"] ?? false);
@endphp
@component('mail::message')
# Accident Report #{{ $id }}

@if($needsParent || $needsHQ)
@component('mail::panel')
## Next Steps
@if($needsParent)
* If an Explorer was involved, make sure a parent/carer has been notified of the accident and the treatment given.
@endif
@if($needsHQ)
* As this accident required further treatment, HQ must be notified. Please contact the DESC as soon as possible.
@endif
@endcomponent
@endif

## Basic Information
@component('mail::table')
| Field             | Data                                                             |
| :--------         | :--------------------------------------------------------------- |
| Report ID         | {{ $id }}                                                        |
| Reporter          | {{ $report["reporterName"] }}                                      |
| Email             | {{ $report["reporterEmail"] }}                                     |
| Injured           | {{ $report["theirName"] }}                                         |
| Unit              | {{ $unit ? $unit : "*No information given*" }}                   |
| When              | {{ $report["when"] ?? "*No information given*" }}   |
| Where             | {{ $report["where"] ?? "*No information given*" }} |
| On Group Premises | {{ ($report["groupPremises"] ?? false) ? "Yes" : "No" }}            |
@endcomponent

## Accident Details
{{ $report["description"] ?? "*No information given*" }}

## Treatment Given
{{ $report["treatment"] ?? "*No information given*" }}

## Further Reporting
@component('mail::table')
| Field                      | Data                                                     |
| :------------------------- | :------------------------------------------------------- |
| Needs Reporting to Group   | {{ ($report["groupPremises"] ?? false) ? "Yes" : "No" }}    |
| Parent/Carer Notified      | {{ ($report["parentNotified"] ?? false) ? "Yes" : "No" }}   |
| Required Further Treatment | {{ ($report["furtherTreatment"] ?? false) ? "Yes" : "No" }} |
| DESC Notified              | {{ ($report["hqNotified"] ?? false) ? "Yes" : "No" }}       |
| HQ Notified                | {{ ($report["unityNotified"] ?? false) ? "Yes" : "No" }}    |
@endcomponent

You have received this email as you are either a designated accident report contact for {{ config('app.name') }}, or you submitted the report.
@endcomponent
