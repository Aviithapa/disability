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
}
