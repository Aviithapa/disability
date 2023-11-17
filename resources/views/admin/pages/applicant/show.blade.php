
    @extends('admin.layout.app')

@section('content')
    
@push('styles')
<link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
 <!-- Theme Config Js -->
 <script src="{{asset('assets/js/config.js')}}"></script>

    <!-- App css -->
<link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
<link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

@endpush
    <div class="content-wrapper">

    

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="profile-bg-picture"
                                style="background-image:url({{ asset('assets/images/disability.jpeg') }})">
                                <span class="picture-bg-overlay"></span>
                                <!-- overlay -->
                            </div>
                            <!-- meta -->
                            <div class="profile-user-box">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="profile-user-img" style="margin:0px;border:none; cursor: pointer;"><img src="{{$data->getProfileImage()}}" alt=""
                                                class="avatar-lg rounded-circle" onclick="onClick(this)"></div>
                                        <div class="">
                                            <h4 class="mt-4 fs-17 ellipsis">{{ $data->full_name }} | {{ $data->full_name_nep }} </h4>
                                            <p class="font-13">{{ $data->dob_nep }} | {{ $data->dob_eng }} | {{ $data->age }} </p>
                                            <p class="text-muted mb-0"><small>{{ $data->citizenship_number }}  | {{ $data->phone_number }} | {{ $data->blood_group }}</small></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="d-flex justify-content-end align-items-center gap-2">
                                        
                                                <a href="{{ url('applicant/'.$data->id .'/edit') }}" title="edit" class="btn btn-soft-danger" >
                                                   <i class="ri-settings-2-line align-text-bottom me-1 fs-16 lh-1"></i>  Edit Profile
                                                </a>
                                            {{-- </button> --}}
                                            @if(Auth::user()->role === 'admin' && $data->status === 'approved' )
                                            <a class="btn btn-soft-info" href="{{ url('dashboard/show/'.$data->id) }}" target="blank" title="Print"><i class="fa fa-print"></i> Print</a>
                                            @endif
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ meta -->
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card p-0">
                                <div class="card-body p-0">
                                    <div class="profile-content">
                                        <ul class="nav nav-underline nav-justified gap-0">
                                            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                                    data-bs-target="#aboutme" type="button" role="tab"
                                                    aria-controls="home" aria-selected="true" href="#aboutme">About</a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                                    data-bs-target="#user-activities" type="button" role="tab"
                                                    aria-controls="home" aria-selected="true"
                                                    href="#user-activities">Activities</a></li>
                                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                                    data-bs-target="#edit-profile" type="button" role="tab"
                                                    aria-controls="home" aria-selected="true"
                                                    href="#edit-profile">Settings</a></li>
                                            {{-- <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                                    data-bs-target="#projects" type="button" role="tab"
                                                    aria-controls="home" aria-selected="true"
                                                    href="#projects">Projects</a></li> --}}
                                        </ul>

                                        <div class="tab-content m-0 p-4">
                                            <div class="tab-pane active" id="aboutme" role="tabpanel"
                                                aria-labelledby="home-tab" tabindex="0">
                                                <div class="profile-desk">
                                                    <h5 class="fs-17 text-dark"> शरीरको अङ्ग, संरचना, प्रणालीमा आएको क्षतिको विवरणः</h5>
                                                    <p class="text-muted fs-16">
                                                       {!! $data->disability_description !!}
                                                    </p>

                                                    <h5 class="mt-4 fs-17 text-dark">Contact Information</h5>
                                                    <table class="table table-condensed mb-0 border-top">
                                                        <tbody>
                                                             <tr>
                                                                <th scope="row">Ward No</th>
                                                                <td>
                                                                    <a href="#" class="ng-binding">
                                                                      {{ $data->ward_no }} | {{ $data->pardesh }}
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                             <tr>
                                                                <th scope="row">Permanant Address | Temporary Address</th>
                                                                <td>
                                                                    <a href="#" class="ng-binding">
                                                                      {{ $data->permanant_address }} | {{ $data->temporary_address }}
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Guardian | Guardian Relation | Contact Number</th>
                                                                <td>
                                                                    <a href="" class="ng-binding">
                                                                        {{ $data->guardian }} | {{ $data->guardian_relation }} | {{ $data->guardian_number }}
                                                                    </a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">Education Level | Trainning Name | Current Work </th>
                                                                <td class="ng-binding">{{ $data->education_level }} | {{ $data->trainning_name }} | {{ $data->current_work }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Skype</th>
                                                                <td>
                                                                    <a href="#" class="ng-binding">
                                                                        jonathandeo123
                                                                    </a>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>

                                                    <h5 class="mt-4 fs-17 text-dark">क्षति भएपछि दैनिक क्रियाकलापमा आएको अवरोध वा सिमितताको विवरणः</h5>
                                                    <p class="text-muted fs-16">
                                                        {!! $data->daily_effected_description !!} 
                                                    </p>
                                                    @if($data->material_used)
                                                        <h5 class="mt-4 fs-17 text-dark">आवश्यकता भएको भए कस्तो प्रकारको सहायक सामग्रीको प्रयोग गर्नुपर्ने हुन्छः</h5>
                                                        <p class="text-muted fs-16">
                                                            {!! $data->material_used_description !!}
                                                        </p>
                                                    @endif
                                                    <h5 class="mt-4 fs-17 text-dark">अन्य व्यक्तिको सहयोग लिनुहुन्छ भने कुनकुन कामको लागि लिनुहुन्छ </h5>
                                                    <p class="text-muted fs-16">
                                                        {!! $data->daily_work_without_other_help !!}
                                                    </p>
                                                    
                                                    <h5 class="mt-4 fs-17 text-dark">अन्य व्यक्तिको सहयोग लिनुहुन्छ भने कुनकुन कामको लागि लिनुहुन्छ</h5>
                                                    <p class="text-muted fs-16">
                                                        {!! $data->daily_work_with_other_help !!}
                                                    </p>
                                                    
                                                    <h5 class="mt-4 fs-17 text-dark">Images</h5>

                                                    <div class="mt-4 flex justify-between" style="    justify-content: space-between; display: flex;">
                                                        <td > 
                                                             <img style="cursor: pointer;" src="{{ $data->getCitizenshipImage() }}" onclick="onClick(this)" alt="citizenship front image" width="200" height="200">
                                                       
                                                        </td>
                                                        <td > 
                                                             <img style="cursor: pointer;" src="{{  $data->getFullSizeImage() }}" onclick="onClick(this)" alt="Full Size Image"  width="200" height="200">
                                                        </td>
                                                        <td> 
                                                             <img style="cursor: pointer;" src="{{ $data->getHealthExaminationImage() }}" onclick="onClick(this)" alt="Doctor Report"  width="200" height="200">
                                                        </td>
                                                         <td>  
                                                            <img style="cursor: pointer;" src="{{ $data->getWardRecommendationImage() }}" onclick="onClick(this)" alt="Ward Recomendation"  width="200" height="200">
                                                        </td>
                                                    </div>
                                                         
                                                </div> <!-- end profile-desk -->
                                            </div> <!-- about-me -->

                                            <!-- Activities -->
                                            <div id="user-activities" class="tab-pane">
                                                <div class="timeline-2">
                                                    

                                                       @foreach($profile_logs as $profile_log)

                                                        <div class="time-item">
                                                        <div class="item-info ms-3 mb-3">
                                                            <div class="text-muted">{{ $profile_log->created_at->timezone('Asia/Kathmandu')->toTimeString() }}</div>
                                                            <p><a href="" class="text-info">{{$profile_log->getUserName()}}</a> commented your
                                                                post.
                                                            </p>
                                                            <p><em>{{$profile_log->remarks}}</em>
                                                            </p>
                                                        </div>
                                                    </div>
                                                            {{-- <tr
                                                             @if($profile_log->status ==='rejected')
                                                                style='color: red;' 
                                                                @endif
                                                             >
                                                            
                                                                <td style="text-transform: capitalize;">{{$profile_log->status}}</td>
                                                                <td></td>
                                                                <td>{{$profile_log->created_at->toDateString()}}</td>
                                                              <td></td>
                                                                <td>{{$profile_log->getUserName()}}</td>
                                                            </tr> --}}
                                                        @endforeach
                                                        </div>
                                            </div>

                                            <!-- settings -->
                                            <div id="edit-profile" class="tab-pane">
                                                <div class="user-profile-content">
                                                     <form class="form-horizontal form-material" action="{{ url('/admin/approve/' . $data->id) }}" method="POST">
                                                    @csrf

                                                    <input type="hidden" name="profile_id" value="{{$data->id}}">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <fieldset class="form-group">
                                                                <label> अपाङ्गताको प्रकारः</label>
                                                                <select name="disability_type_id" class="form-control" value="{{ old('disability_type_id') }}" id="basicInput" required>
                                                                    <option>Select</option>
                                                                    @foreach($disability_group as $type)
                                                                         <option value="{{ $type->id }}">{{ $type->name_nepali }}</option>
                                                                    @endforeach
                                                                </select>
                                                                 @if($errors->any())
                                                                <div style="color:red !important">
                                                                    {{ $errors->first('disability_type') }}
                                                                </div>
                                                                @endif
                                                            </fieldset>
                                                       </div>
                                                        <div class="col-lg-6">
                                                            <fieldset class="form-group">
                                                                <label> अशक्तताको आधारमा अपाङ्गताको प्रकारः</label>
                                                                <select name="incapacitated_base_disability_type_id" value="{{ old('incapacitated_base_disability_type_id') }}" class="form-control" id="basicInput" required>
                                                                    <option>Select</option>
                                                                       @foreach($disability_type as $type)
                                                                         <option value="{{ $type->id }}">{{ $type->name_nepali }}</option>
                                                                    @endforeach
                                                                 
                                                                </select>
                                                                @if($errors->any())
                                                                <div style="color:red !important">
                                                                    {{ $errors->first('incapacitated_base_disability_type') }}
                                                                </div>
                                                            @endif
                                                            </fieldset>
                                                        </div>
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
                    </div>
                    <!-- end page title -->

                </div>
                <!-- end row -->

            </div>
            <!-- container -->

        </div>
        <!-- content -->

    

    </div>
      <style>
            .modal-body {
                max-height: 100vh;
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

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

    </div>
 
@endsection

@push('scripts')
@include('parties.common.file-upload')
    
    <script>
   function onClick(element) {
            document.getElementById("img01").src = element.src;
            document.getElementById("modal01").style.display = "block";
    }
     
    </script>
@endpush