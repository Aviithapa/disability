<?php

namespace App\Http\Requests\Applicant;

use Illuminate\Foundation\Http\FormRequest;

class CreateApplicantRequest extends FormRequest
{

    /**
     * rules
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string', 'max:255'],
            'sex' => ['required', 'string', 'max:255'],
            'age' => ['required', 'string', 'max:255'],
            'pardesh' => ['required', 'string', 'max:255'],
            'ward_no' => ['string', 'max:255'],
            // 'permanant_address' => ['required', 'string', 'max:255'],
            // 'temporary_address' => ['required', 'string', 'max:255'],
            // 'phone_number' => ['required', 'string', 'max:255'],
            // 'guardian' => ['required', 'string', 'max:255'],
            // 'relation' => ['required', 'string', 'max:255'],
            // 'guardian_number' => ['required', 'string', 'max:255'],
            // 'disability_type' => ['required', 'string', 'max:255'],
            // 'incapacitated_base_disability_type' => ['required', 'string', 'max:255'],
            // 'disability_description' => ['required', 'string', 'max:255'],
            // 'daily_effected_description' => ['required', 'string', 'max:255'],
            // 'disability_cause' => ['required', 'string', 'max:255'],
            // 'material_used' => ['required', 'string', 'max:255'],
            // 'material_used_description' => ['required', 'string', 'max:255'],
            // 'already_material_used' => ['required', 'string', 'max:255'],
            // 'material_used_name' => ['required', 'string', 'max:255'],
            // 'daily_work_without_other_help' => ['required', 'string', 'max:255'],
            // 'daily_work_with_other_help' => ['required', 'string', 'max:255'],
            // 'education_level' => ['required', 'string', 'max:255'],
            // 'trainning_name' => ['required', 'string', 'max:255'],
            // 'current_work' => ['required', 'string', 'max:255'],
            // 'citizenship_number' => ['required', 'string', 'max:255'],
            // 'blood_group' => ['required', 'string', 'max:255'],
            // 'dob_eng' => ['required', 'string', 'max:255'],
            // 'dob_nep' => ['required', 'string', 'max:255'],
            'ward_recommendation_image' => ['required', 'string', 'max:255'],
            'health_examination_report' => ['required', 'string', 'max:255'],
            'full_size_photo' => ['required', 'string', 'max:255'],
            'citizenship_image' => ['required', 'string', 'max:255'],
        ];
    }
}
