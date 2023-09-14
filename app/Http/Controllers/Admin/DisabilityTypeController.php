<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use App\Models\DisabilityType;
use App\Modules\Backend\DisabilityType\Repositories\DisabilityTypeRepository;
use App\Modules\Backend\DisabilityType\Requests\CreateDisabilityTypeRequest;
use App\Modules\Backend\DisabilityType\Requests\UpdateDisabilityTypeRequest;
use App\Modules\Backend\Logs\LogsRepository;
use App\Modules\Framework\Request;
use Illuminate\Support\Facades\Auth;

class DisabilityTypeController extends BaseController
{
    private $disabilityTypeRepository, $logRepository;
    public function __construct(DisabilityTypeRepository $disabilityTypeRepository, LogsRepository $logRepository)
    {
        $this->disabilityTypeRepository = $disabilityTypeRepository;
        $this->logRepository = $logRepository;
    }

    public function index(Request $request)
    {

        $applicant = DisabilityType::where('type', 'nature_of_disability')->paginate(20);
        return view('admin.pages.disability-type.index', compact('applicant'));
    }


    public function store(CreateDisabilityTypeRequest $request)
    {
        $data = $request->all();
        try {
            $applicant = $this->disabilityTypeRepository->create($data);
            if ($applicant == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            $this->logs('admin', 'new', $applicant['id'], 'New Disability Type');
            session()->flash('success', 'Data has been created successfully');
            return redirect()->route('disability-type.index');
        } catch (\Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    public function update(UpdateDisabilityTypeRequest $request, $id)
    {
        $data = $request->all();
        try {
            $applicant = $this->disabilityTypeRepository->update($data, $id);
            if ($applicant == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            $this->logs('admin', 'new', $id, 'Disability Type Updated Successfully');
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
        $data = $this->disabilityTypeRepository->findById($id);
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
