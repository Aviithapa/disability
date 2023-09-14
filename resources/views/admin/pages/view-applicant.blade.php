@extends('layout.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       

        <!-- Main content -->
        <div class="content">
            <div class="row">
                <div class="col-lg-3">
        
                    <div class="user-profile-box m-b-3 bg-black">
                      
                       
                        <div class="verified-section">
                            
                        </div>
                        <div class="box-profile text-white">
                            <img class="profile-user-img img-responsive m-b-2"  onclick="onClick(this)" src="{{ $data->getProfileImage() }}" alt="User profile picture">
                    
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="info-box">
                        <div class="card tab-style1">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab table-responsive" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-expanded="true">Personal Information</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#review" role="tab" aria-expanded="true">Logs</a> </li>

                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home" role="tabpanel" aria-expanded="true">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                        <tr>
                                                            <td class="text-bold">Name</td>
                                                            <td>{{$data->full_name}} |  {{$data->full_name_nep}} </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold">Gender</td>
                                                            <td>{{$data->sex}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold">Age</td>
                                                            <td>{{$data->age}}</td>
                                                        </tr>
                                                    
                                                         <td class="text-bold">Phone number</td>
                                                            <td>{{$data->phone_number}}</td>
                                                        </tr>
                                                         <tr>
                                                            <td class="text-bold">Date of birth</td>
                                                            <td>{{$data->dob_eng}} <br/> {{$data->dob_nep}}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                        <tr>
                                                            <td class="text-bold"> अपाङ्गताको प्रकारः</td>
                                                            <td>{{$data->disability_type}}</td>
                                                        </tr>
                                                         <tr>
                                                            <td class="text-bold">अशक्तताको आधारमा अपाङ्गताको प्रकारः</td>
                                                            <td>{{$data->incapacitated_base_disability_type}}</td>
                                                        </tr>
                                         
                                                        <tr>
                                                            <td class="text-bold">अपाङ्गताको कारण</td>
                                                            <td>{{$data->disability_cause}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold">Guardian </td>
                                                            <td>{{$data->guardian}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold">Relation </td>
                                                            <td>{{$data->relation}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold">Guardian Number</td>
                                                            <td>{{$data->guardian_number}}</td>
                                                        </tr>
                                                       
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--second tab-->
                                <div class="tab-pane" id="review" role="tabpanel">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                   
                                                        <td>Status</td>
                                                        <td>Remarks</td>
                                                        <td>Date</td>
                                                        <td>Time</td>
                                                        <td>Created By</td>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($profile_logs as $profile_log)
                                                            <tr
                                                             @if($profile_log->status ==='rejected')
                                                                style='color: red;' 
                                                                @endif
                                                             >
                                                            
                                                                <td style="text-transform: capitalize;">{{$profile_log->status}}</td>
                                                                <td>{{$profile_log->remarks}}</td>
                                                                <td>{{$profile_log->created_at->toDateString()}}</td>
                                                              <td>{{ $profile_log->created_at->timezone('Asia/Kathmandu')->toTimeString() }}</td>
                                                                <td>{{$profile_log->getUserName()}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                


            <div class="row">
                <div class="col-lg-12">
                    <div class="info-box">
                        <div class="card tab-style1">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#education" role="tab">Detail Inforamtion</a> </li>
                            </ul>
                            <div class="tab-content" style="height: 500px; overflow: auto;">
                                <div class="tab-pane active" id="education" role="tabpanel" aria-expanded="true">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                    1. <span style="font-weight: 500"> शरीरको अङ्ग, संरचना, प्रणालीमा आएको क्षतिको विवरणः </span > <br/>
                                                    <span style="font-size: 14px;"> {!! $data->disability_description !!} </span> <br /> <hr>
                                                   
                                                    2. <span  style="font-weight: 500"> क्षति भएपछि दैनिक क्रियाकलापमा आएको अवरोध वा सिमितताको विवरणः </span > <br/>
                                                    <span style="font-size: 14px;"> {!! $data->daily_effected_description !!} </span> <br /> <hr>
                                                   
                                                    3. <span  style="font-weight: 500">आवश्यकता भएको भए कस्तो प्रकारको सहायक सामग्रीको प्रयोग गर्नुपर्ने हुन्छः </span > <br/>
                                                    <span style="font-size: 14px;">  {!! $data->material_used_description !!} </span> <br /> <hr>
                                                   
                                                  
                                                      4. <span  style="font-weight: 500"> अन्य व्यक्तिको सहयोग लिनुहुन्छ भने कुनकुन कामको लागि लिनुहुन्छ </span > <br/>
                                                    <span style="font-size: 14px;">  {!! $data->daily_work_without_other_help !!} </span> <br /> <hr>
                                                   

                                                      5. <span  style="font-weight: 500"> अन्य व्यक्तिको सहयोग लिनुहुन्छ भने कुनकुन कामको लागि लिनुहुन्छ </span > <br/>
                                                    <span style="font-size: 14px;"> {!! $data->daily_work_with_other_help !!} </span> <br /> <hr>
                                                   
                                                      6. <span  style="font-weight: 500"> कुनै तालिम प्राप्त गर्नुभएको भए मुख्य तालिमहरुको नाम लेख्नुहोस् </span > <br/>
                                                    <span style="font-size: 14px;"> {!! $data->trainning_name !!} </span> <br /> <hr>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               

                            </div>
                        </div>
                    </div>
                </div>
            </div>

           

            <div class="row">
                <div class="col-lg-12">
                    <div class="info-box">
                        <div class="card tab-style1">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab" aria-expanded="false">Documents</a> </li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="profile" role="tabpanel" aria-expanded="false">
                                    <div class="card-body">
                                        <div class="row">
                                        
                                            <div class="table-responsive">
                                                <header>Supportive Documents</header>
                                                <table class="table table-bordered">
                                                    <thead>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Citizenship</td>
                                                        <td>  <img src="{{ $data->getCitizenshipImage() }}" onclick="onClick(this)" alt="citizenship front image" width="200" height="200">
                                                        </td>
                                                       
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>Ward Recomendation</td>
                                                        <td>  <img src="{{ $data->getWardRecommendationImage() }}" onclick="onClick(this)" alt="Ward Recomendation"  width="200" height="200">
                                                        </td>
                                                    </tr>
                                                      <tr>
                                                        <th scope="row">3</th>
                                                        <td>Doctor Report</td>
                                                        <td>  <img src="{{ $data->getHealthExaminationImage() }}" onclick="onClick(this)" alt="Doctor Report"  width="200" height="200">
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <th scope="row">4</th>
                                                        <td>Full Size Image</td>
                                                        <td>  <img src="{{  $data->getFullSizeImage() }}" onclick="onClick(this)" alt="Full Size Image"  width="200" height="200">
                                                        </td>
                                                    </tr>
                                                            @if($data->status === 'approved')
<tr>
                                                        <th scope="row">4</th>
                                                        <td>Decision Image</td>
                                                        <td>  <img src="{{  $data->getDecisionPhoto() }}" onclick="onClick(this)" alt="Full Size Image"  width="200" height="200">
                                                        </td>
                                                    </tr>
                                                            @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(($data->status === 'rejected' || $data->status === 'new') && Auth::user()->role === 'admin' )
              <div class="row">
                        <div class="col-lg-12">
                            <div class="info-box">
                                <div class="card tab-style1">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs profile-tab" role="tablist">
                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>

                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="settings" role="tabpanel">
                                            <div class="card-body">
                                                <form class="form-horizontal form-material" action="{{ url('/update/status/' . $data->id) }}" method="POST">
                                                    @csrf

                                                    <input type="hidden" name="profile_id" value="{{$data->id}}">
                                                    <div class="form-group">
                                                        <label class="col-md-12">Remarks</label>
                                                        <div class="col-md-12">
                                                            <textarea rows="5" name="remarks" class="form-control form-control-line">{{ old('remarks') }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-12">Select Status</label>
                                                        <div class="col-sm-12">
                                                            <select class="form-control form-control-line" name="status" required>
                                                                <option value="rejected">Rejected</option>
                                                                <option value="admin_approved">Verified</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <button class="btn btn-success">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif


                      @if($data->status === 'admin_approved' && Auth::user()->role === 'admin')
              <div class="row">
                        <div class="col-lg-12">
                            <div class="info-box">
                                <div class="card tab-style1">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs profile-tab" role="tablist">
                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>

                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="settings" role="tabpanel">
                                            <div class="card-body">
                                                <form class="form-horizontal form-material" action="{{ url('/form/admin/' . $data->id) }}" method="POST">
                                                    @csrf

                                                    <input type="hidden" name="profile_id" value="{{$data->id}}">
                                                    <div class="col-lg-12">
                                                        <fieldset class="form-group">
                                                            <label> अपाङ्गताको प्रकारः</label>
                                                            <select name="disability_type" class="form-control" value="{{ old('disability_type') }}" id="basicInput" required>
                                                                <option>Select</option>
                                                                <option value="A">क</option>
                                                                <option value="B">ख</option>
                                                                <option value="C">ग</option>
                                                                <option value="D">घ</option>

                                                            </select>
                                                             @if($errors->any())
                                                    <div style="color:red !important">
                                                        {{ $errors->first('disability_type') }}
                                                    </div>
                                                 @endif
                                                        </fieldset>
                                            </div>
                                            <div class="col-lg-12">
                                                <fieldset class="form-group">
                                                    <label> अशक्तताको आधारमा अपाङ्गताको प्रकारः</label>
                                                    <select name="incapacitated_base_disability_type" value="{{ old('incapacitated_base_disability_type') }}" class="form-control" id="basicInput" required>
                                                        <option>Select</option>
                                                        <option value="A">क</option>
                                                        <option value="B">ख</option>
                                                        <option value="C">ग</option>
                                                        <option value="D">घ</option>
                                                    </select>
                                                     @if($errors->any())
                                                    <div style="color:red !important">
                                                        {{ $errors->first('incapacitated_base_disability_type') }}
                                                    </div>
                                                 @endif
                                                </fieldset>
                                            </div>
                                             <div class="row" style="display: flex; justify-content:space-between;">
                                           
                                            <div class="col-lg-6">
                                                <div class="grid-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="col-md-12 col-lg-12">
                                                                <label>Decision Photo *</label><br>
                                                                @if(isset($data))
                                                                    <img src="{{url(isset($data)?$data->getDecisionPhoto():imageNotFound())}}" height="150" width="150"
                                                                         id="decision_img">
                            
                                                                @else
                                                                    <img src="{{isset($data)?$data-> getDecisionPhoto():imageNotFound()}}" height="150" width="150"
                                                                         id="decision_img">
                                                                @endif
                                                            </div>
                            
                                                            <div class="form-group col-md-12 col-lg-12">
                                                                <small>Below 1 mb</small><br>
                                                                <small id="decision_help_text" class="help-block"></small>
                                                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                                                                     aria-valuemax="100"
                                                                     aria-valuenow="0">
                                                                    <div id="decision_progress" class="progress-bar progress-bar-success"
                                                                         style="width: 0%">
                                                                    </div>
                                                                </div><br>
                                                                <input type="file" id="decision_image" name="decision_image"
                                                                       onclick="anyFileUploader('decision')">
                                                                <input type="hidden" id="decision_path" name="decision_image" class="form-control"
                                                                       value="{{isset($data)?$data->decision_image:''}}"/>
                                                                {!! $errors->first('image', '<div class="text-danger">:message</div>') !!}
                                                                @if($errors->any())
                                                    <div style="color:red !important">
                                                        {{ $errors->first('decision_image') }}
                                                    </div>
                                                 @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                               <div class="col-lg-6">
                                              </div>
                                         </div>
                                            
                                                   
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <button class="btn btn-success">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
             </div>
            </div>

           

            {{-- @if(\Illuminate\Support\Facades\Auth::user()->email == 'pujalamichhane24@gmail.com' || \Illuminate\Support\Facades\Auth::user()->email == 'mksshrestha@gmail.com')

                @else
            @if($profile_processing)
                @if($profile_processing->current_state === "computer_operator")
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="info-box">
                                <div class="card tab-style1">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs profile-tab" role="tablist">
                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>

                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="settings" role="tabpanel">
                                            <div class="card-body">
                                                <form class="form-horizontal form-material" action="{{route("operator.applicant.profile.list.status")}}" method="POST">
                                                    @csrf

                                                    <input type="hidden" name="profile_id" value="{{$data->id}}">
                                                    <div class="form-group">
                                                        <label class="col-md-12">Remarks</label>
                                                        <div class="col-md-12">
                                                            <textarea rows="5" name="remarks" class="form-control form-control-line"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-12">Select Status</label>
                                                        <div class="col-sm-12">
                                                            <select class="form-control form-control-line" name="profile_status" required>
                                                                <option value="Rejected">Rejected</option>
                                                                <option value="Reviewing">Verified</option>
                                                                <option value="Reviewing">Reviewing</option>
                                                                <option value="Pending">Pending</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <button class="btn btn-success">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
              @endif
            @else
                <div class="row">
                    <div class="col-lg-12">
                        <div class="info-box">
                            <div class="card tab-style1">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs profile-tab" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>

                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="settings" role="tabpanel">
                                        <div class="card-body">
                                            <form class="form-horizontal form-material" action="{{route("operator.applicant.profile.list.status")}}" method="POST">
                                                @csrf

                                                <input type="hidden" name="profile_id" value="{{$data->id}}">
                                                <div class="form-group">
                                                    <label class="col-md-12">Remarks</label>
                                                    <div class="col-md-12">
                                                        <textarea rows="5" name="remarks" class="form-control form-control-line"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-12">Select Status</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control form-control-line" name="profile_status" required>
                                                            <option >{{$data->profile_status}}</option>
                                                            <option value="Reviewing">Reviewing</option>
                                                            <option value="Reviewing">Verified</option>
                                                            <option value="Rejected">Rejected</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <button class="btn btn-success">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                @endif --}}

            


            {{-- @endif --}}

            <!-- Main row -->

          



           
        </div>
        <!-- /.content -->
        <!-- /.content -->
        <style>
            .modal-body {
                max-height: 80vh;
                overflow-y: auto;
                max-width: 100vh;
            }
        </style>
        <div class="modal" id="modal01">
            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" onclick="$('#modal01').css('display','none')" class="close"  aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img id="img01" style="max-width:100%">
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Modal -->
        {{-- <div class="modal fade" id="practice_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Reject Applicant Licence Applied ? </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal form-material" action="{{route("operator.reject.exam.apply")}}" method="POST">
                            @csrf
                            <input type="hidden" class="form-control" name="id" id="idkl" value="">
                            <div class="form-group">
                                <label class="col-md-12">Remarks</label>
                                <div class="col-md-12">
                                    <textarea rows="5" name="remarks" class="form-control form-control-line" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div> --}}


    <!-- Modal -->
    {{-- <div class="modal fade" id="practice_reject_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reject Applicant Licence Applied ? </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-material" action="{{route("operator.re-exam.exam.apply")}}" method="POST">
                        @csrf
                        <input type="hidden" class="form-control" name="id" id="idkl123" value="">
                        <div class="form-group">
                            <label class="col-md-12">Remarks</label>
                            <div class="col-md-12">
                                <textarea rows="5" name="remarks" class="form-control form-control-line" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div> --}}
    </div>









@endsection
@push('scripts')
@include('parties.common.file-upload')
    
    <script>

     
    </script>
@endpush




