@php
	$needsParent = !$report->parentNotified;
	$needsHQ = $report->furtherTreatment && !$report->hqNotified;
@endphp
@component('mail::message')
# Accident Report #{{ $id }}

@if($needsParent || $needsHQ)
@component('mail::panel')
## Next Steps
@if($needsParent)
* If an Explorer was involved, make sure a parent/carer has been notified of the accident and the treatment given
@endif
@if($needsHQ)
* As this accident required further treatment, HQ must be notified - [fill out the Scout Incident Form](https://app.smartsheet.com/b/form/f16aec805bee49cdbc4d12c82b5e7d2b) as soon as possible
@endif
@endcomponent
@endif

## Basic Information
@component('mail::table')
| Field             | Data                                                             |
| :--------         | :--------------------------------------------------------------- |
| Report ID         | {{ $id }}                                                        |
| Reporter          | {{ $report->reporterName }}                                      |
| Email             | {{ $report->reporterEmail }}                                     |
| Injured           | {{ $report->theirName }}                                         |
| Unit              | {{ $unit ? $unit : "*No information given*" }}                   |
| When              | {{ $report->when ? $report->when : "*No information given*" }}   |
| Where             | {{ $report->where ? $report->where : "*No information given*" }} |
| On Group Premises | {{ ($report->groupPremises == "on") ? "Yes" : "No" }}            |
@endcomponent

## Accident Details
{{ $report->description ? $report->description : "*No information given*" }}

## Treatment Given
{{ $report->treatment ? $report->treatment : "*No information given*" }}

## Further Reporting
@component('mail::table')
| Field                      | Data                                                     |
| :------------------------- | :------------------------------------------------------- |
| Needs Reporting to Group   | {{ ($report->groupPremises == "on") ? "Yes" : "No" }}    |
| Parent/Carer Notified      | {{ ($report->parentNotified == "on") ? "Yes" : "No" }}   |
| Required Further Treatment | {{ ($report->furtherTreatment == "on") ? "Yes" : "No" }} |
| HQ Notified                | {{ ($report->hqNotified == "on") ? "Yes" : "No" }}       |
| Unity Form Completed       | {{ ($report->unityNotified == "on") ? "Yes" : "No" }}    |
@endcomponent

You have received this email as you are either the designated accident report contact for {{ config('app.name') }}, or you submitted the report.
@endcomponent
