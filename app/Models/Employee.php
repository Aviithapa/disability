<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';
    protected $fillable = [
        'name_nepali',
        'name_english',
        'designation',
        'phone_number',
        'red_signature',
        'black_signature',
        'stamp',
        'status',
    ];
}
