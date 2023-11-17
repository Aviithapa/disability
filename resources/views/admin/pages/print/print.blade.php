@extends('admin.layout.app')

@section('content')
 <style type="text/css" media="print">
        @page {
            size: auto; /* Default page size */
            margin: 0; /* No margin for the page */
        }
        body {
            margin: 0; /* No margin for the body */
            background: white;
        }
        .print-section {
            margin: 20px;
            background: #ffffff;
            /* Define the styles for the section you want to print */
            /* You can hide other elements by setting display: none; */
        }
        .a4-size {
            width: 210mm; /* A4 width in millimeters */
            height: 297mm; /* A4 height in millimeters */
            margin: 0 auto; /* Center the content on the page */
            background-color: white; /* Optional: set a background color */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Optional: add a box shadow */
        }
         .id-card {
        width: 85.6mm;
        height: 54.0mm;
        margin: auto;
        padding: 10px;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }
    .fs-10{
        font-size: 10px;
    }

    .fs-12{
        font-size: 12px;
    }

    .b-600{
        font-weight: 600;
    }

    .align-item-center{
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .img-container {
        height: 40px;
        width: 40px;
    }

    .img-container img{
        width: 100%;
        height: 100%;
    }

    .identity{
        text-align: center;
    }
    .main-footer{
        display: none; /* Hide the row by default */
    }
  </style>   
  <style>
   .id-card {
    width: 85.6mm;
    height: 54.0mm;
    margin: auto;
    padding: 10px;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
.fs-10{
    font-size: 10px;
}

.fs-12{
    font-size: 12px;
}

.b-600{
    font-weight: 600;
}

.align-item-center{
    display: flex;
    justify-content: center;
    align-items: center;
}

.img-container {
    height: 40px;
    width: 40px;
}

.img-container img{
    width: 100%;
    height: 100%;
}

.identity{
    text-align: center;
}



  </style>   


 <div class="content-wrapper print-section">
    <!-- Content Header (Page header) -->
   

    {{--        <!-- Main content -->--}}
           <div class="content" style="margin-top:10px;">

               <div class="row">
                   <div class="col-lg-12 m-b-3">
                       <div class="box box-info">
                           <div class="box-header with-border p-t-1">
                              
                           </div>
                           <!-- /.box-header -->
                           <div class="box-body mt-5">
                              <div class="nepali-card a4-size id-card">
                                  <div class="row">
                                        <div class="col-lg-3 align-item-center" style="height:50px;">
                                             <img src="{{asset('dist/img/logo-n-blue.png')}}" alt="" height="40" />
                                        </div>
                                        <div class="col-lg-6 fs-10">
                                            <div class="text-center b-600">
                                                <span>प्रदेश सरकार</span>
                                                <br>सुदूरपश्चिम प्रदेश
                                                <br>दशरथचन्द नगरपालिका बैतडी
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="img-container">
                                                <img src="{{ $applicant->getProfileImage() }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-12" style="padding: 0px 69px;">
                                            <div class="identity col-lg-12 fs-12 b-600" style="background :  @if($applicant->disability_type_id) {{ $applicant->disability->color }}  @else none; @endif">
                                                DISABILITY IDENTITY CARD
                                            </div>
                                        </div>
                                       
                                        <div class="col-lg-12 fs-10">
                                            <span>परिचयपत्र नं :- <span style="font-weight: 700; text-transform: uppercase;">{{ $applicant->IdNumber }}</span></span>
                                            <br>
                                            <span>नाम,थर :- <span style="font-weight: 700">{{ $applicant->full_name_nep }} | {{ $applicant->full_name }}</span></span>
                                            <br>
                                            <span>ठेगानाः- सुदूरपश्चिम प्रदेश बैतडी जिल्ला दशरथचन्द नगरपालिका वडा नं <span style="font-weight: 700">{{ $applicant->ward_no }}</span></span>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <span>जन्म मिति : <span style="font-weight: 700">{{ $applicant->dob_nep }}</span></span>
                                                </div>
                                                <div class="col-lg-6">
                                                    <span>नागरिकता नं : <span style="font-weight: 700">{{ $applicant->citizenship_number }}</span></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <span>लिङ्ग : <span style="font-weight: 700">{{ $applicant->sex }}</span></span>
                                                </div>
                                                <div class="col-lg-6">
                                                    <span>रक्त समूह : <span style="font-weight: 700">{{ $applicant->blood_group }}</span></span><br>
                                                </div>
                                            </div>
                                            <span>अपाङ्गताको किसिम : प्रकृतिको आधारमा <span style="font-weight: 700">{{ $applicant->disability->name_nepali }}</span> गम्भीरता:- <span style="font-weight: 700">{{ $applicant->disabilitySeverity->name_nepali }}</span></span><br>
                                            <span>बाबु/आमा वा संरक्षकको नाम :- <span style="font-weight: 700">{{ $applicant->guardian }}</span></span><br>
                                     
                                        </div>
                                        {{-- <div class="col-lg-9 mt-2">
                                            <span style="text-decoration: underline;"> परिचयपत्र प्रमाणित गर्ने : </span><br>
                                            <span> हस्ताक्षर :- </span><br>
                                            <span> नाम,थर : - </span><br>
                                            <span> पद :- </span><br>
                                            <span>  मिति :- </span><br>
                                        </div> --}}
                                        <div class="col-lg-3 mt-2"></div>
                                    </div>
                             </div>

                              <div class="nepali-card a4-size id-card mt-5">
                                  <div class="row">
                                        <div class="col-lg-3 align-item-center" style="height:50px;">
                                             <img src="{{asset('dist/img/logo-n-blue.png')}}" alt="" height="40" />
                                        </div>
                                        <div class="col-lg-6 fs-10">
                                            <div class="text-center b-600">
                                                <span>प्रदेश सरकार</span>
                                                <br>सुदूरपश्चिम प्रदेश
                                                <br>दशरथचन्द नगरपालिका बैतडी
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="img-container">
                                                <img src="{{ $applicant->getProfileImage() }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-12" style="padding: 0px 69px;">
                                            <div class="identity col-lg-12 fs-12 b-600" style="color: #fff; background :  @if($applicant->disability_type_id) {{ $applicant->disability->color }}  @else none; @endif">
                                                DISABILITY IDENTITY CARD
                                            </div>
                                        </div>
                                       
                                        <div class="col-lg-12 fs-10">
                                            <span>परिचयपत्र नं :- <span style="font-weight: 700; text-transform: uppercase;">{{ $applicant->IdNumber }}</span></span>
                                            <br>
                                            <span>नाम,थर :- <span style="font-weight: 700">{{ $applicant->full_name_nep }} | {{ $applicant->full_name }}</span></span>
                                            <br>
                                            <span>ठेगानाः- सुदूरपश्चिम प्रदेश बैतडी जिल्ला दशरथचन्द नगरपालिका वडा नं <span style="font-weight: 700">{{ $applicant->ward_no }}</span></span>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <span>जन्म मिति : <span style="font-weight: 700">{{ $applicant->dob_nep }}</span></span>
                                                </div>
                                                <div class="col-lg-6">
                                                    <span>नागरिकता नं : <span style="font-weight: 700">{{ $applicant->citizenship_number }}</span></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <span>लिङ्ग : <span style="font-weight: 700">{{ $applicant->sex }}</span></span>
                                                </div>
                                                <div class="col-lg-6">
                                                    <span>रक्त समूह : <span style="font-weight: 700">{{ $applicant->blood_group }}</span></span><br>
                                                </div>
                                            </div>
                                            <span>अपाङ्गताको किसिम : प्रकृतिको आधारमा <span style="font-weight: 700">{{ $applicant->disability->name_nepali }}</span> गम्भीरता:- <span style="font-weight: 700">{{ $applicant->disabilitySeverity->name_nepali }}</span></span><br>
                                            <span>बाबु/आमा वा संरक्षकको नाम :- <span style="font-weight: 700">{{ $applicant->guardian }}</span></span><br>
                                     
                                        </div>
                                        {{-- <div class="col-lg-9 mt-2">
                                            <span style="text-decoration: underline;"> परिचयपत्र प्रमाणित गर्ने : </span><br>
                                            <span> हस्ताक्षर :- </span><br>
                                            <span> नाम,थर : - </span><br>
                                            <span> पद :- </span><br>
                                            <span>  मिति :- </span><br>
                                        </div> --}}
                                        <div class="col-lg-3 mt-2"></div>
                                    </div>
                             </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
 </div>
 






                         




@endsection
 

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

   <script>
        // Wait for the DOM to be ready
        document.addEventListener("DOMContentLoaded", function () {
            // Find the "Print" button by its ID
            window.onload = function () {
                window.print();
            };
        });
    </script>

@endpush