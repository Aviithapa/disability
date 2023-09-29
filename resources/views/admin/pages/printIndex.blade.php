@extends('layout.app')

@section('content')
<style>
.pagination a {
  color: black;
  border: none !important;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}

.pagination a.active {
  background-color: none !important;
  color: blue;
  border: 0.5px solid blue;

}

.pagination>li>a{
    color: black;
}
.page-item.active .page-link{
    background: none;
      color: blue;
}

.page-link:hover {
    color: #0056b3;
    text-decoration: none;
    background-color: white !important;
    border-color: #dee2e6;
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
                               <h3 class="box-title text-black">Applicant List</h3>
                                <div class="box box-info">
                    <div class="box-header with-border p-t-1">
                        <form method="POST" 
                        action="{{route('printIndex')}}" id="searchForm">
                            @csrf


                            <div class="row">

                                 <div class="col-lg-4">
                                    <fieldset class="form-group">
                                        <input type="text" name="full_name" class = "form-control" placeholder="Enter Full Name" id="name" value={{ isset($request->full_name) ? $request->full_name : '' }}>
                                    </fieldset>   
                                </div>

                                  <div class="col-lg-3">
                                    <fieldset class="form-group">
                                        {{-- <input type="text" name="darta_number" class = "form-control" placeholder="Enter Darta Number" value={{ isset($request->darta_number) ? $request->darta_number : '' }}> --}}
                                       <select class="form-control" name="disability_type" id='status'>
                                          <option value={{ isset($request->disability_type) ? $request->disability_type : ''}}>{{ isset($request->disability_type) ? $request->disability_type : 'असक्षमता प्रकार चयन गर्नुहोस्'}}</option>
                                         <option value="A">A</option>
                                         <option value="A">Admin Approved</option>
                                         <option value="Approved">Approved</option>
                                         <option value="Rejected">Rejected</option>
                                        </select>
                                    </fieldset>
                                  </div>

                              
                           
                         
                                <div class="col-lg-2" >
                                    <button type="submit" class="btn search-button">Search</button>
                                </div>
                            

                        </form>
                    </div>
                    </div>
                             
                           </div>
                           <div class="col-lg-4">
                         
                        </div>
                          आवेदकको कुल संख्या : {{$applicant->total() }}
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
                                           <th>Card Number</th>
                                           <th>Action</th>
                                       </tr>
                                       </thead>
                                       <tbody id="withoutAjax">
                                          @foreach ($applicant as $key => $item)
                                          @php
                                            $pageRelativeIndex = ($applicant->currentPage() - 1) * $applicant->perPage() + ($key + 1);
                                          @endphp
                                          <tr>
                                          <td>{{ $pageRelativeIndex }}</td>
                                          <td>{{ $item->full_name }}</></td>
                                          <td>{{ $item->disability_type }}</td>
                                          <td>{{ $item->disability_cause }}</td>
                                          <td>{{ $item->citizenship_number }}</td>
                                          <td>{{ $item->dob_nep }}</td>
                                          <td>{{ $item->IdNumber }}</td>
                                          <td>
                                            <a target="_blank" href="{{ url('dashboard/show/'.$item->id) }}"><span class="label label-success">Print</span></a>
                                           
                                        </td>
                                          </tr>
                                          @endforeach
                                           
                                       </tbody>
                                       <tbody id="withAjax">             
                                     </tbody>
                                   </table>
                                    <div class="pagination-container" style="margin-top:20px;">
                                         {{ $applicant->appends(request()->except('page'))->links('vendor.pagination.bootstrap-4') }}
                                    </div>
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

    {{-- <script type="text/javascript">
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
    </script> --}}

@endpush