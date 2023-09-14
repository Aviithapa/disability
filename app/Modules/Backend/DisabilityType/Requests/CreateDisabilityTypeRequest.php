<?php


namespace App\Modules\Backend\DisabilityType\Requests;

use App\Modules\Framework\Request;

class CreateDisabilityTypeRequest extends Request
{

    public function rules()
    {
        return [
            'name_nepali' => 'required|string',
            'name_english' => 'required|string',
            'points' => 'required|string',
            'type' => 'required|string',
            'color' => 'string'
        ];
    }
}
