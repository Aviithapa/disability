<?php

namespace App\Http\Requests\Applicant;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApplicantRequest extends FormRequest
{

    /**
     * rules
     *
     * @return array
     */
    public function rules(): array
    {
        return [

            'disability_type_id' => ['required', 'string', 'max:255'],
            'incapacitated_base_disability_type_id' => ['required', 'string', 'max:255'],
            'decision_image' => ['required', 'string', 'max:255'],

        ];
    }
}
