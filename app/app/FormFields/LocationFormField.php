<?php
namespace App\FormFields;
use TCG\Voyager\FormFields\AbstractHandler;

class LocationFormField extends AbstractHandler
{
    protected $codename = 'maplocation';

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('component.formfield.maplocation', [
            'row'             => $row,
            'options'         => $options,
            'dataType'        => $dataType,
            'dataTypeContent' => $dataTypeContent,
        ]);
    }
}
