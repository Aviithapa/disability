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
                         <a href="{{ url('dashboard/site-settings/form') }}"> <button type="button" class="btn btn-primary">Edit Site Setting </button> </a>
                           <div class="box-header with-border p-t-1">
                               <h3 class="box-title text-black">Site Setting List</h3>
                              
                           </div>
                          
                           <!-- /.box-header -->
                           <div class="box-body">
                               <div class="table-responsive">
                                   <table class="table no-margin">
                                       <thead>
                                       <tr>
                                           <th>S.N.</th>
                                           <th>Display Name</th>
                                           <th>Name</th>
                                           
                                       </tr>
                                       </thead>
                                       <tbody id="withoutAjax">
                                          @foreach ($site_settings as $key => $item)
                                          <tr>
                                          <td>{{ ++$key }}</a></td>
                                          <td>{{ $item->display_name }}</></td>
                                          <td>{{ $item->name }}</td>
                                       
                                          </tr>
                                          @endforeach
                                           
                                       </tbody>
                                                
                                     </tbody>
                                   </table>
                               </div>
                               <!-- /.table-responsive -->
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


@endpush