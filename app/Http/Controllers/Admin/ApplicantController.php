<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Applicant\CreateApplicantRequest;
use App\Modules\Backend\ApplicantInformation\Repositories\ApplicantRepository;
use App\Modules\Backend\DisabilityType\Repositories\DisabilityTypeRepository;
use App\Modules\Backend\Logs\LogsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicantController extends BaseController
{
    //
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
        return view('admin.pages.applicant.index', compact('applicant', 'request', 'disability_types', 'severity_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.applicant.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateApplicantRequest $request)
    {
        $data = $request->all();
        $data['photo'] = $data['transcript_tslc'];
        try {
            $applicant = $this->applicantRepository->create($data);
            if ($applicant == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            $this->logs('admin', 'new', $applicant['id'], 'New applicant');
            session()->flash('success', 'Data has been created successfully');
            return redirect()->route('applicant.index');
        } catch (\Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->applicantRepository->findById($id);
        $profile_logs = $this->logRepository->getAll()->where('applicant_id', $id);
        $disability_type = $this->disabilityTypeRepository->getAll()->where('type', 'nature_of_disability');
        $disability_group = $this->disabilityTypeRepository->getAll()->where('type', 'severity_of_disability');
        return view('admin.pages.applicant.show', compact('data', 'profile_logs', 'disability_type', 'disability_group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->applicantRepository->findById($id);
        return view('admin.pages.applicant.edit', compact('data'));
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
        $data = $request->all();
        $data['photo'] = $data['transcript_tslc'];
        try {
            $applicant = $this->applicantRepository->update($data, $id);
            if ($applicant == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            $this->logs('admin', 'new', $id, 'Application Updated Successfully');
            session()->flash('success', 'Data has been updated successfully');
            return redirect()->route('applicant.index');
        } catch (\Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //TODO: implement delete function here
    }

    public function logs($state, $status, $applicantId, $remarks)
    {
        $data['state'] = $state;
        $data['status'] = $status;
        $data['created_by'] = Auth::user()->id;
        $data['remarks'] = $remarks;
        $data['applicant_id'] = $applicantId;

        try {
            $logs = $this->logRepository->create($data);
            if ($logs == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            return;
        } catch (\Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }
}
