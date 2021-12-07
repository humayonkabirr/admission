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

    .container .row {
        background: #ffffff;
        box-shadow: 1px 1px 13px #938e8eb5;
        padding: 15px 0px 15px 0px;
    }
</style>
@endsection

@section('content')

<!-- <div class="content"> -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default" style="
                color:green;">

                <div class="panel-heading">

                    ভর্তি সহায়তার আবেদন ফরম
                </div>
                <div class="panel-body">
                    <p class="header-note"> [*] চিহ্নিত ঘরগুলো অবশ্যই পূরণ করতে হবে। সকল তথ্য ইউনিকোড বাংলায় পূরণ করুন। </p>
                    <form method="POST" action="{{ route('frontend.application.store') }}" enctype="multipart/form-data" class="was-validated" oninput='mother_nid.setCustomValidity(mother_nid.value == father_nid.value ? "NID will not match." : ""),
                    last_gpa.setCustomValidity(last_gpa_total.value < last_gpa.value ? "Invalid Input" : "")' onchange='last_gpa_total.setCustomValidity(last_gpa_total.value < last_gpa.value ? "Invalid Input" : "")' autocomplete="off">
                        @csrf
                        <fieldset class="border">
                            <legend class="border">
                                সাধারণ তথ্য
                            </legend>
                            <div class=" form-row">

                                <div class="col-md-6 {{ $errors->has('circular') ? 'has-error' : '' }}">
                                    <label class="required" for="circular_id">{{ trans('cruds.generalInfo.fields.circular') }}</label>
                                    <select class="form-control select2" name="circular_id" id="circular_id" required>

                                        @if(!empty($circulars))

                                        @foreach($circulars as $id => $entry)
                                        <option value="{{ $entry->id }}" {{ old('circular_id') == $entry->id ? 'selected' : '' }}>{{ $entry->cirucular_name."- (" . $entry->reference_number.")" }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    @if($errors->has('circular'))
                                    <span class="help-block" role="alert">{{ $errors->first('circular') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.generalInfo.fields.circular_helper') }}</span>
                                    <div class="invalid-feedback">{{trans('global.select_something')}}</div>
                                </div>
                                <div class="col-md-6{{ $errors->has('brid') ? 'has-error' : '' }}">
                                    <label class="required" for="brid">{{ trans('cruds.generalInfo.fields.brid') }}</label>
                                    <input class="form-control" type="text" name="brid" id="brid" value="{{$userData->brid}}" minlength="10" maxlength="10" pattern="(.){10,17}" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) ||  event.charCode == 46 || event.charCode == 0 " onKeyDown="if (this.value.length==10 && event.keyCode!=8) return false" required placeholder="১৭ ডিজিটের জন্ম সনদ নম্বর দিন " readonly>

                                    @if($errors->has('brid'))
                                    <span class="help-block" role="alert">{{ $errors->first('brid') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.generalInfo.fields.brid_helper') }}</span>
                                    <div class="invalid-feedback">{{trans('global.write_something')}}</div>
                                </div>


                                <div class="col-md-6 {{ $errors->has('nid') ? 'has-error' : '' }}">
                                    <label for="nid">{{ trans('cruds.generalInfo.fields.nid') }} [যদি থাকে]</label>
                                    <input class="form-control" type="text" name="nid" id="nid" value="{{$userData->nid?$userData->nid:''}}" minlength="10" maxlength="17" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) ||  event.charCode == 46 || event.charCode == 0 " onKeyDown="if (this.value.length==17 && event.keyCode!=8) return false" placeholder="১০  অথবা ১৭ ডিজিটের জাতীয় পরিচয়পত্র নম্বর দিন ">
                                    @if($errors->has('nid'))
                                    <span class="help-block" role="alert">{{ $errors->first('nid') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.generalInfo.fields.nid_helper') }}</span>

                                </div>

                                <div class="col-md-6{{ $errors->has('stu_name') ? 'has-error' : '' }}">
                                    <label class="required" for="stu_name">{{ trans('cruds.generalInfo.fields.name') }}</label>
                                    <input class="form-control" type="text" name="stu_name" id="stu_name" value="{{   $userData->name  }}" readonly required>
                                    @if($errors->has('stu_name'))
                                    <span class="help-block" role="alert">{{ $errors->first('stu_name') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.generalInfo.fields.name_helper') }}</span>
                                    <div class="invalid-feedback">{{trans('global.write_something')}}</div>
                                </div>


                                <div class="col-md-6 {{ $errors->has('father_name') ? 'has-error' : '' }}">
                                    <label class="required" for="father_name">{{ trans('cruds.generalInfo.fields.father_name') }}</label>
                                    <input class="form-control" type="text" name="father_name" id="father_name" value="{{ old('father_name', '') }}" onkeypress="return (event.charCode >= 231 ||  event.charCode == 46 || event.charCode == 32||event.charCode == 0)" onKeyDown="if (this.value.length==50 && event.keyCode!=8 && event.keyCode>=231) return false" required>
                                    @if($errors->has('father_name'))
                                    <span class="help-block" role="alert">{{ $errors->first('father_name') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.generalInfo.fields.father_name_helper') }}</span>

                                    <div class="invalid-feedback">{{trans('global.write_something')}}</div>
                                </div>


                                <div class="col-md-6{{ $errors->has('father_nid') ? 'has-error' : '' }}">
                                    <label for="father_nid">{{ trans('cruds.generalInfo.fields.father_nid') }}</label>
                                    <input class="form-control numeric" type="text" name="father_nid" id="father_nid" value="{{ old('father_nid', '') }}" step="1" minlength="10" maxlength="17" placeholder="১০ অথবা ১৭ ডিজিটের জাতীয় পরিচয়পত্র নম্বর ">
                                    @if($errors->has('father_nid'))
                                    <span class="help-block" role="alert">{{ $errors->first('father_nid') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.generalInfo.fields.father_nid_helper') }}</span>

                                </div>

                                <div class="col-md-6 {{ $errors->has('mother_name') ? 'has-error' : '' }}">
                                    <label class="required" for="mother_name">{{ trans('cruds.generalInfo.fields.mother_name') }}</label>
                                    <input class="form-control" type="text" name="mother_name" id="mother_name" value="{{ old('mother_name', '') }}" onkeypress="return (event.charCode >= 231 ||  event.charCode == 46 || event.charCode == 32||event.charCode == 0)" onKeyDown="if (this.value.length==50 && event.keyCode!=8 && event.keyCode>=231) return false" required>
                                    @if($errors->has('mother_name'))
                                    <span class="help-block" role="alert">{{ $errors->first('mother_name') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.generalInfo.fields.mother_name_helper') }}</span>

                                    <div class="invalid-feedback">{{trans('global.write_something')}}</div>
                                </div>


                                <div class="col-md-6 {{ $errors->has('mother_nid') ? 'has-error' : '' }}">
                                    <label for="mother_nid">{{ trans('cruds.generalInfo.fields.mother_nid') }}</label>
                                    <input class="form-control numeric" type="text" name="mother_nid" id="mother_nid" value="{{ old('mother_nid', '') }}" minlength="10" maxlength="17" oninvalid="this.setCustomValidity('দয়া করে এনআইডি পরিবর্তন করুন')" oninput='setCustomValidity(mother_nid.value == father_nid.value)' onKeyDown="if (this.value.length==17 && event.keyCode!=8) return false" placeholder="১০ অথবা ১৭ ডিজিটের জাতীয় পরিচয়পত্র নম্বর">
                                    @if($errors->has('mother_nid'))
                                    <span class="help-block" role="alert">{{ $errors->first('mother_nid') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.generalInfo.fields.mother_nid_helper') }}</span>
                                    <div class="invalid-feedback">পিতা ও মাতার জাতীয় পরিচয়পত্র নম্বর ভিন্ন হতে হবে/ অন্তত যেকোন একজনের এনআইডি লিখুন</div>
                                </div>


                                <div class="col-md-6 {{ $errors->has('dob') ? 'has-error' : '' }}">
                                    <label class="required" for="dob">{{ trans('cruds.generalInfo.fields.dob') }}</label>
                                    <input class="form-control" type="date" name="dob" id="dob2" value="{{ old('dob') }}" min='1899-01-01' max='2000-13-13' required>

                                    @if($errors->has('dob'))
                                    <span class="help-block" role="alert">{{ $errors->first('dob') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.generalInfo.fields.dob_helper') }}</span>
                                    <div class="invalid-feedback">{{trans('global.write_something')}}</div>
                                </div>




                                @php $district = App\Models\District::where('division_name_id',old('division_id'))->get();
                                @endphp
                                @php $upazila = App\Models\Upazila::where('district_id',old('districts_id'))->get();
                                @endphp
                                @php $union = App\Models\Union::where('upazila_id',old('upazila_id'))->get();
                                @endphp


                                <div class="col-md-6 {{ $errors->has('division') ? 'has-error' : '' }}">
                                    <label class="required" for="division_id">{{ trans('cruds.generalInfo.fields.division') }}</label>
                                    <select class="form-control select2" name="division_id" id="division_id" required>
                                        <option value="">{{ trans('global.pleaseSelect') }}</option>
                                        @foreach($divisions as $id => $entry)
                                        <option value="{{ $entry->id }}" {{ old('division_id') == $entry->id ? 'selected' : ''}}>{{ $entry->division_name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('division'))
                                    <span class="help-block" role="alert">{{ $errors->first('division') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.generalInfo.fields.division_helper') }}</span>
                                    <div class="invalid-feedback">{{trans('global.select_something')}}</div>
                                </div>

                                <div class="col-md-6 {{ $errors->has('district') ? 'has-error' : '' }}">
                                    <label class="required" for="district_id">{{ trans('cruds.generalInfo.fields.district') }}</label>
                                    <select class="form-control select2" name="district_id" id="district_id" required>
                                        <option id="nullValueOption" value=''> {{ trans('global.pleaseSelect') }}
                                        </option>
                                        @if (old('division_id'))
                                        @foreach ($district as $data)
                                        <option value='{{ $data->id }}' {{ $data->id == old('districts_id') ? 'selected' : '' }}>
                                            {{ $data->district_name }}
                                        </option>
                                        @endforeach
                                        @endif


                                    </select>
                                    @if ($errors->has('district'))
                                    <span class="help-block" role="alert">{{ $errors->first('district') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.generalInfo.fields.district_helper') }}</span>
                                </div>


                                <div class="col-md-6 {{ $errors->has('division') ? 'has-error' : '' }}">
                                    <label class="required" for="mcu_type">পৌরসভা/কর্পোরেশন/উপজেলা নির্বাচন করুন</label>
                                    <select class="form-control select2" name="mcu_type" id="mcu_type" required>
                                        <option id="nullValueOption" value='' selected='selected'>
                                            {{ trans('global.pleaseSelect') }}
                                        </option>
                                        @foreach ($mcu_types as $key => $value)
                                        <option value='{{$value->id}}'>{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('division'))
                                    <span class="help-block" role="alert">{{ $errors->first('division') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.generalInfo.fields.division_helper') }}</span>
                                </div>

                                <div class="col-md-6 {{ $errors->has('city_name') ? 'has-error' : '' }}">
                                    <label class="required" for="city_name">সিটি কর্পোরেশন</label>
                                    <select class="form-control select2" name="city_name" id="city_name" required>
                                        <option id="nullValueOption" value="" selected='selected'>{{ trans('global.pleaseSelect') }}</option>

                                    </select>
                                    @if ($errors->has('city_name'))
                                    <span class="help-block" role="alert">{{ $errors->first('city_name') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.generalInfo.fields.division_helper') }}</span>
                                </div>

                                <div class="col-md-6 {{ $errors->has('upazila') ? 'has-error' : '' }}">
                                    <label class="required" for="upazila_id">{{ trans('cruds.generalInfo.fields.upazila') }}/পোরসভা</label>
                                    <select class="form-control select2" name="upazila_id" id="upazila_id" required>

                                        <option id="nullValueOption" value='' selected='selected'>
                                            {{ trans('global.pleaseSelect') }}
                                        </option>
                                        @if (old('division_id'))
                                        @foreach ($upazila as $data)
                                        <option value='{{ $data->id }}' {{ $data->id == old('upazila_id') ? 'selected' : '' }}>
                                            {{ $data->upazila_name }}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>

                                    </select>
                                    @if ($errors->has('upazila'))
                                    <span class="help-block" role="alert">{{ $errors->first('upazila') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.generalInfo.fields.upazila_helper') }}</span>
                                </div>


                                <div class="col-md-6 {{ $errors->has('union') ? 'has-error' : '' }}">
                                    <label class="required" for="union_id">{{ trans('cruds.generalInfo.fields.union') }}/ওয়ার্ড</label>
                                    <select class="form-control select2" name="union_id" id="union_id" required>

                                        <option id="nullValueOption" value='' selected='selected'>
                                            {{ trans('global.pleaseSelect') }}
                                        </option>
                                        @if (old('union_id'))
                                        @foreach ($union as $data)
                                        <option value='{{ $data->id }}' {{ $data->id == old('union_id') ? 'selected' : '' }}>
                                            {{ $data->union_name }}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('union'))
                                    <span class="help-block" role="alert">{{ $errors->first('union') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.generalInfo.fields.union_helper') }}</span>
                                </div>


                                <div class="col-md-6 {{ $errors->has('village') ? 'has-error' : '' }}">
                                    <label class="required" for="village">{{ trans('cruds.generalInfo.fields.village') }}</label>
                                    <input class="form-control" type="text" name="village_id" id="village_id" value="{{ old('village_id', '') }}" onkeypress="return (event.charCode >= 231 ||  event.charCode == 46 || event.charCode == 32||event.charCode == 0)" onKeyDown="if (this.value.length==10 && event.keyCode!=8 && event.keyCode>=231) return false" required>
                                    @if($errors->has('village'))
                                    <span class="help-block" role="alert">{{ $errors->first('village') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.generalInfo.fields.village_helper') }}</span>
                                    <div class="invalid-feedback">{{trans('global.write_something')}}</div>
                                </div>

                            </div>
                        </fieldset>

                        <fieldset class="border">
                            <legend class="border">
                                অভিভাবকের আর্থসামাজিক অবস্থা
                            </legend>
                            <div class="form-row">
                                <div class="col-md-6 {{ $errors->has('familystatus') ? 'has-error' : '' }}">
                                    <label class="required" for="familystatus_id">{{ trans('cruds.familyInfo.fields.familystatus') }}</label>
                                    <select class="form-control select2" name="familystatus_id" id="familystatus_id" required>
                                        <option value="">{{ trans('global.pleaseSelect') }}</option>
                                        @foreach($familystatuses as $entry)
                                        <option value="{{ $entry->id }}" {{ old('familystatus_id') == $entry->id ? 'selected' : '' }}>{{ $entry->status_name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('familystatus'))
                                    <span class="help-block" role="alert">{{ $errors->first('familystatus') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.familyInfo.fields.familystatus_helper') }}</span>
                                    <div class="invalid-feedback">{{trans('global.select_something')}}</div>
                                </div>

                                <div class="col-md-6 {{ $errors->has('guardian_occupation') ? 'has-error' : '' }}">
                                    <label class="required" for="guardian_occupation_id">{{ trans('cruds.familyInfo.fields.guardian_occupation') }}</label>
                                    <select class="form-control select2" name="guardian_occupation_id" id="guardian_occupation_id" required>
                                        @foreach($guardian_occupations as $id => $entry)
                                        <option value="{{ $entry->id }}" {{ old('guardian_occupation_id') == $entry->id ? 'selected' : '' }}>{{ $entry->occupation_name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('guardian_occupation'))
                                    <span class="help-block" role="alert">{{ $errors->first('guardian_occupation') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.familyInfo.fields.guardian_occupation_helper') }}</span>
                                    <div class="invalid-feedback">{{trans('global.select_something')}}</div>
                                </div>

                                <div class="col-md-6 {{ $errors->has('guardian_education') ? 'has-error' : '' }}">
                                    <label class="required">{{ trans('cruds.familyInfo.fields.guardian_education') }}</label>
                                    <select class="form-control" name="guardian_education" id="guardian_education" required>
                                        <option value disabled {{ old('guardian_education', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                        @foreach(App\Models\FamilyInfo::GUARDIAN_EDUCATION_SELECT as $key => $label)
                                        <option value="{{ $key }}" {{ old('guardian_education', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('guardian_education'))
                                    <span class="help-block" role="alert">{{ $errors->first('guardian_education') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.familyInfo.fields.guardian_education_helper') }}</span>
                                    <div class="invalid-feedback">{{trans('global.select_something')}}</div>
                                </div>

                                <div class="col-md-6 {{ $errors->has('guardian_land') ? 'has-error' : '' }}">
                                    <label class="required" for="guardian_land">{{ trans('cruds.familyInfo.fields.guardian_land') }} [শতাংশ]</label>
                                    <input class="form-control numeric" type="text" name="guardian_land" id="guardian_land" value="{{ old('guardian_land', '') }}" placeholder="অভিভাবকের জমির পরিমাণ" step="0.01" max="10.10" onKeyDown="if (this.value.length==5 && event.keyCode!=8) return false" required>
                                    @if($errors->has('guardian_land'))
                                    <span class="help-block" role="alert">{{ $errors->first('guardian_land') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.familyInfo.fields.guardian_land_helper') }}</span>
                                    <div class="invalid-feedback">{{trans('global.write_something')}}</div>
                                </div>


                                <div class="col-md-6 {{ $errors->has('guardian_annual_income') ? 'has-error' : '' }}">
                                    <label class="required" for="guardian_annual_income">{{ trans('cruds.familyInfo.fields.guardian_annual_income') }}</label>
                                    <input class="form-control numeric" type="text" name="guardian_annual_income" id="guardian_annual_income" value="{{ old('guardian_annual_income', '') }}" placeholder="এক বছরে অভিভাবকের আয় কত টাকা " min="1" max="500000" onKeyDown="if (this.value.length==6 && event.keyCode!=8) return false" required>

                                    @if($errors->has('guardian_annual_income'))
                                    <span class="help-block" role="alert">{{ $errors->first('guardian_annual_income') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.familyInfo.fields.family_member_helper') }}</span>
                                    <div class="invalid-feedback">{{trans('global.write_something')}}</div>
                                </div>

                                <div class="col-md-6 {{ $errors->has('family_member') ? 'has-error' : '' }}">
                                    <label class="required" for="family_member">{{ trans('cruds.familyInfo.fields.family_member') }}</label>
                                    <input class="form-control numeric" type="text" name="family_member" id="family_member" value="{{ old('family_member', '') }}" placeholder="পরিবারের সদস্য সংখ্যা" onKeyDown="if (this.value.length==2 && event.keyCode!=8) return false" required>

                                    @if($errors->has('family_member'))
                                    <span class="help-block" role="alert">{{ $errors->first('family_member') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.familyInfo.fields.guardian_annual_income_helper') }}</span>
                                    <div class="invalid-feedback">{{trans('global.write_something')}}</div>
                                </div>

                            </div>

                        </fieldset>

                        <fieldset class="border">
                            <legend class="border">ভর্তিচ্ছু প্রতিষ্ঠানের তথ্য</legend>

                            @php $inst_district = App\Models\District::where('division_name_id',old('institute_division'))->get();
                            @endphp
                            @php $inst_upazila = App\Models\Upazila::where('district_id',old('institute_district'))->get();
                            @endphp

                            <div class="form-row">


                                <div class="col-md-6 {{ $errors->has('institute_division') ? 'has-error' : '' }}">
                                    <label class="required" for="institute_division">{{ trans('cruds.educationInstituteInfo.fields.institute_division') }}</label>
                                    <select class="form-control select2" name="institute_division" id="institute_division" required>
                                        <option value="">{{ trans('global.pleaseSelect') }}</option>
                                        @foreach($divisions as $id => $entry)
                                        <option value="{{ $entry->id }}" {{ old('institute_division') == $entry->id ? 'selected' : '' }}>{{ $entry->division_name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('institute_division'))
                                    <span class="help-block" role="alert">{{ $errors->first('institute_division') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.educationInstituteInfo.fields.institute_division_helper')}}</span>
                                    <div class="invalid-feedback">{{trans('global.select_something')}}</div>
                                </div>

                                <div class="col-md-6 {{ $errors->has('institute_district') ? 'has-error' : '' }}">
                                    <label class="required" for="institute_district">{{ trans('cruds.educationInstituteInfo.fields.institute_district') }}</label>
                                    <select class="form-control select2" name="institute_district" id="institute_district" required>
                                        <option id="nullValueOption" value='' selected='selected'> {{trans('global.pleaseSelect')}}</option>
                                        @if(old('institute_division'))
                                        @foreach ($inst_district as $data)
                                        <option value='{{ $data->id }}' {{ $data->id == old('institute_district') ? 'selected' : '' }}> {{ $data->district_name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    @if($errors->has('institute_district'))
                                    <span class="help-block" role="alert">{{ $errors->first('institute_district') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.educationInstituteInfo.fields.institute_district_helper') }}</span>
                                    <div class="invalid-feedback">{{trans('global.select_something')}}</div>
                                </div>

                                <div class="col-md-6 {{ $errors->has('institute_upazila') ? 'has-error' : '' }}">
                                    <label class="required" for="institute_upazila">{{ trans('cruds.educationInstituteInfo.fields.institute_upazila') }}</label>

                                    <select class="form-control select2" name="institute_upazila" id="institute_upazila" required>
                                        <option id="nullValueOption" value='' selected='selected'> {{trans('global.pleaseSelect')}}</option>
                                        @if(old('institute_district'))
                                        @foreach ($inst_upazila as $data)
                                        <option value='{{ $data->id }}' {{ $data->id == old('institute_upazila') ? 'selected' : '' }}> {{ $data->upazila_name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    @if($errors->has('institute_upazila'))
                                    <span class="help-block" role="alert">{{ $errors->first('institute_upazila') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.educationInstituteInfo.fields.institute_upazila_helper') }}</span>
                                    <div class="invalid-feedback">{{trans('global.select_something')}}</div>
                                </div>


                                <div class="col-md-6 {{ $errors->has('education_level') ? 'has-error' : '' }}">
                                    <label class="required" for="education_level_id">{{ trans('cruds.educationInstituteInfo.fields.education_level') }}</label>
                                    <select class="form-control select2" name="education_level_id" id="education_level_id" required>
                                        <option value="">{{ trans('global.pleaseSelect') }}</option>
                                        @foreach($education_levels as $id => $entry)
                                        <option value="{{ $entry->id }}" {{ old('education_level_id') == $entry->id ? 'selected' : '' }}>{{ $entry->level_name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('education_level'))
                                    <span class="help-block" role="alert">{{ $errors->first('education_level') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.educationInstituteInfo.fields.education_level_helper') }}</span>
                                    <div class="invalid-feedback">{{trans('global.select_something')}}</div>
                                </div>


                                <div class="col-md-6 {{ $errors->has('class_name') ? 'has-error' : '' }}">
                                    <label class="required" for="class_name_id">{{ trans('cruds.educationInstituteInfo.fields.class_name') }}</label>
                                    <select class="form-control select2" name="class_name_id" id="class_name_id" required>
                                        <option id="nullValueOption" value="">{{ trans('global.pleaseSelect') }}</option>
                                    </select>
                                    @if($errors->has('class_name'))
                                    <span class="help-block" role="alert">{{ $errors->first('class_name') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.educationInstituteInfo.fields.class_name_helper') }}</span>
                                    <div class="invalid-feedback">{{trans('global.select_something')}}</div>
                                </div>


                                <div class="col-md-6{{ $errors->has('institute_name') ? 'has-error' : '' }}">
                                    <label class="required" for="institute_name_id">{{ trans('cruds.educationInstituteInfo.fields.institute_name') }}</label>
                                    <select class="form-control select2" name="institute_name_id" id="institute_name_id" required>
                                        <option id="nullValueOption" value='erp' selected='selected'> {{trans('global.pleaseSelect')}}</option>
                                    </select>
                                    @if($errors->has('institute_name'))
                                    <span class="help-block" role="alert">{{ $errors->first('institute_name') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.educationInstituteInfo.fields.institute_name_helper') }}</span>
                                    <div class="invalid-feedback">{{trans('global.select_something')}}</div>
                                </div>


                                <div class="col-md-6 {{ $errors->has('eiin') ? 'has-error' : '' }}" hidden>
                                    <label class="required" for="eiin_id">{{ trans('cruds.educationInstituteInfo.fields.eiin') }}</label>
                                    <input class="form-control" type="text" name="eiin_id" id="eiin_id" value="{{ old('eiin', '') }}" required>
                                    @if($errors->has('eiin'))
                                    <span class="help-block" role="alert">{{ $errors->first('eiin') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.educationInstituteInfo.fields.eiin_helper') }}</span>
                                    <div class="invalid-feedback">{{trans('global.write_something')}}</div>
                                </div>

                                <div class="col-md-6 {{ $errors->has('last_study_class') ? 'has-error' : '' }}">
                                    <label class="required" for="last_study_class_id">{{ trans('cruds.educationInstituteInfo.fields.last_study_class') }}</label>
                                    <select class="form-control select2" name="last_study_class_id" id="last_study_class_id" required>
                                        <option id="nullValueOption" value="">{{ trans('global.pleaseSelect') }}</option>

                                    </select>
                                    @if($errors->has('last_study_class'))
                                    <span class="help-block" role="alert">{{ $errors->first('last_study_class') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.educationInstituteInfo.fields.last_study_class_helper') }}</span>
                                    <div class="invalid-feedback">{{trans('global.select_something')}}</div>
                                </div>


                                <div class="col-md-6 {{ $errors->has('last_gpa_total') ? 'has-error' : '' }}">
                                    <label class="required" for="last_gpa_total">{{ trans('cruds.educationInstituteInfo.fields.last_gpa_total') }}</label>

                                    <select class="form-control select2" name="last_gpa_total" id="last_gpa_total" oninput='setCustomValidity(last_gpa.value > last_gpa_total.value)' required>
                                        <option value="5.00" {{ old('last_gpa_total') == '5.00' ? 'selected' : '' }}>5.00</option>
                                        <option value="4.00" {{ old('last_gpa_total') == '4.00' ? 'selected' : '' }}>4.00</option>
                                    </select>
                                    @if($errors->has('last_gpa_total'))
                                    <span class="help-block" role="alert">{{ $errors->first('last_gpa_total') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.educationInstituteInfo.fields.last_gpa_total_helper') }}</span>
                                    <div class="invalid-feedback">Please select valid GPA</div>
                                </div>

                                <div class="col-md-6 {{ $errors->has('last_gpa') ? 'has-error' : '' }}">
                                    <label class="required" for="last_gpa">{{ trans('cruds.educationInstituteInfo.fields.last_gpa') }}</label>
                                    <input class="form-control numeric" type="text" name="last_gpa" id="last_gpa" value="{{ old('last_gpa', '') }}" step="0.01" min="0" oninput='setCustomValidity(last_gpa.value < last_gpa_total.value)' onKeyDown="if (this.value.length==4 && event.keyCode!=8) return false" required>
                                    @if($errors->has('last_gpa'))
                                    <span class="help-block" role="alert">{{ $errors->first('last_gpa') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.educationInstituteInfo.fields.last_gpa_helper') }}</span>
                                    <div class="invalid-feedback">{{trans('global.write_something')}}</div>
                                </div>


                            </div>
                        </fieldset>

                        <fieldset class="border">
                            <legend class="border">
                                শিক্ষার্থী/অভিভাবকের ব্যাংক একাউন্টের তথ্য
                            </legend>
                            <div class="form-row">
                                <div class="col col-md-6 {{ $errors->has('account_type') ? 'has-error' : '' }}">
                                    <label>ব্যাংকিং এর ধরন</label>
                                    <select class="form-control" name="account_type" id="banking_type" onchange="banking()" required>
                                        <option value disabled {{ old('account_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                        @foreach($banking_types as $key => $label)
                                        <option value="{{ $label->id }}" {{ old('account_type') == $label->id ? 'selected' : '' }}>{{ $label->banking_type }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('banking_type'))
                                    <span class="help-block" role="alert">{{ $errors->first('banking_type') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.accountInfo.fields.banking_type_helper') }}</span>
                                    <div class="invalid-feedback">{{trans('global.select_something')}}</div>
                                </div>

                                <div id="bank_account_type" class="col col-md-6 {{ $errors->has('account_type') ? 'has-error' : '' }}">
                                    <label>{{ trans('cruds.accountInfo.fields.account_type') }}</label>
                                    <select class="form-control" name="account_type" id="account_type" required>
                                        <option value disabled {{ old('account_type', null) === null ? 'selected' : '' }} id="acc_type_null">{{ trans('global.pleaseSelect') }}</option>
                                        @foreach($bank_account_types as $key => $label)
                                        <option value="{{ $label->id }}" {{ old('account_type') == $label->id ? 'selected' : '' }}>{{ $label->account_type }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('account_type'))
                                    <span class="help-block" role="alert">{{ $errors->first('account_type') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.accountInfo.fields.account_type_helper') }}</span>
                                    <div class="invalid-feedback">{{trans('global.select_something')}}</div>
                                </div>


                                <div class="col col-md-6 {{ $errors->has('bank_account_owner') ? 'has-error' : '' }}">
                                    <label class="required">{{ trans('cruds.accountInfo.fields.bank_account_owner') }}</label>
                                    <select class="form-control" name="bank_account_owner" id="bank_account_owner" required>
                                        <option value disabled {{ old('bank_account_owner', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                        @foreach($acc_owner as $key => $label)
                                        <option value="{{ $label->id }}" {{ old('bank_account_owner') == $label->id ? 'selected' : '' }}>{{ $label->owner }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('bank_account_owner'))
                                    <span class="help-block" role="alert">{{ $errors->first('bank_account_owner') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.accountInfo.fields.bank_account_owner_helper') }}</span>
                                    <div class="invalid-feedback">{{trans('global.select_something')}}</div>
                                </div>

                                <div class="col col-md-6 {{ $errors->has('bank_name') ? 'has-error' : '' }}">
                                    <label class="required" for="bank_name_id">{{ trans('cruds.accountInfo.fields.bank_name') }}</label>


                                    <select id="bank_name_id" class="form-control select2" name="bank_name_id" required>
                                        <option id="nullValueOption" value="">{{ trans('global.pleaseSelect') }}</option>
                                    </select>


                                    @if($errors->has('bank_name'))
                                    <span class="help-block" role="alert">{{ $errors->first('bank_name') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.accountInfo.fields.bank_name_helper') }}</span>
                                    <div class="invalid-feedback">{{trans('global.select_something')}}</div>
                                </div>

                                <div id="bank_district" class=" col col-md-6{{ $errors->has('district') ? 'has-error' : '' }}">
                                    <label for="district_id">{{ trans('cruds.accountInfo.fields.district') }}</label>
                                    <select class="form-control select2" name="district_id" id="district_id_account">
                                        <option value="" id="district_type_null">{{ trans('global.pleaseSelect') }}</option>
                                        @foreach($districts as $id => $entry)
                                        <option value="{{ $entry->id }}" {{ old('district_id') == $entry->id ? 'selected' : '' }}>{{ $entry->district_name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('district'))
                                    <span class="help-block" role="alert">{{ $errors->first('district') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.accountInfo.fields.district_helper') }}</span>
                                    <div class="invalid-feedback">{{trans('global.select_something')}}</div>
                                </div>

                                <div class="col col-md-6 {{ $errors->has('bank_branch') ? 'has-error' : '' }}">
                                    <label for="bank_branch_id">{{ trans('cruds.accountInfo.fields.bank_branch') }}</label>
                                    <select class="form-control select2" name="bank_branch_id" id="bank_branch_id" required>
                                        <option id="nullValueOption" value='' selected='selected' id="branch_type_null"> {{trans('global.pleaseSelect')}}</option>

                                    </select>
                                    @if($errors->has('bank_branch'))
                                    <span class="help-block" role="alert">{{ $errors->first('bank_branch') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.accountInfo.fields.bank_branch_helper') }}</span>
                                    <div class="invalid-feedback">{{trans('global.select_something')}}</div>
                                </div>

                                <div class="col col-md-6 {{ $errors->has('acc_name') ? 'has-error' : '' }}">
                                    <label class="required" for="acc_name">{{ trans('cruds.accountInfo.fields.acc_name') }} [ইংরেজিতে লিখুন]</label>
                                    <input class="form-control" type="text" name="acc_name" id="acc_name" value="{{ old('acc_name', '') }}" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) ||(event.charCode >= 97 && event.charCode <= 122) ||  event.charCode == 46 || event.charCode == 32||event.charCode == 0)" onKeyDown="if (this.value.length==50 && event.keyCode!=8 ) return false" required>
                                    @if($errors->has('acc_name'))
                                    <span class="help-block" role="alert">{{ $errors->first('acc_name') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.accountInfo.fields.acc_name_helper') }}</span>
                                    <div class="invalid-feedback">{{trans('global.write_something')}}</div>
                                </div>

                                <div class="col col-md-6{{ $errors->has('acc_no') ? 'has-error' : '' }}">
                                    <label class="required" for="acc_no">{{ trans('cruds.accountInfo.fields.acc_no') }}</label>
                                    <!-- <input class="form-control" type="number" name="acc_no" id="acc_no" value="{{ old('acc_no', '') }}" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) ||  event.charCode == 46 || event.charCode == 0 " onKeyDown="if (this.value.length==11 && event.keyCode!=8) return false" required placeholder="সম্পূর্ণ একাউন্ট নম্বর" required> -->
                                    <!-- <input class="form-control" type="text" name="acc_no" id="acc_no" value="{{ old('acc_no', '') }}" onkeypress="return (event.charCode >= 48 && event.charCode <= 231) ||  event.charCode == 46 || event.charCode='০' || event.charCode == 0 " onkeydown="return replaceNumbers(this.value);" required> -->
                                    <input class="form-control" type="text" name="acc_no" id="acc_no" value="{{ old('acc_no', '') }}" onchange="replaceNumbers(this.value);" required>
                                    @if($errors->has('acc_no'))
                                    <span class="help-block" role="alert">{{ $errors->first('acc_no') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.accountInfo.fields.acc_no_helper') }}</span>
                                    <div class="invalid-feedback">{{trans('global.write_something')}}</div>
                                </div>

                                <div class="col col-md-6 {{ $errors->has('account_holder_nid') ? 'has-error' : '' }}">
                                    <label for="account_holder_nid">{{ trans('cruds.accountInfo.fields.account_holder_nid') }}</label>
                                    <input class="form-control" type="number" name="account_holder_nid" id="account_holder_nid" value="{{ old('account_holder_nid', '') }}" step="1" minlength="10" maxlength="17" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) ||  event.charCode == 46 || event.charCode == 0 " onKeyDown="if (this.value.length==17 && event.keyCode!=8) return false" required placeholder="১০ অথবা ১৭ ডিজিটের জাতীয় পরিচয়পত্র নম্বর" required>
                                    @if($errors->has('account_holder_nid'))
                                    <span class="help-block" role="alert">{{ $errors->first('account_holder_nid') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.accountInfo.fields.account_holder_nid_helper') }}</span>
                                    <div class="invalid-feedback">{{trans('global.write_something')}}</div>
                                </div>

                                <div id="routing_no" class="col col-md-6 {{ $errors->has('routing_no') ? 'has-error' : '' }}">
                                    <label class="required" for="routing_no_id">{{ trans('cruds.accountInfo.fields.routing_no') }}</label>
                                    <input class="form-control" type="number" name="routing_no_id" id="routing_no_id" value="{{ old('routing_no_id', '') }}" step="1" readonly="1" required>
                                    @if($errors->has('routing_no'))
                                    <span class="help-block" role="alert">{{ $errors->first('routing_no') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.accountInfo.fields.routing_no_helper') }}</span>
                                    <div class="invalid-feedback">{{trans('global.write_something')}}</div>
                                </div>

                                <div class=" col col-md-6{{ $errors->has('eiin') ? 'has-error' : '' }}" hidden>
                                    <label class="required" for="eiin">{{ trans('cruds.accountInfo.fields.eiin') }}</label>
                                    <input class="form-control" type="text" name="eiin" id="eiin_account" value="{{ old('eiin', '') }}" required>
                                    @if($errors->has('eiin'))
                                    <span class="help-block" role="alert">{{ $errors->first('eiin') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.accountInfo.fields.eiin_helper') }}</span>
                                    <div class="invalid-feedback">{{trans('global.write_something')}}</div>
                                </div>

                            </div>
                        </fieldset>

                        <div class="col-md-12" style="padding: 0px;">
                            <button class="btn btn-danger pull-right" type="submit">
                                <i class="fas fa-save">&nbsp; </i>{{ trans('global.save') }}
                            </button>
                            &nbsp;
                            <button class="btn btn-warning pull-left" type="reset">
                                <i class="fas fa-refresh">&nbsp; </i> রিসেট
                            </button>
                        </div>


                    </form>
                </div>
            </div>


        </div>
    </div>


    @endsection


    @section('scripts')

    <script src="{{ asset('js/locationAjax.js') }}"></script>
    <script src="{{ asset('js/instituteAjax.js') }}"></script>
    <script src="{{ asset('js/levelClassAjax.js') }}"></script>
    <script src="{{ asset('js/bankBranchAjax.js') }}"></script>
    <script src="{{ asset('js/registrationPage/locationFindAjax.js') }}"></script>
    <script src="{{ asset('js/util.js') }}"></script>

    <script>
        var today = new Date();
        var dd = 31;
        var mm = 12;
        var yyyy = today.getFullYear() - 3;
        var yyyy2 = today.getFullYear() - 26;
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }

        today = yyyy + '-' + mm + '-' + dd;
        min = yyyy2 + '-' + mm + '-' + dd;
        document.getElementById("dob2").setAttribute("max", today);
        document.getElementById("dob2").setAttribute("min", min);
    </script>

    <script>
        function banking() {
            $type = document.getElementById("banking_type").value;

            if ($type == 1) {
                document.getElementById("account_type").required = false;
                document.getElementById("bank_account_type").hidden = true;
                document.getElementById("acc_type_null").selected = true;

                document.getElementById("district_id_account").required = false;
                document.getElementById("bank_district").hidden = true;
                document.getElementById("district_type_null").selected = true;

                document.getElementById("routing_no").hidden = true;
                document.getElementsByName("bank_branch_id")[0].remove(0);

                // document.getElementById("bank_branch_id").required = false;
                // document.getElementById("bank_branch_id").disabled = true;

            } else {
                document.getElementById("account_type").required = true;
                document.getElementById("bank_account_type").hidden = false;

                document.getElementById("district_id_account").required = false;
                document.getElementById("bank_district").hidden = false;

                document.getElementById("bank_branch_id").required = true;
                document.getElementById("bank_branch_id").disabled = false;
                document.getElementById("routing_no").hidden = false;


            }

        }
    </script>


    <script>
        // Write on First Field name/UserID/AppID it will automatically fill Same information
        $("#father_nid").on("keyup", function() {
            let inp = $(this).val();
            // let out = replaceNumbers(inp);
            let out = banglaToEnglish(inp);
            $("#father_nid").val(out);
            console.log(out);
        });
        $("#mother_nid").on("keyup", function() {
            let inp = $(this).val();
            // let out = replaceNumbers(inp);
            let out = banglaToEnglish(inp);
            $("#mother_nid").val(out);
            console.log(out);
        });

        $("#guardian_land").on("keyup", function() {
            let inp = $(this).val();
            // let out = replaceNumbers(inp);
            let out = banglaToEnglish(inp);
            $("#guardian_land").val(out);
            console.log(out);
        });

        $("#guardian_annual_income").on("keyup", function() {
            let inp = $(this).val();
            // let out = replaceNumbers(inp);
            let out = banglaToEnglish(inp);
            $("#guardian_annual_income").val(out);
            console.log(out);
        });
        $("#family_member").on("keyup", function() {
            let inp = $(this).val();
            // let out = replaceNumbers(inp);
            let out = banglaToEnglish(inp);
            $("#family_member").val(out);
            console.log(out);
        });
        $("#last_gpa").on("keyup", function() {
            let inp = $(this).val();
            // let out = replaceNumbers(inp);
            let out = banglaToEnglish(inp);
            $("#last_gpa").val(out);
            console.log(out);
        });



        const engToBdNum = (str) => {
            let banglaNumber = {
                0: "০",
                1: "১",
                2: "২",
                3: "৩",
                4: "৪",
                5: "৫",
                6: "৬",
                7: "৭",
                8: "৮",
                9: "৯",
            };

            for (var x in banglaNumber) {
                str = str.replace(new RegExp(x, "g"), banglaNumber[x]);
            }
            return str;
        };

        const banglaToEnglish = (str) => {
            let englishNumber = {
                "০": 0,
                "১": 1,
                "২": 2,
                "৩": 3,
                "৪": 4,
                "৫": 5,
                "৬": 6,
                "৭": 7,
                "৮": 8,
                "৯": 9,
            };
            for (var y in englishNumber) {
                str = str.replace(new RegExp(y, "g"), englishNumber[y]);
            }
            return str;
        };

        console.log(engToBdNum('4234234000324234'))
        console.log(banglaToEnglish('১২৩'))



        //  This is code for Text Input support only Number in Bangla 



        var allowedKeys = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", ".",
            "ARROWRIGHT", "ARROWLEFT", "TAB", "BACKSPACE", "DELETE", "HOME", "END", "০", "১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯"
        ];

        if (document.readyState === "complete") onLoad();
        else addEventListener("load", onLoad);

        function onLoad() {
            document.querySelectorAll("input.numeric").forEach(function(input) {


                input.addEventListener("keydown", onInputKeyDown);
                input.addEventListener("paste", onInputPaste);
            });
        }

        function onInputKeyDown(event) {
            if (!allowedKeys.includes(event.key.toUpperCase()) && !event.ctrlKey) {
                event.preventDefault();
            }
        }

        function onInputPaste(event) {
            var clipboardData = event.clipboardData || window.clipboardData;
            if (/^[০-৯]+$/g.test(clipboardData.getData("Text"))) return;
            event.stopPropagation();
            event.preventDefault();
        }

        // $(".numeric").bind("paste", function(e) {
        //     // access the clipboard using the api
        //     var pastedData = e.originalEvent.clipboardData.getData('text');

        //     if (/^[০-৯]+$/g.test(pastedData))
        //         return false;
        //     else
        //         e.preventDefault();
        // });
    </script>

    @endsection