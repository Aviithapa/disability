<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ApplicantDetails extends Model
{
    protected $table = 'applicant_details';
    protected $fillable = [
        'full_name',
        'full_name_nep',
        'sex',
        'age',
        'pardesh',
        'permanant_address',
        'temporary_address',
        'phone_number',
        'guardian',
        'relation',
        'guardian_number',
        'disability_type',
        'incapacitated_base_disability_type',
        'disability_description',
        'daily_effected_description',
        'disability_cause',
        'material_used',
        'material_used_description',
        'already_material_used',
        'material_used_name',
        'daily_work_without_other_help',
        'daily_work_with_other_help',
        'education_level',
        'trainning_name',
        'current_work',
        'applied_date',
        'photo',
        'citizenship_number',
        'blood_group',
        'dob_eng',
        'dob_nep',
        'IdNumber',
    ];

    public function getProfileImage()
    {
        if(isset($this->photo)) {
            return Storage::url('photo/' .$this->photo);
        }
        else {
            return imageNotFound();
        }
    }
}
