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
        'ward_recommendation_image',
        'health_examination_report',
        'full_size_photo',
        'video',
        'citizenship_image',
        'status',
        'ward_no',
        'decision_image',
        'disability_type_id',
        'incapacitated_base_disability_type_id',
    ];

    public function getProfileImage()
    {
        if (isset($this->photo)) {
            return Storage::url('photo/' . $this->photo);
        } else {
            return imageNotFound();
        }
    }

    public function getWardRecommendationImage()
    {
        if (isset($this->ward_recommendation_image)) {
            return Storage::url('photo/' . $this->ward_recommendation_image);
        } else {
            return imageNotFound();
        }
    }

    public function getHealthExaminationImage()
    {
        if (isset($this->health_examination_report)) {
            return Storage::url('photo/' . $this->health_examination_report);
        } else {
            return imageNotFound();
        }
    }

    public function getFullSizeImage()
    {
        if (isset($this->full_size_photo)) {
            return Storage::url('photo/' . $this->full_size_photo);
        } else {
            return imageNotFound();
        }
    }

    public function getCitizenshipImage()
    {
        if (isset($this->citizenship_image)) {
            return Storage::url('photo/' . $this->citizenship_image);
        } else {
            return imageNotFound();
        }
    }

    public function getVideo()
    {
        if (isset($this->video)) {
            return Storage::url('photo/' . $this->video);
        } else {
            return imageNotFound();
        }
    }

    public function getDecisionPhoto()
    {
        if (isset($this->decision_image)) {
            return Storage::url('photo/' . $this->decision_image);
        } else {
            return imageNotFound('small');
        }
    }

    public function disability()
    {
        return $this->belongsTo(DisabilityType::class, 'disability_type_id', 'id');
    }

    public function disabilitySeverity()
    {
        return $this->belongsTo(DisabilityType::class, 'incapacitated_base_disability_type_id', 'id');
    }
}
