{{-- @extends('layout.app') --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    {{-- <link rel = "icon" class="img-fluid" href ="" type = "image/x-icon"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="skin-blue sidebar-mini">
<!-- BEGIN CONTAINER -->

<!-- END CONTAINER -->

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
    <div class="button ml-5 mt-2" id="printButton" > 
        <button onclick="printDiv()" class="btn btn-primary" style="padding: 10px; border:none; background: #003594; color: #DD0C39; font-weight:800;">Print Card</button>
    </div>

    {{--        <!-- Main content -->--}}
           <div class="content" style="margin-top:10px;">

               <div class="row">
                   <div class="col-lg-12 m-b-3">
                       <div class="box box-info">
                           <div class="box-header with-border p-t-1">
                               {{-- <h3 class="box-title text-black">Applicant List</h3> --}}
                               <div class="pull-right">
                               </div>
                           </div>
                           <!-- /.box-header -->
                           <div class="box-body mt-5" style="margin: auto;
                           width: 60%;
                           height: 1050px !important;
                           padding: 10px;">
                              <div class="nepali-card" style="border: 2px solid black; padding-left: 15px; padding-top:20px;  height: '794px !important'; float:left; min-height:440px">
                                  <div class="row" style="display: flex;
                                  -ms-flex-wrap: wrap;
                                  flex-wrap: wrap;">
                                     <div class="col-lg-3" style="flex: 0 0 25%; max-width: 25%; padding-top:10px;">
                                        <span class="logo-lg"><img src="{{asset('dist/img/logo-n-blue.png')}}" alt="" height="55" /></span> <br></br>
                                        <span style="font-size: 12px;"> 
                                          
                                          </span>
                                     </div>
                                     <div class="col-lg-6" style="text-align: center; justify-content: center;  color:#DC143C; font-wwight: 800;   flex: 0 0 50%;
                                     max-width: 55%;" >
                                        प्रदेश सरकार  </br> सुदूरपश्चिम प्रदेश </br> दशरथचन्द नगरपालिका बैतडी </br>
                                        

                                    </div>
                                    <div class="col-lg-3" style="flex: 0 0 18%; max-width: 45%;">
                                        {{-- <div class="img" style="border: 2px solid black; height:100px; width:100px;"> --}}
                                            {{-- <img src="{{ $applicant->getProfileImage() }}" height="100" width="100px"> --}}
                                        {{-- </div> --}}
                                    </div>
                                    <div class="identity" style="border: 2px solid black; color:white;  margin: auto;
                                    width: 70%;
                                    padding: 10px;
                                    font-size: 16px;
                                    text-align:center; background : red">
                                        DISABILITY IDENTITY CARD
                                    </div>
                                    <div class="col-lg-12" style="flex: 0 0 100%; max-width: 100%; font-size:12px; margin-top: 15px !important; line-height: 1.6;">
                                        <span>परिचयपत्र नं :-    <span style="font-weight: 700; text-transform: uppercase;"> {{ $applicant->IdNumber }} </span> </span> </br>
                                         <span>परिचयपत्रको प्रकार :-   <span style="font-weight: 700; text-transform: uppercase;">   {{ $applicant->disability_type }} </span></span> </br>
                                        <span>नाम,थर : -  <span style="font-weight: 700"> {{ $applicant->full_name_nep  }}</span></span></br>
                                        <span>ठेगानाः- सुदूरपश्चिम प्रदेश बैतडी जिल्ला दशरथचन्द नगरपालिका वडा नं <span style="font-weight: 700"> {{ $applicant->full_name_nep  }}</span></span> </br>
                                        <div style="display:flex; line-height: 1.4;" >
                                            <div class="col-lg-6" style="flex: 0 0 50%; max-width: 50%;" >
                                                <span>जन्म मिति : <span style="font-weight: 700"> {{ $applicant->dob_nep  }} </span></span> 
                                           </div>
                                           <div class="col-lg-6" style="flex: 0 0 50%; max-width: 50%;" >
                                            <span>नागरिकता नं :  <span style="font-weight: 700">{{ $applicant->citizenship_number  }} </span></span> 
                                           </div>
                                        </div>
                                        <div style="display:flex; line-height: 1.4;" >
                                            <div class="col-lg-6" style="flex: 0 0 50%; max-width: 50%;  text-transform: capitalize;" >
                                                <span>लिङ्ग : <span style="font-weight: 700">{{ $applicant->sex  }}</span> </span> 

                                           </div>
                                           <div class="col-lg-6" style="flex: 0 0 50%; max-width: 50%;" >
                                            <span>रक्त समूह :  <span style="font-weight: 700">{{ $applicant->blood_group  }} </span></span> </br>
                                          </div>
                                        </div>
                                        <span style="line-height: 1.4;">अपाङ्गताको किसिम : प्रकृतिको आधारमा  <span style="font-weight: 700">{{ $applicant->disability_type }}</span> गम्भीरता:-   <span style="font-weight: 700"> {{ $applicant->incapacitated_base_disability_type }} </span> </span> </br>
                                        <span>बाबु/आमा वा संरक्षकको नाम :-   <span style="font-weight: 700">{{ $applicant->guardian }}</span></span> </br>
                                        <span style="line-height: 1.4;">परिचयपत्र वाहकको दस्तखत :   </span> </br>
                                    </div>
                                    <div class="col-lg-3" style="flex: 0 0 18%; max-width: 50%; margin-top:10px !important">
                                        <div class="img" style="border: 2px solid black; height:100px; width:100px;">
                                            <img src="{{ $applicant->getProfileImage() }}" height="100" width="100px">
                                        </div>
                                    </div>
                                    <div class="col-lg-9 mt-2" style="flex: 0 0 75%; max-width: 55%; margin-top:10px !important; padding-left: 45px; line-height:1.4;">
                                        <span style="text-decoration: underline;"> परिचयपत्र प्रमाणित गर्ने :  </span> </br>                            
                                        <span> हस्ताक्षर :-  </span> </br>
                                        <span> नाम,थर : - </span> </br>
                                        <span> पद :-   </span> </br>
                                        <span>  मिति :-  </span> </br>
                                    </div>
                                    <div class="col-lg-3 mt-2" style="flex: 0 0 25%; max-width: 25%;">
                                       
                                    </div>
                                    </div>
                                  </div>
                              </div>
{{--                          
                              <div class="nepali-card" style="border: 2px solid black; padding-left: 15px; padding-top:20px;  margin-left:60px; width:45%; float:left">
                                <div class="row" style="display: flex;
                                -ms-flex-wrap: wrap;
                                flex-wrap: wrap;">
                                   <div class="col-lg-3" style="flex: 0 0 25%; max-width: 25%;">
                                      <span class="logo-lg" style="margin-left: 20px"><img src="{{asset('dist/img/logo-n-blue.png')}}" alt="" height="55" /></span> <br></br>
                                      <span style="font-size: 12px;"> 
                                      ID Card No :-    <span style="font-weight: 700; text-transform: uppercase; font-size: 10px;"> {{ $applicant->IdNumber }} </span>  </br>
                                      ID Card Type :-   <span style="font-weight: 700; text-transform: uppercase;">   {{ $applicant->disability_type }} </span> </br>
                                    </span>
                                   </div>
                                   <div class="col-lg-6" style="text-align: center; justify-content: center;     flex: 0 0 50%;
                                   max-width: 50%;" >
                                      प्रदेश सरकार  </br> सुदूरपश्चिम प्रदेश </br> दशरथचन्द नगरपालिका बैतडी </br>
                                      <div class="identity" style="border: 2px solid black; color:white; background:red; font-size:12px; padding: 2px; margin-left:10%; margin-right:10%;">
                                          DISABILITY IDENTITY CARD
                                      </div>

                                  </div>
                                  <div class="col-lg-3" style="flex: 0 0 18%; max-width: 45%;">
                                    <div class="img" style="border: 2px solid black; height:100px; width:100px;">
                                        <img src="{{ $applicant->getProfileImage() }}" height="100" width="100">
                                    </div>
                                  </div>
                                 
                                  <div class="col-lg-12" style="flex: 0 0 100%; max-width: 100%; font-size:12px;" style="margin-top: 5px; line-height: 1.4;">
                                    <span>Full Name Of Person : -  <span style="font-weight: 700; text-transform: capitalize;"> {{ $applicant->full_name  }}</span></span></br>
                                    <span>Address : - Sudurpacshim Province Baitadi District Dashrathchand MP Ward no  <span style="font-weight: 700"> {{ $applicant->permanant_address  }}</span></span> </br>
                                    <div style="display:flex; line-height: 1.4;" >
                                        <div class="col-lg-6" style="flex: 0 0 50%; max-width: 50%;" >
                                            <span>Date Of Birth : <span style="font-weight: 700; text-transform: capitalize;"> {{ $applicant->dob_eng  }} </span></span> 
                                       </div>
                                       <div class="col-lg-6" style="flex: 0 0 50%; max-width: 50%;" >
                                        <span>Citizenship No :  <span style="font-weight: 700; text-transform: capitalize;">{{ $applicant->citizenship_number  }} </span></span> 
                                       </div>
                                    </div>
                                    <div style="display:flex; line-height: 1.4;" >
                                        <div class="col-lg-6" style="flex: 0 0 50%; max-width: 50%;  text-transform: capitalize;" >
                                            <span>Sex : <span style="font-weight: 700">{{ $applicant->sex  }}</span> </span> 

                                       </div>
                                       <div class="col-lg-6" style="flex: 0 0 50%; max-width: 50%;" >
                                        <span>Blood Group :  <span style="font-weight: 700; text-transform: capitalize;">{{ $applicant->blood_group  }} </span></span> </br>
                                      </div>
                                    </div>
                                  

                                    <span style="line-height: 1.4;">Type of Disability : on the basis of nature  <span style="font-weight: 700 ; text-transform: capitalize;">{{ $applicant->disability_type }}</span> on the basis of Severity:-   <span style="font-weight: 700"> {{ $applicant->incapacitated_base_disability_type }} </span> </span> </br>
                                    <span>Father Name / Mother Name of Guardian :   <span style="font-weight: 700; text-transform: capitalize;">{{ $applicant->guardian }}</span></span> </br>
                                    <span style="line-height: 1.4;">Signature Of Id Holders :  </span> </br>
                                    <span>Approved By :  </span> </br>
                                </div>
                                  <div class="col-lg-9 mt-2" style="flex: 0 0 75%; max-width: 75%; text-align: right;">
                                      <span>Name : - </span> </br>
                                      <span>Signature :-  </span> </br>
                                      <span>Designation :-   </span> </br>
                                      <span>Date :-  </span> </br>
                                  </div>
                                  <div class="col-lg-3 mt-2" style="flex: 0 0 25%; max-width: 25%;">
                                     
                                  </div>
                                  </div>
                                </div>
                                </div>
                            </div>
                            --}}
                           
                           </div>

                           <div class="box-body mt-5" style="margin: auto;
                           width: 60%;
                           height: '793.7px'
                           padding: 10px;">
                              <div class="nepali-card" style="border: 2px solid black; padding-left: 15px; padding-top:20px;  float:left; min-height:440px">
                                  <div class="row" style="display: flex;
                                  -ms-flex-wrap: wrap;
                                  flex-wrap: wrap;">
                                     <div class="col-lg-3" style="flex: 0 0 25%; max-width: 25%; padding-top:10px;">
                                        <span class="logo-lg"><img src="{{asset('dist/img/logo-n-blue.png')}}" alt="" height="55" /></span> <br></br>
                                        <span style="font-size: 12px;"> 
                                          
                                          </span>
                                     </div>
                                     <div class="col-lg-6" style="text-align: center; justify-content: center;  color:#DC143C; font-wwight: 800;   flex: 0 0 50%;
                                     max-width: 55%;" >
                                        प्रदेश सरकार  </br> सुदूरपश्चिम प्रदेश </br> दशरथचन्द नगरपालिका बैतडी </br>
                                        

                                    </div>
                                    <div class="col-lg-3" style="flex: 0 0 18%; max-width: 45%;">
                                        {{-- <div class="img" style="border: 2px solid black; height:100px; width:100px;"> --}}
                                            {{-- <img src="{{ $applicant->getProfileImage() }}" height="100" width="100px"> --}}
                                        {{-- </div> --}}
                                    </div>
                                    <div class="identity" style="border: 2px solid black; color:white;  margin: auto;
                                    width: 70%;
                                    padding: 10px;
                                    font-size: 16px;
                                    text-align:center; background : red">
                                        DISABILITY IDENTITY CARD
                                    </div>
                                    <div class="col-lg-12" style="flex: 0 0 100%; max-width: 100%; font-size:12px; margin-top: 15px !important; line-height: 1.6;">
                                        <span>ID Card No :-    <span style="font-weight: 700; text-transform: uppercase;"> {{ $applicant->IdNumber }} </span> </span> </br>
                                         <span> ID Card Type :-   <span style="font-weight: 700; text-transform: uppercase;">   {{ $applicant->disability_type }} </span></span> </br>
                                        <span>Full Name Of Person : -  <span style="font-weight: 700"> {{ $applicant->full_name_nep  }}</span></span></br>
                                        <span>Address : - Sudurpacshim Province Baitadi District Dashrathchand MP Ward no  <span style="font-weight: 700"> {{ $applicant->full_name_nep  }}</span></span> </br>
                                        <div style="display:flex; line-height: 1.4;" >
                                            <div class="col-lg-6" style="flex: 0 0 50%; max-width: 50%;" >
                                                <span>Date Of Birth : <span style="font-weight: 700"> {{ $applicant->dob_nep  }} </span></span> 
                                           </div>
                                           <div class="col-lg-6" style="flex: 0 0 50%; max-width: 50%;" >
                                            <span>Citizenship No :  <span style="font-weight: 700">{{ $applicant->citizenship_number  }} </span></span> 
                                           </div>
                                        </div>
                                        <div style="display:flex; line-height: 1.4;" >
                                            <div class="col-lg-6" style="flex: 0 0 50%; max-width: 50%;  text-transform: capitalize;" >
                                                <span>Sex : <span style="font-weight: 700">{{ $applicant->sex  }}</span> </span> 

                                           </div>
                                           <div class="col-lg-6" style="flex: 0 0 50%; max-width: 50%;" >
                                            <span>Blood Group :  <span style="font-weight: 700">{{ $applicant->blood_group  }} </span></span> </br>
                                          </div>
                                        </div>
                                        <span style="line-height: 1.4;">Type of Disability : on the basis of nature  <span style="font-weight: 700">{{ $applicant->disability_type }}</span> on the basis of Severity:-   <span style="font-weight: 700"> {{ $applicant->incapacitated_base_disability_type }} </span> </span> </br>
                                        <span>Father Name / Mother Name of Guardian :   <span style="font-weight: 700">{{ $applicant->guardian }}</span></span> </br>
                                        <span style="line-height: 1.4;">Signature Of Id Holders :  </span> </br>
                                    </div>
                                    <div class="col-lg-3" style="flex: 0 0 18%; max-width: 50%; margin-top:10px !important">
                                        <div class="img" style="border: 2px solid black; height:100px; width:100px;">
                                            <img src="{{ $applicant->getProfileImage() }}" height="100" width="100px">
                                        </div>
                                    </div>
                                    <div class="col-lg-9 mt-2" style="flex: 0 0 75%; max-width: 55%; margin-top:10px !important; padding-left: 45px; line-height:1.4;">
                                        <span style="text-decoration: underline;">Approved By :  </span> </br>
                                        <span>Signature :-  </span> </br>
                                        <span>Name : - </span> </br>
                                        <span>Designation :-   </span> </br>
                                        <span>Date :-  </span> </br>
                                    </div>
                                    <div class="col-lg-3 mt-2" style="flex: 0 0 25%; max-width: 25%;">
                                       
                                    </div>
                                    </div>
                                  </div>
                              </div>
{{--                          
                              <div class="nepali-card" style="border: 2px solid black; padding-left: 15px; padding-top:20px;  margin-left:60px; width:45%; float:left">
                                <div class="row" style="display: flex;
                                -ms-flex-wrap: wrap;
                                flex-wrap: wrap;">
                                   <div class="col-lg-3" style="flex: 0 0 25%; max-width: 25%;">
                                      <span class="logo-lg" style="margin-left: 20px"><img src="{{asset('dist/img/logo-n-blue.png')}}" alt="" height="55" /></span> <br></br>
                                      <span style="font-size: 12px;"> 
                                      ID Card No :-    <span style="font-weight: 700; text-transform: uppercase; font-size: 10px;"> {{ $applicant->IdNumber }} </span>  </br>
                                      ID Card Type :-   <span style="font-weight: 700; text-transform: uppercase;">   {{ $applicant->disability_type }} </span> </br>
                                    </span>
                                   </div>
                                   <div class="col-lg-6" style="text-align: center; justify-content: center;     flex: 0 0 50%;
                                   max-width: 50%;" >
                                      प्रदेश सरकार  </br> सुदूरपश्चिम प्रदेश </br> दशरथचन्द नगरपालिका बैतडी </br>
                                      <div class="identity" style="border: 2px solid black; color:white; background:red; font-size:12px; padding: 2px; margin-left:10%; margin-right:10%;">
                                          DISABILITY IDENTITY CARD
                                      </div>

                                  </div>
                                  <div class="col-lg-3" style="flex: 0 0 18%; max-width: 45%;">
                                    <div class="img" style="border: 2px solid black; height:100px; width:100px;">
                                        <img src="{{ $applicant->getProfileImage() }}" height="100" width="100">
                                    </div>
                                  </div>
                                 
                                  <div class="col-lg-12" style="flex: 0 0 100%; max-width: 100%; font-size:12px;" style="margin-top: 5px; line-height: 1.4;">
                                    <span>Full Name Of Person : -  <span style="font-weight: 700; text-transform: capitalize;"> {{ $applicant->full_name  }}</span></span></br>
                                    <span>Address : - Sudurpacshim Province Baitadi District Dashrathchand MP Ward no  <span style="font-weight: 700"> {{ $applicant->permanant_address  }}</span></span> </br>
                                    <div style="display:flex; line-height: 1.4;" >
                                        <div class="col-lg-6" style="flex: 0 0 50%; max-width: 50%;" >
                                            <span>Date Of Birth : <span style="font-weight: 700; text-transform: capitalize;"> {{ $applicant->dob_eng  }} </span></span> 
                                       </div>
                                       <div class="col-lg-6" style="flex: 0 0 50%; max-width: 50%;" >
                                        <span>Citizenship No :  <span style="font-weight: 700; text-transform: capitalize;">{{ $applicant->citizenship_number  }} </span></span> 
                                       </div>
                                    </div>
                                    <div style="display:flex; line-height: 1.4;" >
                                        <div class="col-lg-6" style="flex: 0 0 50%; max-width: 50%;  text-transform: capitalize;" >
                                            <span>Sex : <span style="font-weight: 700">{{ $applicant->sex  }}</span> </span> 

                                       </div>
                                       <div class="col-lg-6" style="flex: 0 0 50%; max-width: 50%;" >
                                        <span>Blood Group :  <span style="font-weight: 700; text-transform: capitalize;">{{ $applicant->blood_group  }} </span></span> </br>
                                      </div>
                                    </div>
                                  

                                    <span style="line-height: 1.4;">Type of Disability : on the basis of nature  <span style="font-weight: 700 ; text-transform: capitalize;">{{ $applicant->disability_type }}</span> on the basis of Severity:-   <span style="font-weight: 700"> {{ $applicant->incapacitated_base_disability_type }} </span> </span> </br>
                                    <span>Father Name / Mother Name of Guardian :   <span style="font-weight: 700; text-transform: capitalize;">{{ $applicant->guardian }}</span></span> </br>
                                    <span style="line-height: 1.4;">Signature Of Id Holders :  </span> </br>
                                    <span>Approved By :  </span> </br>
                                </div>
                                  <div class="col-lg-9 mt-2" style="flex: 0 0 75%; max-width: 75%; text-align: right;">
                                      <span>Name : - </span> </br>
                                      <span>Signature :-  </span> </br>
                                      <span>Designation :-   </span> </br>
                                      <span>Date :-  </span> </br>
                                  </div>
                                  <div class="col-lg-3 mt-2" style="flex: 0 0 25%; max-width: 25%;">
                                     
                                  </div>
                                  </div>
                                </div>
                                </div>
                            </div>
                            --}}
                           
                           </div>
                       </div>
                   </div>
               </div>
           </div>

</div>
<!-- /.content -->
</div>


<script type="text/javascript">
    
    function printDiv() {
        var x = document.getElementById("printButton");
        if (x.style.display === "none") {
            x.style.display = "block";
       } else {
             x.style.display = "none";
       }
        window.print();
        x.style.display = "block";
    }
</script>
</body>
</html>
