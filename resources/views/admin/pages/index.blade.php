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
                         <a href="{{ url('dashboard/form') }}" <button type="button" class="btn btn-primary">New Applicant </button> </a>
                           <div class="box-header with-border p-t-1">
                               <h3 class="box-title text-black">Applicant List</h3>
                               <div class="pull-right">
                                {{ count($applicant) }} Registered Applicants
                               </div>
                           </div>
                           <div class="col-lg-4">
                            <fieldset class="form-group">
                                <input class="form-control" id="search" name="search"  type="text" placeholder="Type Here" required>
                            </fieldset>
                        </div>
                           <!-- /.box-header -->
                           <div class="box-body">
                               <div class="table-responsive">
                                   <table class="table no-margin">
                                       <thead>
                                       <tr>
                                           <th>S.N.</th>
                                           <th>Full Name</th>
                                           <th>Disability Type</th>
                                           <th>Disability Cause</th>
                                           <th>Citizenship</th>
                                           <th>Date of birth</th>
                                           <th>Action</th>
                                       </tr>
                                       </thead>
                                       <tbody id="withoutAjax">
                                          @foreach ($applicant as $key => $item)
                                          <tr>
                                          <td>{{ ++$key }}</a></td>
                                          <td>{{ $item->full_name }}</></td>
                                          <td>{{ $item->disability_type }}</td>
                                          <td>{{ $item->disability_cause }}</td>
                                          <td>{{ $item->citizenship_number }}</td>
                                          <td>{{ $item->dob_nep }}</td>
                                          <td>
                                            {{-- <a href="{{ url('dashboard/show/'.$item->id) }}"><span class="label label-success">View</span></a> --}}
                                            <a href="{{ url('/dashboard/generateNumber/'.$item->id) }}"><span class="label label-success">Generate Number</span></a>
                                        </td>
                                          </tr>
                                          @endforeach
                                           
                                       </tbody>
                                       <tbody id="withAjax">             
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

    <script type="text/javascript">
        $('#search').on('keyup',function(){
            var value=$(this).val();
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
            $.ajax({
                type : 'Get',
                url : '{{URL::to('dashboard/search')}}',
                data:{'search':value},
                success:function(data){
                    $('#withAjax').html(data);
                    $('#withAjax').show();
                    $('#withoutAjax').hide();
                }
            });
        })
    </script>

@endpush