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
                <a href="{{route('applicantData')}}">
                <div class="card">
                    <div class="card-body"><span class="info-box-icon bg-aqua"><i class="icon-briefcase"></i></span>
                        <div class="info-box-content"> <span class="info-box-number">{{   $unverifiedCount }}</span>
                            <span class="info-box-text">New Applicant</span> </div>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-3 col-xs-6 m-b-3">
                <a href="{{route('applicantData')}}">
                <div class="card">
                    <div class="card-body"><span class="info-box-icon bg-aqua"><i class="icon-briefcase"></i></span>
                        <div class="info-box-content"> <span class="info-box-number">{{  $rejectedCount }}</span>
                            <span class="info-box-text">Rejected  Applicant</span> </div>
                    </div>
                </div>
                </a>
            </div>
             <div class="col-lg-3 col-xs-6 m-b-3">
                <a href="{{route('applicantData')}}">
                <div class="card">
                    <div class="card-body"><span class="info-box-icon bg-aqua"><i class="icon-briefcase"></i></span>
                        <div class="info-box-content"> <span class="info-box-number">{{  $adminVerifiedCount }}</span>
                            <span class="info-box-text">Admin Verified  Applicant</span> </div>
                    </div>
                </div>
                </a>
            </div>
              
            <div class="col-lg-3 col-xs-6 m-b-3">
                <a href="{{route('applicantData')}}">
                <div class="card">
                    <div class="card-body"><span class="info-box-icon bg-aqua"><i class="icon-briefcase"></i></span>
                        <div class="info-box-content"> <span class="info-box-number">{{  $verifiedCount }}</span>
                            <span class="info-box-text">Registered Applicant</span> </div>
                    </div>
                </div>
                </a>
            </div>
           
        </div>
    </div>

</div>
<!-- /.content -->
</div>

@endsection