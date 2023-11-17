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
             <a href="{{ route('disability-group.create') }}"> <button type="button" class="btn search-button">नयाँ असक्षमता प्रकार थप्नुहोस् </button> </a>
            </div>
        </h1>
      
    </div>

    {{--        <!-- Main content -->--}}
           <div class="content">

            <div class="box box-info">
                    {{-- <div class="box-header with-border p-t-1">
                        <form method="POST" 
                        action="{{route('disability-type.index')}}" id="searchForm">
                            @csrf


                            <div class="row">

                                 <div class="col-lg-10">
                                    <fieldset class="form-group">
                                        <input type="text" name="name" class = "form-control" placeholder="Search" id="name" value={{ isset($request->name) ? $request->name : '' }}>
                                    </fieldset>   
                                </div>
                         
                                <div class="col-lg-2" >
                            <button type="submit" class="btn search-button">
                                खोज्नुहोस्</button>
                                </div>
                        
                          

                        </form>
                    </div>
                    </div> --}}
                </div>
               <div class="row mt-4" >
                   <div class="col-lg-12 m-b-3">
                  
                       <div class="box box-info" style="padding: 10px;">
                           <!-- /.box-header -->
                              असक्षमता प्रकार कुल संख्या : {{$applicant->total() }}
                           <div class="box-body">
                               <div class="table-responsive">
                                   <table class="table no-margin">
                                       <thead>
                                       <tr>
                                           <th>S.N.</th>
                                           <th>क्रम संख्या</th>
                                           <th>नेपाली भाषा</th>
                                           <th>अंग्रेजी भाषा</th>
                                           <th>रंग</th>
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
                                            <td>{{ $item->points }}</></td>
                                            <td>{{ $item->name_nepali }}</td>
                                            <td>{{ $item->name_english }}</td>
                                            <td>{{ $item->color }}</td>
                                            <td><a href="{{ url('dashboard/edit/disability-group/'.$item->id) }}" title="edit"><span class="label label-danger"><i class="fa fa-pencil"></i></span></a></td>
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

    <script>
        function resetForm() {
            // Get form element
            var form = document.getElementById('searchForm');

          document.getElementById('name').value = '';
    document.getElementById('regratation_date').value = '';

    // Reset select element
    document.getElementById('status').value = '';
            // Submit the form (optional)
         document.getElementById('searchForm').submit();
        }
</script>

@endpush