<?php

namespace App\Modules\Backend\ApplicantInformation\Repositories;

use Illuminate\Http\Request;

class ApplicantFilter
{

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply($query)
    {
        if ($this->request->get('status')) {
            $query->where('status', $this->request->input('status'));
        }

        if ($this->request->has('full_name')) {
            $query->where('full_name', 'LIKE', '%' . $this->request->get('full_name') . '%');
        }

        if ($this->request->get('serverity_disability_type')) {
            $query->where('disability_type_id', $this->request->input('serverity_disability_type'));
        }

        if ($this->request->get('disability_type')) {
            $query->where('incapacitated_base_disability_type_id', $this->request->input('disability_type'));
        }



        return $query;
    }
}
