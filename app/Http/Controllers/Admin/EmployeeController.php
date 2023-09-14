<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use App\Models\DisabilityType;
use App\Modules\Backend\Employee\Repositories\EmployeeRepository;
use App\Modules\Backend\Employee\Requests\CreateEmployeeRequest;
use App\Modules\Backend\Employee\Requests\UpdateEmployeeRequest;
use App\Modules\Backend\Logs\LogsRepository;
use App\Modules\Framework\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends BaseController
{
    private $employeeRepository, $logRepository;
    public function __construct(EmployeeRepository $employeeRepository, LogsRepository $logRepository)
    {
        $this->employeeRepository = $employeeRepository;
        $this->logRepository = $logRepository;
    }

    public function index(Request $request)
    {

        $applicant = DisabilityType::where('type', 'nature_of_disability')->paginate(20);
        return view('admin.pages.disability-type.index', compact('applicant'));
    }


    public function store(CreateEmployeeRequest $request)
    {
        $data = $request->all();
        try {
            $applicant = $this->employeeRepository->create($data);
            if ($applicant == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            $this->logs('admin', 'new', $applicant['id'], 'New Employee Created');
            session()->flash('success', 'Data has been created successfully');
            return redirect()->route('employee.index');
        } catch (\Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    public function update(UpdateEmployeeRequest $request, $id)
    {
        $data = $request->all();
        try {
            $applicant = $this->employeeRepository->update($data, $id);
            if ($applicant == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            $this->logs('admin', 'new', $id, 'Employee Updated Successfully');
            session()->flash('success', 'Data has been updated successfully');
            return redirect()->route('disability-type.index');
        } catch (\Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    public function show()
    {
        return view('admin.pages.disability-type.form');
    }

    public function edit($id)
    {
        $data = $this->employeeRepository->findById($id);
        return view('admin.pages.disability-type.edit', compact('data'));
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
