@extends('layout.app')

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
                        
                                   
                                    <form method="POST" action="{{ url('form') }}">
                                        @csrf
                    
                                        
                                            
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label>नाम थर</label>
                                                    <input name="full_name_nep" class="form-control" id="basicInput" type="text">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label>Full Name English</label>
                                                    <input name="full_name" class="form-control" id="basicInput" type="text">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label>लिङ्ग</label>
                                                    <select class="form-control" name="sex" required>
                                                        <option>Select</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label>Citizenship Number</label>
                                                    <input name="citizenship_number" class="form-control" id="basicInput">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label>Blood Group</label>
                                                    <input name="blood_group" class="form-control" id="basicInput">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label>जन्म मिति</label>
                                                    <input name="dob_nep" class="form-control" id="basicInput" type="text">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label>Date of birth English </label>
                                                    <input name="dob_eng" class="form-control" id="basicInput" type="text">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label>Age</label>
                                                    <input name="age" class="form-control" id="basicInput">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label>प्रदेशः</label>
                                                    <input name="pardesh" class="form-control" id="basicInput">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label>Ward No.</label>
                                                    <input name="permanant_address" class="form-control" id="basicInput">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label>Temporary Address</label>
                                                    <input name="temporary_address" class="form-control" id="basicInput">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label>Phone Number</label>
                                                    <input name="phone_number" class="form-control" id="basicInput">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label>संरक्षक/अभिभावकको नाम थर</label>
                                                    <input name="guardian" class="form-control" id="basicInput">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label>निवेदकको नाता</label>
                                                    <input name="relation" class="form-control" id="basicInput">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label>संरक्षक/अभिभावकको सम्पर्क टेलिफोन वा मोबाईल नं.</label>
                                                    <input name="guardian_number" class="form-control" id="basicInput">
                                                </fieldset>
                                            </div>
                                            {{-- <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label>नेपाल सरकारको परिभाषा र वर्गिकरण अनुसार अपाङ्गताको प्रकारः</label>
                                                    <input name="disability_type" class="form-control" id="basicInput">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label>नेपाल सरकारको परिभाषा र वर्गिकरण अनुसार अशक्तताको आधारमा अपाङ्गताको प्रकारः</label>
                                                    <input name="incapacitated_base_disability_type" class="form-control" id="basicInput">
                                                </fieldset>
                                            </div> --}}
                                            <div class="col-lg-12">
                                                <fieldset class="form-group">
                                                    <label>शरीरको अङ्ग, संरचना, प्रणालीमा आएको क्षतिको विवरणः</label>
                                                    <textarea name="disability_description" class="form-control ckeditor" type="textarea" id="basicInput" rows="5" cols="50"></textarea>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12">
                                                <fieldset class="form-group">
                                                    <label>क्षति भएपछि दैनिक क्रियाकलापमा आएको अवरोध वा सिमितताको विवरणः</label>
                                                    <textarea name="daily_effected_description" class="form-control" id="basicInput" rows="5"></textarea>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label>अपाङ्गताको कारण उपयुक्त स्थानमा चिनो लगाउनुहोस्।</label>
                                                    <input name="disability_cause" class="form-control" id="basicInput">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label>सहायक सामग्री प्रयोग गर्नुपर्ने आवश्यकता भएको/नभएकोः (उपयुक्त स्थानमा चिनो लगाउनुहोस्)</label>
                                                    <select class="form-control" name="material_used"  required>
                                                        <option>Select</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12">
                                                <fieldset class="form-group">
                                                    <label>आवश्यकता भएको भए कस्तो प्रकारको सहायक सामग्रीको प्रयोग गर्नुपर्ने हुन्छः</label>
                                                    <textarea name="material_used_description" class="form-control" id="basicInput" rows="5"></textarea>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label>सहायक सामग्रीको प्रयोग गर्ने गरेको/नगरेकोः (उपयुक्त स्थानमा चिनो लगाउनुहोस्)</label>
                                                    <select class="form-control" name="already_material_used" id='material_used' onchange="materialUsed()" required>
                                                        <option>Select</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6" id="material_used_yes">
                                                <fieldset class="form-group">
                                                    <label>सहायक सामग्रीको प्रयोग गर्ने गरेको भए सामग्रीको नामः</label>
                                                    <input name="material_used_name" class="form-control" id="basicInput">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12">
                                                <fieldset class="form-group">
                                                    <label>अन्य व्यक्तिको सहयोग विना आफ्ना कस्ता कस्ता दैनिक कार्य गर्न सक्नु हुन्छ</label>
                                                    <textarea name="daily_work_without_other_help" class="form-control" id="basicInput" rows="3"></textarea>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12">
                                                <fieldset class="form-group">
                                                    <label>अन्य व्यक्तिको सहयोग लिनुहुन्छ भने कुनकुन कामको लागि लिनुहुन्छ </label>
                                                    <textarea name="daily_work_with_other_help" class="form-control" id="basicInput" rows="3"></textarea>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label>शैक्षिक योग्यता</label>
                                                    <select class="form-control" name="education_level" required>
                                                        <option>Select</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label>कुनै तालिम प्राप्त गर्नुभएको भए मुख्य तालिमहरुको नाम लेख्नुहोस्</label>
                                                    <input name="trainning_name" class="form-control" id="basicInput">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label>हालको पेशा</label>
                                                    <input name="current_work" class="form-control" id="basicInput">
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="grid-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="col-md-12 col-lg-12">
                                                                <label>Photo *</label><br>
                                                                @if(isset($data))
                                                                    <img src="{{url(isset($data)?$data->getTranscriptImage():imageNotFound())}}" height="250" width="200"
                                                                         id="transcript_tslc_img">
                            
                                                                @else
                                                                    <img src="{{isset($data)?$data->getTranscriptImage():imageNotFound('user')}}" height="250" width="200"
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
                                             {{-- <div class="col-lg-4">
                                                <div class="grid-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="col-md-12 col-lg-12">
                                                                <label>Photo *</label><br>
                                                                @if(isset($data))
                                                                    <img src="{{url(isset($data)?$data->getTranscriptImage():imageNotFound())}}" height="250" width="200"
                                                                         id="transcript_tslc_img">
                            
                                                                @else
                                                                    <img src="{{isset($data)?$data->getTranscriptImage():imageNotFound('user')}}" height="250" width="200"
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
                                            </div> --}}
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
