<?php

namespace App\Http\Controllers\Admin;

use App\Models\DisabilityType;
use App\Modules\Backend\ApplicantInformation\Repositories\ApplicantRepository;
use App\Modules\Backend\DisabilityType\Repositories\DisabilityTypeRepository;
use App\Modules\Backend\Logs\LogsRepository;

class DashboardController extends BaseController
{
    //


    public function __construct()
    {
    }


    public function index()
    {
        $countsByCategory = DisabilityType::withCount(['applicantDetails'])->where('type', 'severity_of_disability')->get();
        $natureOfDisability = DisabilityType::withCount(['applicantDetailsBasedOnNatureOfDisability'])->where('type', 'nature_of_disability')->get();
        return view('admin.dashboard.admin', compact('countsByCategory', 'natureOfDisability'));
    }
}
