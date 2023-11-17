<?php

namespace App\Http\Controllers\Admin;

use App\Modules\Backend\ApplicantInformation\Repositories\ApplicantRepository;
use App\Modules\Backend\DisabilityType\Repositories\DisabilityTypeRepository;
use App\Modules\Backend\Logs\LogsRepository;
use Illuminate\Http\Request;

class PrintController extends BaseController
{
    private $applicantRepository, $logRepository, $disabilityTypeRepository;
    public function __construct(
        ApplicantRepository $applicantRepository,
        LogsRepository $logRepository,
        DisabilityTypeRepository $disabilityTypeRepository
    ) {
        $this->applicantRepository = $applicantRepository;
        $this->logRepository = $logRepository;
        $this->disabilityTypeRepository = $disabilityTypeRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $applicant = $this->applicantRepository->getPaginatedList($request);
        $disability_types = $this->disabilityTypeRepository->getAll()->where('type', 'nature_of_disability');
        $severity_types = $this->disabilityTypeRepository->getAll()->where('type', 'severity_of_disability');
        return view('admin.pages.print.index', compact('applicant', 'request', 'disability_types', 'severity_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $applicant = $this->applicantRepository->findById($id);
        return view('admin.pages.print.print', compact('applicant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
