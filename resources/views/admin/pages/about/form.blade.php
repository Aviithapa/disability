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
                               <h3 class="box-title text-black">Create About</h3>
                              
                           </div>
                          
                           <!-- /.box-header -->
                           <div class="box-body">
                                 <form method="POST" action="{{ route('about.store') }}">
                                        @csrf
                    
                                        
                                            
                                        <div class="row" style="padding:20px;">
                                            <div class="col-lg-12">
                                                <fieldset class="form-group">
                                                    <label>About Title</label>
                                                    <input name="title" class="form-control" id="basicInput" type="text" required>
                                                </fieldset>
                                            </div>
                                          
                                            <div class="col-lg-12">
                                                <fieldset class="form-group">
                                                    <label>Excerpt</label>
                                                    <textarea name="excerpt" class="form-control" id="basicInput"  rows="8" cols="50"></textarea>
                                                </fieldset>
                                            </div>

                                           
                                            
                                           

                                              <div class="col-lg-12">
                                              <fieldset class="form-group">
                                                    <label>Content</label>
                                                    <textarea class="ckeditor form-control" name="content"></textarea>
                                                </fieldset>
                                             
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
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
@endpush