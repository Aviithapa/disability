<?php


namespace  App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController as AdminBaseController;
use App\Models\ApplicantDetails;
use App\Modules\Backend\ApplicantInformation\Repositories\ApplicantRepository as RepositoriesApplicantRepository;
use App\Modules\Framework\Request;
use Carbon\Carbon;
use Carbon\Exceptions\Exception as ExceptionsException;
use Exception;
use PDF;
class AdminController extends AdminBaseController
{
    private $applicantController;
    public function __construct(RepositoriesApplicantRepository $applicantController)
    {
      $this->applicantController = $applicantController;
    }

    public function dashboard(){
        $unverifiedCount = $this->applicantController->getAll()->where('IdNumber','=','');
        $verifiedCount = $this->applicantController->getAll()->where('IdNumber','!=','');

        return view('welcome', compact('unverifiedCount', 'verifiedCount'));

    }
    public function index(Request $request){
        $applicant = $this->applicantController->getAll()->where('IdNumber','=','');
        if($request->ajax()) {
            $output = "";
            $products = ApplicantDetails::where('full_name', 'LIKE', '%' . $request->search . "%")
                ->orwhere('citizenship_number', 'LIKE', '%' . $request->search . "%")
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
                        '<td><a href='.url('show/'.$product->id).'><span class="label label-success">View</span></a> </td>' .
                        '</tr>';
                }
                return Response($output);
            }
        }
        return view('admin.pages.index',compact('applicant'));
    }

    public function printIndex(Request $request){
        $applicant = $this->applicantController->getAll()->where('IdNumber','!=','');
        if($request->ajax()) {
            $output = "";
            $products = ApplicantDetails::where('full_name', 'LIKE', '%' . $request->search . "%")
                ->orwhere('citizenship_number', 'LIKE', '%' . $request->search . "%")
                ->orWhere('IdNumber','LIKE', '%' . $request->search . "%")
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
                        '<td><a href='.url('show/'.$product->id).'><span class="label label-success">Print</span></a> </td>' .
                        '</tr>';
                }
                return Response($output);
            }
        }
        return view('admin.pages.printIndex',compact('applicant'));
    }

    public function save(Request $request){
      $data = $request->all();
      $data['photo'] = $data['transcript_tslc'];
      try {
        $applicant = $this->applicantController->create($data);
        if($applicant == false) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
        session()->flash('success', 'Data has been created successfully');
        return redirect()->route('applicantData');
    }
    catch (\Exception $e) {
        session()->flash('danger', 'Oops! Something went wrong.');
        return redirect()->back()->withInput();
    }
  }

    public function show($id){
        $applicant = $this->applicantController->findById($id);
        return view('admin.pages.show',compact('applicant'));
    }

    public function generateCardNumber($id){
        $applicant =  $this->applicantController->findById($id);
        $data['IdNumber'] = $this->generateNumber($id, $applicant->disability_type);
        try {
            $applicant = $this->applicantController->update($data, $id);
            if($applicant == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Id card number has been generated successfully');
            return redirect()->route('applicantData');
        }
        catch (\Exception $e) {
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
