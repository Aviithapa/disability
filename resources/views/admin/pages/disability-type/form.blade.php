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
                            <h4 class="text-black" style="font-family:PreetiNormal">अक्षमता को प्रकृति मा वर्गीकरण (Classification on the nature of Disability)
                               </h4>
                               <div class="pull-right">
                               </div>
                           </div>
                           <!-- /.box-header -->
                           <div class="box-body">
                            <div class="card">

                                <div class="card-body">
                        
                                   
                                    <form method="POST" action="{{ route('disability-type.store') }}">
                                        @csrf
                    
                                       
                                            
                                        <div class="row">
                                             <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label>क्रम संख्या</label>
                                                    <input name="points" class="form-control" id="basicInput" type="text" value="{{ old('points') }}">
                                                 @if($errors->any())
                                                    <div style="color:red !important">
                                                        {{ $errors->first('points') }}
                                                    </div>
                                                 @endif
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label>प्रकार</label>
                                                    <input name="type" class="form-control" id="basicInput" type="text" value="nature_of_disability" readonly>
                                                 @if($errors->any())
                                                    <div style="color:red !important">
                                                        {{ $errors->first('type') }}
                                                    </div>
                                                 @endif
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label>नेपाली भाषाको नाम दिनुहोस्</label>
                                                    <input name="name_nepali" class="form-control" id="basicInput" type="text" value="{{ old('name_nepali') }}">
                                                 @if($errors->any())
                                                    <div style="color:red !important">
                                                        {{ $errors->first('name_nepali') }}
                                                    </div>
                                                 @endif
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label>अंग्रेजी भाषाको नाम दिनुहोस्</label>
                                                    <input name="name_english" class="form-control" id="basicInput"  value="{{ old('name_english') }}" type="text">
                                                     @if($errors->any())
                                                    <div style="color:red !important">
                                                        {{ $errors->first('name_english') }}
                                                    </div>
                                                 @endif
                                                </fieldset>
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
