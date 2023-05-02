@extends('layout.app')

@section('content')
<style>
.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  border: none !important;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}

.pagination a.active {
  background-color: blue;
  color: white;
}
</style>
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

    {{--        <!-- Main content -->--}}
           <div class="content">

               <div class="row">
                   <div class="col-lg-12 m-b-3">
                       <div class="box box-info" style="padding: 10px;">
                        
                           <div class="box-header with-border p-t-1">
                               <h3 class="box-title text-black">Setting Form</h3>
                              
                           </div>
                          
                           <!-- /.box-header -->
                           <div class="box-body">
                                 <form method="POST" action="{{ route('siteSettings.update') }}">
                                        @csrf
                    
                                        
                                            
                                        <div class="row" style="padding:20px;">
                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label>Site Title</label>
                                                    <input name="site_title" class="form-control" id="basicInput" value="{{ getSiteSetting('site_title') != null? getSiteSetting('site_title'): null }}" type="text">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label>Meta Keyword</label>
                                                    <input name="meta_keyword" class="form-control" id="basicInput" value="{{ getSiteSetting('meta_keyword') != null? getSiteSetting('meta_keyword'): null }}" type="text">

                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12">
                                                <fieldset class="form-group">
                                                    <label>Meta Description</label>
                                                    <textarea name="meta_description" class="form-control" id="basicInput" value="{{ getSiteSetting('meta_description') != null? getSiteSetting('meta_description'): null }}"  rows="8" cols="50"></textarea>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-3">
                                                <fieldset class="form-group">
                                                    <label>Facebook</label>
                                                    <input name="social_fb" class="form-control" value="{{ getSiteSetting('social_fb') != null? getSiteSetting('social_fb'): null }}" id="basicInput">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-3">
                                                <fieldset class="form-group">
                                                    <label>Instagram</label>
                                                    <input name="social_instagram" class="form-control" value="{{ getSiteSetting('social_instagram') != null? getSiteSetting('social_instagram'): null }}" id="basicInput">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-3">
                                                <fieldset class="form-group">
                                                    <label>Mail</label>
                                                    <input name="social_mail" class="form-control" value="{{ getSiteSetting('social_mail') != null? getSiteSetting('social_mail'): null }}" id="basicInput">
                                                </fieldset>
                                            </div>
                                             <div class="col-lg-3">
                                                <fieldset class="form-group">
                                                    <label>Phone Number</label>
                                                    <input name="social_phone" class="form-control" value="{{ getSiteSetting('social_phone') != null? getSiteSetting('social_phone'): null }}" id="basicInput">
                                                </fieldset>
                                            </div>
                                            
                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label>Location</label>
                                                    <input name="location" class="form-control" value="{{ getSiteSetting('location') != null? getSiteSetting('location'): null }}" id="basicInput">

                                                </fieldset>
                                            </div>

                                              <div class="col-lg-6">
                                              
                                            </div>
                                        
                                    
                                            <div class="col-lg-12">
                                                <div class="col-md-12 col-lg-12">
                    @if(getSiteSetting('logo_image')!==null)
                        <img src="{{getSiteSetting('logo_image')?getSiteSetting('logo_image'):imageNotFound()}}" height="250"
                             id="logo_image_img">

                    @else
                        <img src="{{ getSiteSetting('logo_image')?getSiteSetting('logo_image'):imageNotFound() }}" height="250"
                             id="logo_image_img">
                    @endif
                </div>

                <div class="form-group col-md-12 col-lg-12">
                    <label>Logo Image</label>
                    <small>Size: 60*60 px</small>
                    <input type="file" id="logo_image" name="logo_image_image"
                           onclick="anyFileUploader('logo_image')">
                    <small id="slider_help_text" class="help-block"></small>
                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                         aria-valuemax="100"
                         aria-valuenow="0">
                        <div id="logo_image_progress" class="progress-bar progress-bar-success"
                             style="width: 0%">
                        </div>
                    </div>
                    <input type="hidden" id="logo_image_path" name="logo_image" class="form-control"
                           value="{{getSiteSetting('logo_image')?getSiteSetting('logo_image'):''}}"/>
                    {!! $errors->first('logo_image', '<div class="text-danger">:message</div>') !!}
                </div>
                                            </div>
                                        
                        
                                         <div class="col-lg-12">
                                             <button type="submit" class="btn btn-primary float-right mt-2"><i class="fa fa-check"></i>
                                                 Save</button>
                                         </div>
                        
                                    </form>
                        
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
@include('parties.common.file-upload')

@endpush