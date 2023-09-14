<?php


namespace App\Modules\Backend\Employee\Requests;

use App\Modules\Framework\Request;

class CreateEmployeeRequest extends Request
{

    public function rules()
    {
        return [
            'name_nepali' => 'required|string',
            'name_english' => 'required|string',
            'designation' => 'required|string',
            'phone_number' => 'required|string',
            'red_signature' => 'required|string',
            'black_signature' => 'required|string',
            'stamp' => 'required|string',
            'status' => 'required|string',
        ];
    }
}
