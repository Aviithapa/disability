<?php


namespace  App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController as AdminBaseController;
use App\Http\Requests\Applicant\CreateApplicantRequest;
use App\Http\Requests\Applicant\UpdateApplicantRequest;
use App\Models\ApplicantDetails;
use App\Modules\Backend\ApplicantInformation\Repositories\ApplicantRepository as RepositoriesApplicantRepository;
use App\Modules\Backend\Logs\LogsRepository;
use App\Modules\Framework\Request;
use Carbon\Carbon;
use Carbon\Exceptions\Exception as ExceptionsException;
use Exception;
use Illuminate\Support\Facades\Auth;
use PDF;

class AdminController extends AdminBaseController
{
    private $applicantController, $logRepository;
    public function __construct(RepositoriesApplicantRepository $applicantController, LogsRepository $logRepository)
    {
        $this->applicantController = $applicantController;
        $this->logRepository = $logRepository;
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
        $unverifiedCount = $this->applicantController->getAll()->where('IdNumber', '=', '');
        $verifiedCount = $this->applicantController->getAll()->where('IdNumber', '!=', '');

        return view('welcome', compact('unverifiedCount', 'verifiedCount'));
    }
    public function index(Request $request)
    {
        $role = Auth::user()->role;

        if ($request->isMethod('post')) {
            $query =
                ApplicantDetails::query();

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
            ApplicantDetails::query();

        if ($role === 'ward') {
            $data->where('ward_no', '=',  Auth::user()->ward_no);
        }
        $applicant = $data->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pages.index', compact('applicant'));
    }

    public function printIndex(Request $request)
    {
        $applicant = $this->applicantController->getAll()->where('IdNumber', '!=', '');
        if ($request->ajax()) {
            $output = "";
            $products = ApplicantDetails::where('full_name', 'LIKE', '%' . $request->search . "%")
                ->orwhere('citizenship_number', 'LIKE', '%' . $request->search . "%")
                ->orWhere('IdNumber', 'LIKE', '%' . $request->search . "%")
                ->get();

            // return $products;
            if ($products) {
                foreach ($products as $key => $product) {
                    $output .= '<tr>' .
                        '<td>' . ++$key . '</td>' .
                        '<td>' . $product->full_name . '</td>' .
                        '<td>' . $product->disability_type . '</td>' .
                        '<td>' . $product->disability_cause . '</td>' .
                        '<td>' . $product->citizenship_number . '</td>' .
                        '<td>' . $product->dob_nep . '</td>' .
                        '<td>' . $product->IdNumber . '</td>' .
                        '<td><a href=' . url('show/' . $product->id) . '><span class="label label-success">Print</span></a> </td>' .
                        '</tr>';
                }
                return Response($output);
            }
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
        // dd($data);
        return view('admin.pages.view-applicant', compact('data', 'profile_logs'));
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
