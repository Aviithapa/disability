<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class DisabilityType extends Model
{
    protected $table = 'disablity_type';
    protected $fillable = [
        'name_nepali',
        'name_english',
        'points',
        'type',
        'color'
    ];

    public function applicantDetails()
    {
        return $this->hasMany(ApplicantDetails::class, 'disability_type_id', 'id')->where('type', 'severity_of_disability');
    }

    public function applicantDetailsBasedOnNatureOfDisability()
    {
        return $this->hasMany(ApplicantDetails::class, 'incapacitated_base_disability_type_id', 'id')->where('type', 'nature_of_disability');
    }
}
