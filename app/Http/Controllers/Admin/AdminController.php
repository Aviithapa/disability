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

    public function dashboard()
    {
        $role = Auth::user()->role;

        if ($role === 'ward') {
            $unverifiedCount = $this->applicantController->getAll()->where('status', '=', 'new')->where('ward_no', '=',  Auth::user()->ward_no)->count();
            $adminVerifiedCount = $this->applicantController->getAll()->where('status', '=', 'admin_approved')->where('ward_no', '=',  Auth::user()->ward_no)->count();
            $verifiedCount = $this->applicantController->getAll()->where('status', '=', 'approved')->where('ward_no', '=',  Auth::user()->ward_no)->count();
            $rejectedCount = $this->applicantController->getAll()->where('status', '=', 'rejected')->where('ward_no', '=',  Auth::user()->ward_no)->count();
            return view('ward-dashboard', compact('unverifiedCount', 'verifiedCount', 'rejectedCount', 'adminVerifiedCount'));
        }
        $unverifiedCount = $this->applicantController->getAll()->where('status', '=', 'new');
        $verifiedCount = $this->applicantController->getAll()->where('status', '=', 'approved');
        $rejectedCount = $this->applicantController->getAll()->where('status', '=', 'rejected')->count();

        return view('welcome', compact('unverifiedCount', 'verifiedCount', 'rejectedCount'));
    }
    public function index(Request $request)
    {
        $role = Auth::user()->role;

        if ($request->isMethod('post')) {
            $query =
                ApplicantDetails::query()->with('disability');

            if ($request->full_name != null) {
                $query->where('full_name', 'LIKE', '%' . $request->full_name . "%");
            }
            if ($request->status != null) {
                $query->where('status', 'LIKE', '%' . $request->status . "%");
            }

            if ($role === 'ward') {
                $query->where('ward_no', '=',  Auth::user()->ward_no);
            }

            $applicant = $query->orderBy('created_at', 'desc')->paginate(10);

            return view('admin.pages.index', compact('applicant', 'request'));
        }

        $data =
            ApplicantDetails::query()->with('disability');

        if ($role === 'ward') {
            $data->where('ward_no', '=',  Auth::user()->ward_no);
        }
        $applicant = $data->orderBy('created_at', 'desc')->paginate(10);


        return view('admin.pages.index', compact('applicant'));
    }

    public function printIndex(Request $request)
    {
        $applicant = ApplicantDetails::query()->where('status', '=', 'approved')->paginate(10);
        if ($request->isMethod('post')) {
            $query =
                ApplicantDetails::query()->where('status', '=', 'approved');

            if ($request->full_name != null) {
                $query->where('full_name', 'LIKE', '%' . $request->full_name . "%");
            }
            if ($request->status != null) {
                $query->where('status', 'LIKE', '%' . $request->status . "%");
            }

            $applicant = $query->orderBy('created_at', 'desc')->paginate(10);

            return view('admin.pages.printIndex', compact('applicant', 'request'));
        }

        return view('admin.pages.printIndex', compact('applicant'));
    }

    public function save(CreateApplicantRequest $request)
    {
        $data = $request->all();
        $data['photo'] = $data['transcript_tslc'];
        if (Auth::user()->role === 'ward')
            $data['ward_no'] = Auth::user()->ward_no;

        // dd($data);
        try {
            $applicant = $this->applicantController->create($data);
            if ($applicant == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            $this->logs('admin', 'new', $applicant['id'], 'New applicant');
            session()->flash('success', 'Data has been created successfully');
            return redirect()->route('applicantData');
        } catch (\Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['photo'] = $data['transcript_tslc'];
        try {
            $applicant = $this->applicantController->update($data, $id);
            if ($applicant == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            $this->logs('admin', 'new', $id, 'Application Updated Successfully');
            session()->flash('success', 'Data has been updated successfully');
            return redirect()->route('applicantData');
        } catch (\Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    public function show($id)
    {
        $applicant = $this->applicantController->findById($id);
        return view('admin.pages.show', compact('applicant'));
    }

    public function view($id)
    {
        $data = $this->applicantController->findById($id);
        $profile_logs = $this->logRepository->getAll()->where('applicant_id', $id);
        $disability_type = $this->disabilityTypeRepository->getAll()->where('type', 'nature_of_disability');
        $disability_group = $this->disabilityTypeRepository->getAll()->where('type', 'severity_of_disability');
        return view('admin.pages.applicant', compact('data', 'profile_logs', 'disability_type', 'disability_group'));
    }

    public function edit($id)
    {
        $data = $this->applicantController->findById($id);
        return view('admin.pages.edit', compact('data'));
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
            return redirect()->route('applicantData');
        } catch (\Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }
}
