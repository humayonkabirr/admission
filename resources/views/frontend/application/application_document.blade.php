<!-- This is for Student Homepage .This Extends Layouts/Main and Partials/Menu -->

@extends('layouts.frontend')
@section('styles')
<style>
    fieldset.border {
        border: 1px groove #ddd !important;
        padding: 0 1.4em 1.4em 1.4em !important;
        margin: 0 0 1.5em 0 !important;
        -webkit-box-shadow: 0px 0px 0px 0px #000;
        box-shadow: 0px 0px 0px 0px #000;
    }


    legend.border {
        width: inherit;
        padding: 0 10px;
        border-bottom: none;
        background: #060a6b;
        color: #ffffff;
    }


    .panel-default>.panel-heading {
        color: #fffcfc;
        background-color: #2A1562 !important;
        border-color: #ee1616;
        font-size: 20px;
        text-align: center;
    }

    .required:after {
        content: " *";
        color: red;
    }

    .header-note {

        color: red;
        font-weight: bolder;
    }



    .select2 {
        width: 100% !important;

    }
</style>
@endsection

@section('content')

<!-- <div class="content"> -->
<div class="container" style="background: #f6f6f6">
    <div class="row">

        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif




        <div class="col-lg-12">

            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <div class="panel panel-default" style=" 
                color:green;">

                <div class="panel-heading">
                    Essential Document
                </div>

                <div class="panel-body">
                    <p class="header-note"> [*] চিহ্নিত ঘরগুলো অবশ্যই পূরণ করতে হবে। সকল তথ্য ইউনিকোড বাংলায় পূরণ করুন। </p>
                    <form method="POST" action="{{ url('application/document') }}" enctype="multipart/form-data">
                        @csrf
                        <fieldset class="border row">
                            <legend class="border">
                                General Info
                            </legend>

                            <div class=" col col-md-6">
                                <label class="form-check-label" for="exampleCheck1">Name</label>
                                <input type="text" class="form-control" value="{{ $general_info->name }}" disabled>
                            </div>

                            <div class=" col col-md-6">
                                <label class="form-check-label" for="exampleCheck1">NID</label>
                                <input type="text" class="form-control" value="{{ $general_info->nid }}" disabled>
                            </div>



                            <div class=" col col-md-6">
                                <label class="form-check-label" for="exampleCheck1">Application Id</label>
                                <input type="text" class="form-control" value="{{ $general_info->application_no }}" disabled>
                            </div>


                            <div class=" col col-md-6">
                                <label class="form-check-label" for="exampleCheck1">Birth Date</label>
                                <input type="text" class="form-control" value="{{ $general_info->dob }}" disabled>
                            </div>

                            <div class=" col col-md-6">
                                <label class="form-check-label" for="exampleCheck1">Birth Id</label>
                                <input type="text" class="form-control" value="{{ $general_info->brid }}" disabled>
                            </div>

                            <div class=" col col-md-6">
                                <label class="form-check-label" for="exampleCheck1">Father's Name</label>
                                <input type="text" class="form-control" value="{{ $general_info->father_name }}" disabled>
                            </div>

                            <div class=" col col-md-6">
                                <label class="form-check-label" for="exampleCheck1">Father's NID</label>
                                <input type="text" class="form-control" value="{{ $general_info->father_nid }}" disabled>
                            </div>

                            <div class=" col col-md-6">
                                <label class="form-check-label" for="exampleCheck1">Mother's Name</label>
                                <input type="text" class="form-control" value="{{ $general_info->mother_name }}" disabled>
                            </div>

                            <div class=" col col-md-6">
                                <label class="form-check-label" for="exampleCheck1">Mother's NID</label>
                                <input type="text" class="form-control" value="{{ $general_info->mother_nid }}" disabled>
                            </div>

                            <div class=" col col-md-6">
                                <label class="form-check-label" for="exampleCheck1">Division</label>
                                <input type="text" class="form-control" value="{{ $general_info->division->division_name }}" disabled>
                            </div>

                            <div class=" col col-md-6">
                                <label class="form-check-label" for="exampleCheck1">District</label>
                                <input type="text" class="form-control" value="{{ $general_info->district->district_name }}" disabled>
                            </div>

                            <div class=" col col-md-6">
                                <label class="form-check-label" for="exampleCheck1">Upazila</label>
                                <input type="text" class="form-control" value="{{ $general_info->upazila->upazila_name }}" disabled>
                            </div>

                            <div class=" col col-md-6">
                                <label class="form-check-label" for="exampleCheck1">Union</label>
                                <input type="text" class="form-control" value="{{ $general_info->union->union_name }}" disabled>
                            </div>

                            <div class=" col col-md-6">
                                <label class="form-check-label" for="exampleCheck1">Village</label>
                                <input type="text" class="form-control" value="{{ $general_info->village }}" disabled>
                            </div>

                        </fieldset>


                        <fieldset class="border">
                            <legend class="border">
                                অভিভাবকের আর্থসামাজিক অবস্থা
                            </legend>
                            <div class="form-row">
                                <div class="col-md-6 {{ $errors->has('familystatus') ? 'has-error' : '' }}">
                                    <label class="" for="familystatus_id">{{ trans('cruds.familyInfo.fields.familystatus') }}</label>
                                    <input type="text" class="form-control" value="{{ $family_info->familystatus->status_name }}" disabled>
                                </div>
                                <div class="col-md-6 {{ $errors->has('guardian_occupation') ? 'has-error' : '' }}">
                                    <label class="" for="guardian_occupation_id">{{ trans('cruds.familyInfo.fields.guardian_occupation') }}</label>
                                    <input type="text" class="form-control" value="{{ $family_info->guardian_occupation->occupation_name }}" disabled>
                                </div>
                                <div class="col-md-6 {{ $errors->has('guardian_education') ? 'has-error' : '' }}">
                                    <label class="">{{ trans('cruds.familyInfo.fields.guardian_education') }}</label>
                                    <input type="text" class="form-control" value="{{ $family_info->guardian_education }}" disabled>
                                </div>
                                <div class="col-md-6 {{ $errors->has('guardian_land') ? 'has-error' : '' }}">
                                    <label class="" for="guardian_land">{{ trans('cruds.familyInfo.fields.guardian_land') }}</label>
                                    <input type="text" class="form-control" value="{{ $family_info->guardian_land }}" disabled>
                                </div>
                                <div class="col-md-6 {{ $errors->has('guardian_annual_income') ? 'has-error' : '' }}">
                                    <label class="" for="guardian_annual_income">{{ trans('cruds.familyInfo.fields.guardian_annual_income') }}</label>
                                    <input type="text" class="form-control" value="{{ $family_info->guardian_annual_income }}" disabled>
                                </div>

                                <div class="col-md-6 {{ $errors->has('family_member') ? 'has-error' : '' }}">
                                    <label class="" for="family_member">{{ trans('cruds.familyInfo.fields.family_member') }}</label>
                                    <input type="text" class="form-control" value="{{ $family_info->family_member }}" disabled>
                                </div>

                            </div>

                        </fieldset>

                        <fieldset class="border">
                            <legend class="border">ভর্তিচ্ছু প্রতিষ্ঠানের তথ্য</legend>

                            <div class="form-row">


                                <div class="col-md-6 {{ $errors->has('institute_division') ? 'has-error' : '' }}">
                                    <label class="" for="institute_division">{{ trans('cruds.educationInstituteInfo.fields.institute_division') }}</label>
                                    <input type="text" class="form-control" value="{{ $educationInstitute_info->division->division_name }}" disabled>
                                </div>

                                <div class="col-md-6 {{ $errors->has('institute_district') ? 'has-error' : '' }}">
                                    <label class="" for="institute_district">{{ trans('cruds.educationInstituteInfo.fields.institute_district') }}</label>
                                    <input type="text" class="form-control" value="{{ $educationInstitute_info->district->district_name }}" disabled>
                                </div>
                                <div class="col-md-6 {{ $errors->has('institute_upazila') ? 'has-error' : '' }}">
                                    <label class="" for="institute_upazila">{{ trans('cruds.educationInstituteInfo.fields.institute_upazila') }}</label>

                                    <input type="text" class="form-control" value="{{ $educationInstitute_info->upazila->upazila_name }}" disabled>
                                </div>
                                <div class="col-md-6 {{ $errors->has('education_level') ? 'has-error' : '' }}">
                                    <label class="" for="education_level_id">{{ trans('cruds.educationInstituteInfo.fields.education_level') }}</label>
                                    <input type="text" class="form-control" value="{{ $educationInstitute_info->education_level->level_name }}" disabled>
                                </div>
                                <div class="col-md-6 {{ $errors->has('class_name') ? 'has-error' : '' }}">
                                    <label class="" for="class_name_id">{{ trans('cruds.educationInstituteInfo.fields.class_name') }}</label>
                                    <input type="text" class="form-control" value="{{ !empty($educationInstitute_info->class_name->class_name) ? $educationInstitute_info->class_name->class_name : '' }}" disabled>
                                </div>
                                <div class="col-md-6{{ $errors->has('institute_name') ? 'has-error' : '' }}">
                                    <label class="" for="institute_name_id">{{ trans('cruds.educationInstituteInfo.fields.institute_name') }}</label>
                                    <input type="text" class="form-control" value="{{ $educationInstitute_info->institute_name->institution_name }}" disabled>
                                </div>
                                <div class="col-md-6 {{ $errors->has('eiin') ? 'has-error' : '' }}">
                                    <label class="" for="eiin_id">{{ trans('cruds.educationInstituteInfo.fields.eiin') }}</label>
                                    <input type="text" class="form-control" value="{{ $educationInstitute_info->institute_name->institution_eiin_no }}" disabled>
                                </div>
                                <div class="col-md-6 {{ $errors->has('last_study_class') ? 'has-error' : '' }}">
                                    <label class="" for="last_study_class_id">{{ trans('cruds.educationInstituteInfo.fields.last_study_class') }}</label>
                                    <input type="text" class="form-control" value="{{ !empty($educationInstitute_info->last_study_class->class_name) ? $educationInstitute_info->last_study_class->class_name : '' }}" disabled>
                                </div>
                                <div class="col-md-6 {{ $errors->has('last_gpa_total') ? 'has-error' : '' }}">
                                    <label class="" for="last_gpa_total">{{ trans('cruds.educationInstituteInfo.fields.last_gpa_total') }}</label>
                                    <input type="text" class="form-control" value="{{ number_format($educationInstitute_info->last_gpa_total,2) }}" disabled>
                                </div>

                                <div class="col-md-6 {{ $errors->has('last_gpa') ? 'has-error' : '' }}">
                                    <label class="" for="last_gpa">{{ trans('cruds.educationInstituteInfo.fields.last_gpa') }}</label>
                                    <input type="number" class="form-control" value="{{ number_format($educationInstitute_info->last_gpa,2) }}" disabled>
                                </div>


                            </div>
                        </fieldset>

                        <fieldset class="border">
                            <legend class="border">
                                শিক্ষার্থী/অভিভাবকের ব্যাংক একাউন্টের তথ্য
                            </legend>
                            <div class="form-row">

                                @if(!empty($accountinfo->bank_account_type->account_type))
                                <div class="col col-md-6 {{ $errors->has('account_type') ? 'has-error' : '' }}">
                                    <label>{{ trans('cruds.accountInfo.fields.account_type') }}</label>
                                    <input type="text" class="form-control" value="{{ $accountinfo->bank_account_type->account_type }}" disabled>
                                </div>
                                @endif


                                <div class="col col-md-6 {{ $errors->has('bank_account_owner') ? 'has-error' : '' }}">
                                    <label class="">{{ trans('cruds.accountInfo.fields.bank_account_owner') }}</label>
                                    <input type="text" class="form-control" value="{{ $accountinfo->account_owner->owner }}" disabled>
                                </div>

                                <div class="col col-md-6 {{ $errors->has('bank_name') ? 'has-error' : '' }}">
                                    <label class="" for="bank_name_id">{{ trans('cruds.accountInfo.fields.bank_name') }}</label>
                                    <input type="text" class="form-control" value="{{ $accountinfo->bank_name->name }}" disabled>
                                </div>

                                @if(!empty($accountinfo->district->district_name))
                                <div class=" col col-md-6{{ $errors->has('district') ? 'has-error' : '' }}">
                                    <label for="district_id">{{ trans('cruds.accountInfo.fields.district') }}</label>
                                    <input type="text" class="form-control" name="district_id" value="{{ !empty($accountinfo->district->district_name) ? $accountinfo->district->district_name : '' }}" disabled>
                                </div>
                                @endif

                                @if(!empty($accountinfo->bank_branch->branch_name))
                                <div class="col col-md-6 {{ $errors->has('bank_branch') ? 'has-error' : '' }}">
                                    <label for="bank_branch_id">{{ trans('cruds.accountInfo.fields.bank_branch') }}</label>
                                    <input type="text" class="form-control" value="{{ $accountinfo->bank_branch->branch_name }}" disabled>
                                </div>
                                @endif

                                <div class="col col-md-6 {{ $errors->has('acc_name') ? 'has-error' : '' }}">
                                    <label class="" for="acc_name">{{ trans('cruds.accountInfo.fields.acc_name') }}</label>
                                    <input type="text" class="form-control" value="{{ $accountinfo->acc_name }}" disabled>
                                </div>

                                <div class="col col-md-6{{ $errors->has('acc_no') ? 'has-error' : '' }}">
                                    <label class="" for="acc_no">{{ trans('cruds.accountInfo.fields.acc_no') }}</label>
                                    <input type="text" class="form-control" value="{{ $accountinfo->acc_no }}" disabled>
                                </div>
                                <div class="col col-md-6 {{ $errors->has('account_holder_nid') ? 'has-error' : '' }}">
                                    <label for="account_holder_nid">{{ trans('cruds.accountInfo.fields.account_holder_nid') }}</label>
                                    <input type="text" class="form-control" value="{{ $accountinfo->account_holder_nid }}" disabled>
                                </div>

                                <div class="col col-md-6 {{ $errors->has('routing_no') ? 'has-error' : '' }}">
                                    <label class="" for="routing_no_id">{{ trans('cruds.accountInfo.fields.routing_no') }}</label>
                                    <input type="text" class="form-control" value="{{ $accountinfo->routing_no }}" disabled>
                                </div>

                                <div class="col col-md-6{{ $errors->has('eiin') ? 'has-error' : '' }}">
                                    <label class="" for="eiin">{{ trans('cruds.accountInfo.fields.eiin') }}</label>
                                    <input type="text" class="form-control" value="{{ $accountinfo->eiin }}" disabled>
                                </div>

                            </div>
                        </fieldset>




                        <fieldset class="border row">
                            <legend class="border">
                                প্রয়োজনীয় কাগজপত্রের ছবি/ স্ক্যানকপি
                            </legend>

                            @if(count($errors) > 0)
                            @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                            @endif

                            <input type="hidden" class="form-control" name="user_id" value="{{ $user_id }}">
                            <input type="hidden" class="form-control" name="app_number_id" value="{{ $general_info->id }}">

                            <div class=" col col-md-4 my-2">
                                <label class="form-check-label" for="profile">ছবি আপলোড করুন</label>
                                <br><img id="blah1" onchange="validateMultipleImage('blah1')" alt="image" src="" height="180px" width="180px" onerror="this.onerror=null;this.src='https://www.jamiemaison.com/creating-a-simple-text-editor/placeholder.png';" required />
                                <br><input type="file" class="mt-2" name="profile" onchange="document.getElementById('blah1').src = window.URL.createObjectURL(this.files[0]); show(this)" accept=".jfif,.jpg,.jpeg,.png,.gif" required>
                                @if($errors->has('profile'))
                                <span class="help-block" role="alert">{{ $errors->first('profile') }}</span>
                                @endif


                            </div>

                            <div class=" col col-md-4  my-2">
                                <label class="form-check-label" for="sign">স্বাক্ষর আপলোড করুন</label>
                                <br><img id="blah2" onchange="check()" alt="image" src="" height="80px" width="220px" onerror="this.onerror=null;this.src='https://www.jamiemaison.com/creating-a-simple-text-editor/placeholder.png';" required />
                                <br><input type="file" class="mt-2" name="sign" onchange="document.getElementById('blah2').src = window.URL.createObjectURL(this.files[0]); show(this)" accept=".jfif,.jpg,.jpeg,.png,.gif" required>

                            </div>

                            <div class=" col col-md-4  my-2">
                                <label class="form-check-label" for="brid">জন্ম নিবন্ধন আপলোড করুন</label>
                                <br><img id="blah3" onchange="validateMultipleImage('blah3')" alt="image" src="" height="180px" width="180px" onerror="this.onerror=null;this.src='https://www.jamiemaison.com/creating-a-simple-text-editor/placeholder.png';" required />
                                <br><input type="file" class="mt-2" name="brid" onchange="document.getElementById('blah3').src = window.URL.createObjectURL(this.files[0]); show(this)" accept=".jfif,.jpg,.jpeg,.png,.gif" required>

                            </div>

                            <div class=" col col-md-4  my-2">
                                <label class="form-check-label" for="father_nid">পিতার জাতীয় পরিচয়পত্র আপলোড করুন</label>
                                <br><img id="blah4" onchange="validateMultipleImage('blah4')" alt="image" src="" height="180px" width="180px" onerror="this.onerror=null;this.src='https://www.jamiemaison.com/creating-a-simple-text-editor/placeholder.png';" required />
                                <br><input type="file" class="mt-2" name="father_nid" onchange="document.getElementById('blah4').src = window.URL.createObjectURL(this.files[0]); show(this)" accept=".jfif,.jpg,.jpeg,.png,.gif" required>

                            </div>

                            <div class=" col col-md-4  my-2">
                                <label class="form-check-label" for="testimonial">শিক্ষা প্রতিষ্ঠানের প্রত্যয়নপত্র</label>
                                <br><img id="blah5" onchange="validateMultipleImage('blah5')" alt="image" src="" height="180px" width="180px" onerror="this.onerror=null;this.src='https://www.jamiemaison.com/creating-a-simple-text-editor/placeholder.png';" required />
                                <br><input type="file" class="mt-2" name="testimonial" onchange="document.getElementById('blah5').src = window.URL.createObjectURL(this.files[0]); show(this)" accept=".jfif,.jpg,.jpeg,.png,.gif" required>

                            </div>

                            <!-- <div class=" col col-md-4  my-2">
                                <label class="form-check-label" for="testimonial">সরকারী প্রতিষ্ঠানের প্রত্যয়নপত্র [যদি থাকে]</label>
                                <br><img id="blah5" onchange="validateMultipleImage('blah5')" alt="image" src="" height="180px" width="180px" onerror="this.onerror=null;this.src='https://www.jamiemaison.com/creating-a-simple-text-editor/placeholder.png';" required />
                                <br><input type="file" class="mt-2" name="testimonial" onchange="document.getElementById('blah5').src = window.URL.createObjectURL(this.files[0]); show(this)" accept=".jfif,.jpg,.jpeg,.png,.gif" required>

                            </div> -->




                        </fieldset>



                </div>

            </div>


            <div class="col-md-12">
                <button class="btn btn-danger pull-right" type="submit">
                    <i class="fas fa-save">&nbsp; </i>{{ trans('global.save') }}
                </button>
                &nbsp;

                </form>

                <form action="{{ url('/application/edit') }}" method="post">
                    @csrf
                    <input type="hidden" name="app_id" value="{{ $general_info->application_no }}">
                    <button type="submit" class="btn btn-warning pull-left"><i class="fas fa-edit">&nbsp; </i> Edit</button>
                </form>



            </div>



        </div>
    </div>



</div>
</div>


<script type="text/javascript">
    function show(input) {
        debugger;
        var validExtensions = ['jpg', 'png', 'jpeg']; //array of valid extensions
        var fileName = input.files[0].name;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
        if ($.inArray(fileNameExt, validExtensions) == -1) {
            input.type = ''
            input.type = 'file'
            $('#user_img').attr('src', "");
            alert("আপনার আপলোড করা ছবি   " + validExtensions.join(', ') + " ধরণের মধ্যে হতে হবে। ");
        } else {
            if (input.files && input.files[0]) {
                var filerdr = new FileReader();
                filerdr.onload = function(e) {
                    $('#user_img').attr('src', e.target.result);
                }
                filerdr.readAsDataURL(input.files[0]);
            }
        }
    }
</script>


@endsection


@section('scripts')

<script src="{{ asset('js/locationAjax.js') }}"></script>
<script src="{{ asset('js/instituteAjax.js') }}"></script>
<script src="{{ asset('js/levelClassAjax.js') }}"></script>
<script src="{{ asset('js/bankBranchAjax.js') }}"></script>
<script src="{{ asset('js/util.js') }}"></script>


</script>

@endsection