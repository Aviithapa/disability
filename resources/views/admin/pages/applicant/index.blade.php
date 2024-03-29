@extends('admin.layout.app')

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
        <h1>
            <div style="display: flex; justify-content: space-between">
                <span> </span>
             <a href="{{ route('applicant.create') }}"> <button type="button" class="btn search-button">नयाँ आवेदक थप्नुहोस् </button> </a>
            </div>
        </h1>
      
    </div>

    {{--        <!-- Main content -->--}}
           <div class="content">

            <div class="box box-info">
                    <div class="box-header with-border p-t-1">
                       <form method="POST" action="{{route('applicant.index')}}" id="searchForm">
                            @csrf


                            <div class="row">

                                 <div class="col-lg-2">
                                    <fieldset class="form-group">
                                        <input type="text" name="full_name" class ="form-control" placeholder="Enter Full Name" id="name" value={{ isset($request) ? $request->full_name : '' }}>
                                    </fieldset>   
                                </div>

                                <div class="col-lg-2">
                                    <fieldset class="form-group">
                                       <select class="form-control" name="status" id='status'>
                                          <option value={{ isset($request->status) ? $request->status : ''}}>{{ isset($request->status) ? $request->status : 'स्थिति चयन गर्नुहोस्'}}</option>
                                          <option value="">All</option>
                                          <option value="New">New Applied</option>
                                          <option value="Approved">Approved</option>
                                          <option value="Rejected">Rejected</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-lg-2">
                                    <fieldset class="form-group">
                                       <select class="form-control" name="serverity_disability_type" id='serverity_disability_type'>
                                          <option value={{ isset($request->serverity_disability_type) ? $request->serverity_disability_type : ''}}>{{ isset($request->serverity_disability_type) ? getDisabilityName($request->serverity_disability_type) : 'असक्षमता प्रकार चयन गर्नुहोस्'}}</option>
                                          @foreach($severity_types as $disability)
                                            <option value="{{ $disability->id }}">{{ $disability->name_nepali }}</option>
                                         @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                               
                                  <div class="col-lg-2">
                                    <fieldset class="form-group">
                                       <select class="form-control" name="disability_type" id='status'>
                                          <option value={{ isset($request->disability_type) ? $request->disability_type : ''}}>{{ isset($request->disability_type) ? getDisabilityName($request->disability_type) : 'असक्षमता प्रकार चयन गर्नुहोस्'}}</option>
                                          @foreach($disability_types as $disability)
                                            <option value="{{ $disability->id }}">{{ $disability->name_nepali }}</option>
                                         @endforeach
                                        </select>
                                    </fieldset>
                                </div>

                                <div class="col-lg-2">
                                    <fieldset class="form-group">
                                        <input type="text" name="regratation_date" class = "form-control" placeholder="YYYY-MM-DD" value="{{ old('regratation_date') }}"  >
                                    </fieldset> 
                                </div>
                           
                         
                                <div class="col-lg-2" >
                            <button type="submit" class="btn search-button">
                                Search</button>
                                </div>
                        </form>
                    </div>
                    </div>
                </div>
               <div class="row mt-4" >
                   <div class="col-lg-12 m-b-3">
                  
                       <div class="box box-info" style="padding: 10px;">
                           <!-- /.box-header -->
                              आवेदकको कुल संख्या : {{$applicant->total() }}
                           <div class="box-body">
                               <div class="table-responsive">
                                   <table class="table no-margin">
                                       <thead>
                                       <tr>
                                           <th>S.N.</th>
                                           <th>पूरा नाम</th>
                                           <th>असक्षमता प्रकार</th>
                                           <th>असक्षमता कारण</th>
                                           <th>स्थिति</th>
                                           <th>जन्म मिति</th>
                                           <th>कार्य</th>
                                       </tr>
                                       </thead>
                                       <tbody>
                                          @foreach ($applicant as $key => $item)
                                          @php
                                                $pageRelativeIndex = ($applicant->currentPage() - 1) * $applicant->perPage() + ($key + 1);
                                          @endphp
                                          <tr>
                                          <td>{{ $pageRelativeIndex }}</td>
                                          <td>{{ $item->full_name }}</></td>
                                          <td>{{ isset($item->disability_type_id) ? $item->disability->name_nepali  :'' }}</td>
                                          <td>{{ $item->disability_cause }}</td>
                                          <td style="text-transfor: capitilized;">{{ $item->status }}</td>
                                          <td>{{ $item->dob_nep }}</td>
                                          <td>
                                            <a href="{{ url('applicant/'.$item->id) }}" title="view"><span class="label label-success"><i class="fa fa-eye"></i></span></a>
                                             @if(Auth::user()->role === 'admin' || $item->status === 'rejected')
                                            <a href="{{ url('applicant/'.$item->id .'/edit') }}" title="edit"><span class="label label-danger"><i class="fa fa-pencil"></i></span></a>
                                            @endif
                                            @if(Auth::user()->role === 'admin' && $item->status === 'approved' )
                                            <a href="{{ url('applicant/show/'.$item->id) }}" title="Print"><span class="label label-warning"><i class="fa fa-print"></i></span></a>
                                            @endif
                                        </td>
                                          </tr>
                                          @endforeach

                                           
                                           
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
@endpush