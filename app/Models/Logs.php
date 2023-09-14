<?php


namespace App\Models;



use Illuminate\Database\Eloquent\Model;

class logs extends Model
{
    protected $table = 'applicant_logs';
    protected $fillable = [
        'applicant_id', 'state',
        'status', 'remarks', 'review_status', 'created_by'
    ];

    public function getUser()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function getUserName()
    {
        if (isset($this->getUser->name)) {
            return $this->getUser->name;
        } else {
            return '';
        }
    }
}
