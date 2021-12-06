<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-size: 18px;


        }


        .watermark {
            content: "PMEAT";

            background-size: 100%;
        }

        hr {
            margin-top: -13px;
        }

        div {
            border-radius: 5px;
        }

        .container {
            padding: 0px 1px;
            /* background-color: #668284; */

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


    <title></title>
</head>

<body>

    <div class="container">

        <div class="header">

            <table>
                <tr>
                    <td style="width: 50%">
                        <img src="{{ url('/public/images/aams-logo-big.png') }}" alt="Image" height="50px" />
                    </td>
                    <td>
                        <span style="float: right ; align:right;">
                            আবেদন নম্বর: {{ $general_info->application_no }}
                        </span>
                    </td>

                </tr>
            </table>



        </div>
        <div style="text-align:center; color:black; font-size:20px; font-weight:bolder;  text-decoration:underline;">
            ভর্তি সহায়তার আবেদন
        </div>
        <div class="right">
            <h3>সাধারণ তথ্য</h3>
            <hr>

            <table style="margin: 12px 0px">



                <tr>
                    <td style="width: 25%;">
                        <img src="{{ asset('uploads/profile/' . $document->profile) }}" width="120px" height="120px"> <br>
                        <span style="position:absolute;  float: right; font-size:8px; ">আবেদনের তারিখঃ {{ $general_info->created_at }}</span>
                    </td>
                    <td>
                        <p>
                        <ul>
                            <li>শিক্ষার্থীর নাম: {{ $general_info->name }}</li>
                            <li>জন্ম নিবন্ধন নম্বর: {{ $general_info->brid }}</li>
                            <li>জাতীয় পরিচয়পত্র নম্বর: {{ $general_info->nid }}</li>
                            <li>জন্ম তারিখ: {{ $general_info->dob }}, বয়স: 0{{ $general_info->age }} বছর</li>
                            <li>পিতার নাম: {{ $general_info->father_name }}</li>
                            <li>মাতার নাম: {{ $general_info->mother_name }}</li>
                            @if (!empty($general_info->mother_name))<li>মাতার এনআইডি: {{ $general_info->mother_nid }}</li> @endif
                            @if (!empty($general_info->father_nid))<li>পিতার এনআইডি: {{ $general_info->father_nid }}</li> @endif


                        </ul>
                        </p>
                    </td>

                    <td>
                        <p>
                        <ul>
                            <li>লিঙ্গ: {{ $general_info->gender }}</li>


                            <U>বর্তমান ঠিকানা</U>
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

            <div class="watermark">

                <h3>অভিভাবকের আর্থসামাজিক অবস্থা</h3>
                <hr>

                <table>

                    <tr>
                        <td style="width: 60%">
                            <ul>
                                <li>কোটা: {{ $family_info->familystatus->status_name }}</li>
                                <li>অভিভাবকের পেশা: {{ $family_info->guardian_occupation->occupation_name }}</li>
                                <li>অভিভাবকের জমির পরিমাণ: {{ $family_info->guardian_land }}শতাংশ </li>
                            </ul>
                        </td>
                        <td>
                            <ul>
                                <li>অভিভাবকের শিক্ষাগত যোগ্যতা: {{ $family_info->guardian_education }}</li>
                                <li>অভিভাবকের বার্ষিক আয়: {{ $family_info->guardian_annual_income }} টাকা</li>
                                <li>পরিবারের সদস্য সংখ্যা: {{ $family_info->family_member }}জন</li>
                            </ul>
                        </td>

                    </tr>


                </table>


                <h3>ভর্তিচ্ছু প্রতিষ্ঠানের তথ্য</h3>
                <hr>

                <table>

                    <tr>
                        <td style="width: 60%">
                            <ul>
                                <li>ভর্তিচ্ছুক প্রতিষ্ঠানের বিভাগ:
                                    {{ $educationInstitute_info->division->division_name }}
                                </li>
                                <li>ভর্তিচ্ছুক প্রতিষ্ঠানের জেলা:
                                    {{ $educationInstitute_info->district->district_name }}
                                </li>
                                <li>ভর্তিচ্ছুক প্রতিষ্ঠানের উপজেলা:
                                    {{ $educationInstitute_info->upazila->upazila_name }}
                                </li>
                                <li>ভর্তি ইচ্ছুক প্রতিষ্ঠানের নাম:
                                    {{ $educationInstitute_info->institute_name->institution_name }}
                                    ({{ $educationInstitute_info->institute_name->institution_eiin_no }})
                                </li>
                            </ul>

                        </td>
                        <td>
                            <ul>
                                <li>শিক্ষাস্তর: {{ $educationInstitute_info->education_level->level_name }}</li>
                                <li>ভর্তিচ্ছুক শ্রেণি: {{ $educationInstitute_info->class_name->class_name }}</li>
                                <li>সর্বশেষ পঠিত শ্রেণি: {{ $educationInstitute_info->last_study_class->class_name }}
                                </li>
                                <li>সর্বমোট সর্বশেষ জিপিএ:
                                    {{ number_format($educationInstitute_info->last_gpa, 2) }}/{{ number_format($educationInstitute_info->last_gpa_total, 2) }}
                                </li>
                            </ul>
                        </td>
                    </tr>

                </table>

            </div>
            <h3>শিক্ষার্থী/অভিভাবকের ব্যাংক একাউন্টের তথ্য</h3>
            <hr>

            <table>
                @if (!empty($accountinfo->banking_type->banking_type_id))
                <tr>
                    <td width="35%">ব্যাংকিং ধরণ</td>
                    <td>{{ $accountinfo->banking_type->banking_type_id }}</td>
                </tr>
                @endif

                <tr>
                    <td width="35%">হিসাবধারীর সাথে সম্পর্ক </td>
                    <td>{{ $accountinfo->account_owner->owner }}</td>
                </tr>
                <tr>
                    <td width="35%">ব্যাংকের নাম</td>
                    <td>{{ $accountinfo->bank_name->name }}</td>
                </tr>

                @if (!empty($accountinfo->district->district_name))
                <tr>
                    <td width="35%">জেলা</td>
                    <td>{{ !empty($accountinfo->district->district_name) ? $accountinfo->district->district_name : '' }}
                    </td>
                </tr>
                @endif


                @if (!empty($accountinfo->bank_branch->branch_name))
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

            </table>

            <table>
                <tr>
                    <td>
                        <h3> আবেদনকারীর স্বাক্ষর: </h3>
                    </td>
                    <td>
                        <img src="{{ asset('uploads/sign/' . $document->signature) }}" height="80px" width="220px" alt="Signature" />
                    </td>
                </tr>
            </table>
        </div>
    </div>


    <footer style="font-size:5px">
        প্রিন্টের তারিখঃ {{ date('Y-m-d H:i:s') }}

    </footer>

</body>

</html>