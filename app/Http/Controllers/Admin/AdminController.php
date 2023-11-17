<?php


namespace  App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController as AdminBaseController;
use App\Http\Requests\Applicant\CreateApplicantRequest;
use App\Http\Requests\Applicant\UpdateApplicantRequest;
use App\Models\ApplicantDetails;
use App\Modules\Backend\ApplicantInformation\Repositories\ApplicantRepository as RepositoriesApplicantRepository;
use App\Modules\Backend\DisabilityType\Repositories\DisabilityTypeRepository;
use App\Modules\Backend\Logs\LogsRepository;
use App\Modules\Framework\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminController extends AdminBaseController
{
    private $applicantController, $logRepository, $disabilityTypeRepository;
    public function __construct(RepositoriesApplicantRepository $applicantController, LogsRepository $logRepository, DisabilityTypeRepository $disabilityTypeRepository)
    {
        $this->applicantController = $applicantController;
        $this->logRepository = $logRepository;
        $this->disabilityTypeRepository = $disabilityTypeRepository;
    }

    public function updateAdmin(UpdateApplicantRequest $request, $id)
    {
        $data = $request->all();
        $data['status'] = 'approved';
        try {
            $applicant = $this->applicantController->update($data, $id);
            if ($applicant == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            $this->logs('all_approved', 'approved', $id, 'Disability Type Allocated');
            session()->flash('success', 'Data has been updated successfully');
            return redirect()->route('applicant.index');
        } catch (\Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    public function state(Request $request, $id)
    {
        $data = $request->all();
        try {
            $applicant = $this->applicantController->update($data, $id);
            if ($applicant == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            if ($data['status'] === 'rejected')
                $this->logs('ward', 'rejected', $id, $data['remarks']);
            else
                $this->logs('all_approved', 'admin_approved', $id, 'Application ready for decision');
            session()->flash('success', 'Data has been updated successfully');
            return redirect()->route('applicantData');
        } catch (\Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
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




    public function generateCardNumber($id)
    {
        $applicant =  $this->applicantController->findById($id);
        $data['IdNumber'] = $this->generateNumber($id, $applicant->disability_type);
        try {
            $applicant = $this->applicantController->update($data, $id);
            if ($applicant == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Id card number has been generated successfully');
            return redirect()->route('applicantData');
        } catch (\Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    public function generateNumber($id, $type)
    {
        $now = Carbon::now();
        $year = $now->year;
        $year = substr($year, -2);
        $num = $year . $type . str_pad($id, 5, "0", STR_PAD_LEFT);
        return $num;
    }
}
