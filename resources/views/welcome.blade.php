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

    <div class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6 m-b-3">
                <a href="{{route('printIndex')}}">
                <div class="card">
                    <div class="card-body"><span class="info-box-icon bg-aqua"><i class="icon-briefcase"></i></span>
                        <div class="info-box-content"> <span class="info-box-number">{{ count($verifiedCount) }}</span>
                            <span class="info-box-text">Registered Applicant</span> </div>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-3 col-xs-6 m-b-3">
                <a href="{{route('applicantData')}}">
                <div class="card">
                    <div class="card-body"><span class="info-box-icon bg-aqua"><i class="icon-briefcase"></i></span>
                        <div class="info-box-content"> <span class="info-box-number">{{ count($unverifiedCount) }}</span>
                            <span class="info-box-text">Unverified  Applicant</span> </div>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>
    {{--        <!-- Main content -->--}}
    {{--        <div class="content">--}}

    {{--            <div class="row">--}}
    {{--                <div class="col-lg-12 m-b-3">--}}
    {{--                    <div class="box box-info">--}}
    {{--                        <div class="box-header with-border p-t-1">--}}
    {{--                            <h3 class="box-title text-black">Exam List</h3>--}}
    {{--                            <div class="pull-right">--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <!-- /.box-header -->--}}
    {{--                        <div class="box-body">--}}
    {{--                            <div class="table-responsive">--}}
    {{--                                <table class="table no-margin">--}}
    {{--                                    <thead>--}}
    {{--                                    <tr>--}}
    {{--                                        <th>Exam ID</th>--}}
    {{--                                        <th>Exam Name</th>--}}
    {{--                                        <th>Actions</th>--}}
    {{--                                    </tr>--}}
    {{--                                    </thead>--}}
    {{--                                    <tbody>--}}
    {{--                                    <tr>--}}
    {{--                                        <td><a href="#">OR9842</a></td>--}}
    {{--                                        <td>John Deo</td>--}}
    {{--                                        <td><span class="label label-success">Apply</span></td>--}}
    {{--                                    </tr>--}}
    {{--                                    </tbody>--}}
    {{--                                </table>--}}
    {{--                            </div>--}}
    {{--                            <!-- /.table-responsive -->--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}

</div>
<!-- /.content -->
</div>

@endsection