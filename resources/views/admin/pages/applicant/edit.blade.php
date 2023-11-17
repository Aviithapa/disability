@extends('admin.layout.app')

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
        <h1></h1>
        <ol class="breadcrumb">
            <li><a href="#"></a></li>
            <li><i class="fa fa-angle-right"></i></li>
        </ol>
    </div>

           <!-- Main content -->
           <div class="content">

               <div class="row">
                   <div class="col-lg-12 m-b-3">
                       <div class="box box-info">
                           <div class="box-header with-border p-t-1" style="text-align: center">
                            <h4 class="text-black">अनुसूची-१ </br>  अपाङ्गता भएका व्यक्तिको परिचय-पत्र पाउनको लागि दिने निवेदन
                               </h4>
                               <div class="pull-right">
                               </div>
                           </div>
                           <!-- /.box-header -->
                           <div class="box-body">
                            <div class="card">

                                <div class="card-body">
                        
                                   
                                    <form method="POST" action="{{ url('form') }}" style="padding:20px;">
                                        @csrf
                    
                                         <div class="row" style="display: flex; justify-content:space-between;">
                                              <div class="col-lg-6">
                                              </div>
                                            <div class="col-lg-3">
                                                <div class="grid-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="col-md-12 col-lg-12">
                                                                <label>Profile Photo *</label><br>
                                                                @if(isset($data))
                                                                    <img src="{{url(isset($data)?$data->getProfileImage():imageNotFound())}}" height="150" width="150"
                                                                         id="transcript_tslc_img">
                            
                                                                @else
                                                                    <img src="{{isset($data)?$data->getProfileImage():imageNotFound('user')}}" height="150" width="150"
                                                                         id="transcript_tslc_img">
                                                                @endif
                                                            </div>
                            
                                                            <div class="form-group col-md-12 col-lg-12">
                                                                <small>Below 1 mb</small><br>
                                                                <small id="transcript_tslc_help_text" class="help-block"></small>
                                                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                                                                     aria-valuemax="100"
                                                                     aria-valuenow="0">
                                                                    <div id="transcript_tslc_progress" class="progress-bar progress-bar-success"
                                                                         style="width: 0%">
                                                                    </div>
                                                                </div><br>
                                                                <input type="file" id="transcript_tslc_image" name="transcript_tslc_image"
                                                                       onclick="anyFileUploader('transcript_tslc')">
                                                                <input type="hidden" id="transcript_tslc_path" name="transcript_tslc" class="form-control"
                                                                       value="{{isset($data)?$data->transcript_image:''}}"/>
                                                                {!! $errors->first('image', '<div class="text-danger">:message</div>') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                         </div>
                                            
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label>नाम थर</label>
                                                    <input name="full_name_nep" class="form-control" id="basicInput" value="{{ $data->full_name_nep }}" type="text">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label>Full Name English</label>
                                                    <input name="full_name" class="form-control" id="basicInput" value="{{ $data->full_name }}" type="text">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label>लिङ्ग</label>
                                                    <select class="form-control" name="sex" value="{{ $data->sex }}"required>
                                                        <option value="">Select Gender</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label>Citizenship Number</label>
                                                    <input name="citizenship_number" class="form-control" value="{{ $data->citizenship_number }}" id="basicInput">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label>Blood Group</label>
                                                    <input name="blood_group" class="form-control" id="basicInput" value="{{ $data->blood_group }}">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label>जन्म मिति</label>
                                                    <input name="dob_nep" class="form-control" id="basicInput" type="text" value="{{ $data->dob_nep }}">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label>Date of birth English </label>
                                                    <input name="dob_eng" class="form-control" id="basicInput" type="text" value="{{ $data->dob_eng }}">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label>Age</label>
                                                    <input name="age" class="form-control" id="basicInput" value="{{ $data->age }}">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label>प्रदेशः</label>
                                                    <input name="pardesh" class="form-control" id="basicInput" value="{{ $data->pardesh }}">
                                                </fieldset>
                                            </div>
                                             <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label>Ward No.</label>
                                                    <input name="ward_no" class="form-control" id="basicInput" value="{{ $data->ward_no }}">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label>Permanent Address</label>
                                                    <input name="permanant_address" class="form-control" id="basicInput" value="{{ $data->permanant_address }}">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label>Temporary Address</label>
                                                    <input name="temporary_address" class="form-control" id="basicInput" value="{{ $data->temporary_address }}">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label>Phone Number</label>
                                                    <input name="phone_number" class="form-control" id="basicInput" value="{{ $data->phone_number }}">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label>संरक्षक/अभिभावकको नाम थर</label>
                                                    <input name="guardian" class="form-control" id="basicInput" value="{{ $data->guardian }}">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label>निवेदकको नाता</label>
                                                    <input name="relation" class="form-control" id="basicInput" value="{{ $data->relation }}">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label>संरक्षक/अभिभावकको सम्पर्क टेलिफोन वा मोबाईल नं.</label>
                                                    <input name="guardian_number" class="form-control" id="basicInput" value="{{ $data->guardian_number }}">
                                                </fieldset>
                                            </div>
                                            {{-- <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label>नेपाल सरकारको परिभाषा र वर्गिकरण अनुसार अपाङ्गताको प्रकारः</label>
                                                    <input name="disability_type" class="form-control" id="basicInput" value="{{ $data->disability_type }}">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label>नेपाल सरकारको परिभाषा र वर्गिकरण अनुसार अशक्तताको आधारमा अपाङ्गताको प्रकारः</label>
                                                    <input name="incapacitated_base_disability_type" class="form-control" id="basicInput" value="{{ $data->incapacitated_base_disability_type }}">
                                                </fieldset>
                                            </div> --}}
                                            <div class="col-lg-12">
                                                <fieldset class="form-group">
                                                    <label>शरीरको अङ्ग, संरचना, प्रणालीमा आएको क्षतिको विवरणः</label>
                                                    <textarea name="disability_description" class="form-control ckeditor" type="textarea" id="basicInput" rows="5" cols="50"> {{ $data->disability_description }}</textarea>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12">
                                                <fieldset class="form-group">
                                                    <label>क्षति भएपछि दैनिक क्रियाकलापमा आएको अवरोध वा सिमितताको विवरणः</label>
                                                    <textarea name="daily_effected_description" class="form-control ckeditor" id="basicInput" rows="5">{{ $data->daily_effected_description }}</textarea>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12">
                                                <fieldset class="form-group">
                                                    <label>अपाङ्गताको कारण उपयुक्त स्थानमा चिनो लगाउनुहोस्।</label>
                                                    <input name="disability_cause" class="form-control" id="basicInput" value="{{ $data->disability_cause }}">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12">
                                                <fieldset class="form-group">
                                                    <label>सहायक सामग्री प्रयोग गर्नुपर्ने आवश्यकता भएको/नभएकोः (उपयुक्त स्थानमा चिनो लगाउनुहोस्)</label>
                                                    <select class="form-control" name="material_used"  value="{{ $data->material_used }}" required>
                                                        <option value="">Select Material Used</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12">
                                                <fieldset class="form-group">
                                                    <label>आवश्यकता भएको भए कस्तो प्रकारको सहायक सामग्रीको प्रयोग गर्नुपर्ने हुन्छः</label>
                                                    <textarea name="material_used_description" class="form-control ckeditor" id="basicInput" rows="3">{{ $data->material_used_description}}</textarea>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12">
                                                <fieldset class="form-group">
                                                    <label>सहायक सामग्रीको प्रयोग गर्ने गरेको/नगरेकोः (उपयुक्त स्थानमा चिनो लगाउनुहोस्)</label>
                                                    <select class="form-control" name="already_material_used" id='material_used' onchange="materialUsed()" required value="{{ $data->already_material_used }}">
                                                        <option value="">Select Already Material Used</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6" id="material_used_yes">
                                                <fieldset class="form-group">
                                                    <label>सहायक सामग्रीको प्रयोग गर्ने गरेको भए सामग्रीको नामः</label>
                                                    <input name="material_used_name" class="form-control" id="basicInput" value="{{ $data->material_used_name }}">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12">
                                                <fieldset class="form-group">
                                                    <label>अन्य व्यक्तिको सहयोग विना आफ्ना कस्ता कस्ता दैनिक कार्य गर्न सक्नु हुन्छ</label>
                                                    <textarea name="daily_work_without_other_help" class="form-control ckeditor" id="basicInput"  rows="3">{{ $data->daily_work_without_other_help}}</textarea>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12">
                                                <fieldset class="form-group">
                                                    <label>अन्य व्यक्तिको सहयोग लिनुहुन्छ भने कुनकुन कामको लागि लिनुहुन्छ </label>
                                                    <textarea name="daily_work_with_other_help" class="form-control ckeditor" id="basicInput"  rows="3">{{ $data->daily_work_with_other_help }}</textarea>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12">
                                                <fieldset class="form-group">
                                                    <label>शैक्षिक योग्यता</label>
                                                    <select class="form-control" name="education_level" value="{{ $data->education_level }}" required>
                                                        <option value="">Select Education Level</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12">
                                                <fieldset class="form-group">
                                                    <label>कुनै तालिम प्राप्त गर्नुभएको भए मुख्य तालिमहरुको नाम लेख्नुहोस्</label>
                                                    <input name="trainning_name" class="form-control" id="basicInput" value="{{ $data->tranining_name }}">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12">
                                                <fieldset class="form-group">
                                                    <label>हालको पेशा</label>
                                                    <input name="current_work" class="form-control" id="basicInput" value="{{ $data->current_work}}">
                                                </fieldset>
                                            </div>
                                        </div>

                                           <div class="row" style="display: flex; justify-content:space-between;">
                                              
                                            <div class="col-lg-3">
                                                <div class="grid-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="col-md-12 col-lg-12">
                                                                <label>Ward Photo *</label><br>
                                                                @if(isset($data))
                                                                    <img src="{{url(isset($data)?$data->getWardRecommendationImage():imageNotFound())}}" height="150" width="150"
                                                                         id="ward_img">
                            
                                                                @else
                                                                    <img src="{{isset($data)?$data->getWardRecommendationImage():imageNotFound('user')}}" height="150" width="150"
                                                                         id="ward_img">
                                                                @endif
                                                            </div>
                            
                                                            <div class="form-group col-md-12 col-lg-12">
                                                                <small>Below 1 mb</small><br>
                                                                <small id="ward_help_text" class="help-block"></small>
                                                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                                                                     aria-valuemax="100"
                                                                     aria-valuenow="0">
                                                                    <div id="ward_progress" class="progress-bar progress-bar-success"
                                                                         style="width: 0%">
                                                                    </div>
                                                                </div><br>
                                                                <input type="file" id="ward_image" name="ward_image"
                                                                       onclick="anyFileUploader('ward')">
                                                                <input type="hidden" id="ward_path" name="ward_recommendation_image" class="form-control"
                                                                       value="{{isset($data)?$data->ward_recommendation_image:''}}"/>
                                                                {!! $errors->first('image', '<div class="text-danger">:message</div>') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                              <div class="col-lg-3">
                                                <div class="grid-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="col-md-12 col-lg-12">
                                                                <label>Doctor Report *</label><br>
                                                                @if(isset($data))
                                                                    <img src="{{url(isset($data)?$data->getHealthExaminationImage():imageNotFound())}}" height="150" width="150"
                                                                         id="health_img">
                            
                                                                @else
                                                                    <img src="{{isset($data)?$data->getHealthExaminationImage():imageNotFound('user')}}" height="150" width="150"
                                                                         id="health_img">
                                                                @endif
                                                            </div>
                            
                                                            <div class="form-group col-md-12 col-lg-12">
                                                                <small>Below 1 mb</small><br>
                                                                <small id="health_help_text" class="help-block"></small>
                                                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                                                                     aria-valuemax="100"
                                                                     aria-valuenow="0">
                                                                    <div id="health_progress" class="progress-bar progress-bar-success"
                                                                         style="width: 0%">
                                                                    </div>
                                                                </div><br>
                                                                <input type="file" id="health_image" name="health_image"
                                                                       onclick="anyFileUploader('health')">
                                                                <input type="hidden" id="health_path" name="health_examination_report" class="form-control"
                                                                       value="{{isset($data)?$data->health_examination_report:''}}"/>
                                                                {!! $errors->first('image', '<div class="text-danger">:message</div>') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                              <div class="col-lg-3">
                                                <div class="grid-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="col-md-12 col-lg-12">
                                                                <label>Citizenship Photo *</label><br>
                                                                @if(isset($data))
                                                                    <img src="{{url(isset($data)?$data->getCitizenshipImage():imageNotFound())}}" height="150" width="150"
                                                                         id="citizenship_img">
                            
                                                                @else
                                                                    <img src="{{isset($data)?$data->getCitizenshipImage():imageNotFound('user')}}" height="150" width="150"
                                                                         id="citizenship_img">
                                                                @endif
                                                            </div>
                            
                                                            <div class="form-group col-md-12 col-lg-12">
                                                                <small>Below 1 mb</small><br>
                                                                <small id="citizenship_help_text" class="help-block"></small>
                                                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                                                                     aria-valuemax="100"
                                                                     aria-valuenow="0">
                                                                    <div id="citizenship_progress" class="progress-bar progress-bar-success"
                                                                         style="width: 0%">
                                                                    </div>
                                                                </div><br>
                                                                <input type="file" id="citizenship_image" name="citizenship_image"
                                                                       onclick="anyFileUploader('citizenship')">
                                                                <input type="hidden" id="citizenship_path" name="citizenship_image" class="form-control"
                                                                       value="{{isset($data)?$data->citizenship_image:''}}"/>
                                                                {!! $errors->first('image', '<div class="text-danger">:message</div>') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                             <div class="col-lg-3">
                                                <div class="grid-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="col-md-12 col-lg-12">
                                                                <label>Full Size Photo *</label><br>
                                                                @if(isset($data))
                                                                    <img src="{{url(isset($data)?$data->getFullSizeImage():imageNotFound())}}" height="150" width="150"
                                                                         id="full_size_img">
                            
                                                                @else
                                                                    <img src="{{isset($data)?$data->getFullSizeImage():imageNotFound('user')}}" height="150" width="150"
                                                                         id="full_size_img">
                                                                @endif
                                                            </div>
                            
                                                            <div class="form-group col-md-12 col-lg-12">
                                                                <small>Below 1 mb</small><br>
                                                                <small id="full_size_help_text" class="help-block"></small>
                                                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                                                                     aria-valuemax="100"
                                                                     aria-valuenow="0">
                                                                    <div id="full_size_progress" class="progress-bar progress-bar-success"
                                                                         style="width: 0%">
                                                                    </div>
                                                                </div><br>
                                                                <input type="file" id="full_size_image" name="full_size_image"
                                                                       onclick="anyFileUploader('full_size')">
                                                                <input type="hidden" id="full_size_path" name="full_size_photo" class="form-control"
                                                                       value="{{isset($data)?$data->full_size_photo:''}}"/>
                                                                {!! $errors->first('image', '<div class="text-danger">:message</div>') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                         </div>
                                       
                        
                                        <button type="submit" class="btn btn-primary float-right mt-2"><i class="fa fa-check"></i>
                                            Save</button>
                        
                                    </form>
                        
                                </div>
                        
                            </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>

</div>
<!-- /.content -->
</div>

@endsection
@push('scripts')
@include('parties.common.file-upload')
    <script>
         function materialUsed(){
            const sb = document.querySelector('#material_used');
            console.log(sb.value === "Yes");
            if(sb.value === "Yes"){
                $("#material_used_yes").show();

            }else{
                $("#material_used_yes").hide();

            }
        }
    </script>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>

@endpush
