@extends('layouts.frontend')

@section('content')


    <style>
        body {
            font-size: 18px;
        }
        
        
        
        div {
            border-radius: 5px;
        }
        
        
        
        #header {
            z-index: 1;
            height: 40px;
            width: 98%;
            background-color: #668284;
        }
        
        #name {
            float: left;
            margin-left: 20px;
            padding-bottom: 10px;
            font-size: 16px;
            font-family: Verdana, sans-serif;
            color: #ffffff;
        }
        
        #email {
            float: right;
            margin-right: 20px;
            padding-bottom: 10px;
            font-size: 16px;
            font-family: Verdana, sans-serif;
            color: #ffffff;
        }
        
        #contact {
            margin-left: 45%;
            padding-bottom: 10px;
            font-size: 16px;
            font-family: Verdana, sans-serif;
            color: #ffffff;
        }
        
        a:hover {
            font-weight: bold;
        }
        
        .right {
            float: left;
            padding-left: 5px;
            height: auto;
            width: 99%;
        }
        
        #footer {
            height: 40px;
            clear: both;
            position: relative;
            background-color: #C1E3E1;
        }
        
        h3 {}
        
        #job-responsibilities {
            padding: 1px;
        }
        
        .job-title {
            font-weight: bold;
        }
        
        table {
            width: 100%;
        }
        
        td {
            padding: 1px;
        }
        
        #course-name {
            font-weight: bold;
        }
        
        #company-name {
            height: 2px;
            text-decoration: underline;
        }
        
        #job-title {
            height: 5px;
        }
        
        .job-duration {
            float: right;
        }
        
        #heading {
            font-weight: bold;
        }
    </style>




    <div class="container">
        
        



        <div class="header">
            
        <div style="text-align: center">
            আপনার আবেদনটি সফল ভাবে সম্পন্ন হয়েছে।
            <div class="col-md-12">
                            <a type="button" href="{{ url('download_pdf/'.$app_id) }}" class="btn btn-success">Download PDF</a>
                        </div>
        </div>
        
        <br>
        
        <hr>

            <table>
                <tr>
                    <td style="width: 50%">
                        <img src="https://seeklogo.com/images/G/govt-bangladesh-logo-D1143C363F-seeklogo.com.png" height="50px" alt="logo">
                    </td>
                    <td>
                        <span style="float: right">
                            Application Id: {{ $general_info->application_no }}
                        </span>
                    </td>

                </tr>
            </table>



        </div>


        <div class="right">

            <h3>সাধারণ তথ্য</h3>
            <hr>

            <table style="margin: 12px 0px">



                <tr>
                    <td style="width: 25%;">
                        <img src="{{ asset('uploads/profile/'.$document->profile) }}" width="120px" height="120px">
                    </td>
                    <td>
                        
                        <p>
                            <ul>
                                <li>নাম: {{ $general_info->name }}</li>
                                <li>জন্ম তারিখ: {{ $general_info->brid }}</li>
                                <li>জাতীয় পরিচয়পত্র নম্বর: {{ $general_info->nid }}</li>
                                <li>পিতার নাম: {{ $general_info->father_name }}</li>
                                <li>মাতার নাম: {{ $general_info->mother_name }}</li>
                                <li>জন্ম তারিখ: {{ $general_info->dob }}</li>
                            </ul>
                        </p>
                    </td>

                    <td>
                        

                        <p>
                            <ul>
                                <li>বিভাগ: {{ $general_info->division->division_name }}</li>
                                <li>জেলা: {{ $general_info->district->district_name }}</li>
                                <li>উপজেলা: {{ $general_info->upazila->upazila_name }}</li>
                                <li>ইউনিয়ন: {{ $general_info->union->union_name }}</li>
                                <li>গ্রাম: {{ $general_info->village }}</li>
                            </ul>
                        </p>
                    </td>
                </tr>

            </table>



            <h3>অভিভাবকের আর্থসামাজিক অবস্থা</h3>
            <hr>

            <table>
                <tr>
                    <td width="35%">পারিবারিক অবস্থা</td width="35%">
                    <td>{{ $family_info->familystatus->status_name }}</td>
                </tr>
                <tr>
                    <td width="35%">অভিভাবকের পেশা</td>
                    <td>{{ $family_info->guardian_occupation->occupation_name }}</td>
                </tr>
                <tr>
                    <td width="35%">অভিভাবকের শিক্ষা</td>
                    <td>{{ $family_info->guardian_education }}</td>
                </tr>
                <tr>
                    <td width="35%">অভিভাবকের জমির পরিমাণ</td>
                    <td>{{ $family_info->guardian_land }}</td>
                </tr>
                <tr>
                    <td width="35%">অভিভাবকের বার্ষিক আয়</td>
                    <td>{{ $family_info->guardian_annual_income }}</td>
                </tr>
                <tr>
                    <td width="35%">পরিবারের সদস্য সংখ্যা</td>
                    <td>{{ $family_info->family_member }}</td>
                </tr>

            </table>


            <h3>ভর্তিচ্ছু প্রতিষ্ঠানের তথ্য</h3>
            <hr>

            <table>
                <tr>
                    <td width="35%">ভর্তিচ্ছুক প্রতিষ্ঠানের বিভাগ</td>
                    <td>{{ $educationInstitute_info->division->division_name }}</td>
                </tr>
                <tr>
                    <td width="35%">ভর্তিচ্ছুক প্রতিষ্ঠানের জেলা</td>
                    <td>{{ $educationInstitute_info->district->district_name }}</td>
                </tr>
                <tr>
                    <td width="35%">ভর্তিচ্ছুক প্রতিষ্ঠানের উপজেলা</td>
                    <td>{{ $educationInstitute_info->upazila->upazila_name }}</td>
                </tr>
                <tr>
                    <td width="35%">শিক্ষাস্তর</td>
                    <td>{{ $educationInstitute_info->education_level->level_name }}</td>
                </tr>
                <tr>
                    <td>ভর্তিচ্ছুক শ্রেণি</td>
                    <td>{{ $educationInstitute_info->class_name->class_name }}</td>
                </tr>
                <tr>
                    <td>ভর্তি ইচ্ছুক প্রতিষ্ঠানের নাম</td>
                    <td>{{ $educationInstitute_info->institute_name->institution_name }}</td>
                </tr>
                <tr>
                    <td width="35%">ইআইআইএন নম্বর</td>
                    <td>{{ $educationInstitute_info->institute_name->institution_eiin_no }}</td>
                </tr>
                <tr>
                    <td width="35%">সর্বশেষ পঠিত শ্রেণি</td>
                    <td>{{ $educationInstitute_info->last_study_class->class_name }}</td>
                </tr>
                <tr>
                    <td width="35%">সর্বমোট সর্বশেষ জিপিএ</td>
                    <td>{{ number_format($educationInstitute_info->last_gpa_total,2) }}</td>
                </tr>
                <tr>
                    <td width="35%">সর্বশেষ প্রাপ্ত জিপিএ</td>
                    <td>{{ number_format($educationInstitute_info->last_gpa,2) }}</td>
                </tr>
            </table>

            <h3>শিক্ষার্থী/অভিভাবকের ব্যাংক একাউন্টের তথ্য</h3>
            <hr>

            <table>
                @if(!empty($accountinfo->bank_account_type->account_type))
                <tr>
                    <td width="35%">হিসাবের ধরণ</td>
                    <td>{{ $accountinfo->bank_account_type->account_type }}</td>
                </tr>
                @endif
                
                <tr>
                    <td width="35%">একাউন্টটি কার?</td>
                    <td>{{ $accountinfo->account_owner->owner }}</td>
                </tr>
                <tr>
                    <td width="35%">ব্যাংকের নাম</td>
                    <td>{{ $accountinfo->bank_name->name }}</td>
                </tr>
                
                @if(!empty($accountinfo->district->district_name))
                <tr>
                    <td width="35%">জেলা</td>
                    <td>{{ !empty($accountinfo->district->district_name) ? $accountinfo->district->district_name : '' }}</td>
                </tr>
                @endif
                
                
                @if(!empty($accountinfo->bank_branch->branch_name))
                <tr>
                    <td width="35%">ব্যাংকের শাখা</td>
                    <td>{{ $accountinfo->bank_branch->branch_name }}</td>
                </tr>
                @endif
                
                
                <tr>
                    <td width="35%">একাউন্টের নাম</td>
                    <td>{{ $accountinfo->acc_name }}</td>
                </tr>
                <tr>
                    <td width="35%">একাউন্ট নম্বর</td>
                    <td>{{ $accountinfo->acc_no }}</td>
                </tr>
                <tr>
                    <td width="35%">হিসাবধারীর এনআইডি</td>
                    <td>{{ $accountinfo->account_holder_nid }}</td>
                </tr>
                <tr>
                    <td width="35%">রাউটিং নম্বর</td>
                    <td>{{ $accountinfo->routing_no }}</td>
                </tr>
                <tr>
                    <td width="35%">ইআইআইএন</td>
                    <td>{{ $accountinfo->eiin }}</td>
                </tr>
            </table>

            <table>
                <tr>
                    <td>  <h3> আবেদনকারীর স্বাক্ষর: </h3> </td>
                    <td>
                        <img src="{{ asset('uploads/sign/'.$document->signature) }}" height="80px" width="220px" alt="Signature" />
                    </td>
                </tr>
            </table>




        </div>

    </div>
    
    

@endsection

                        




  