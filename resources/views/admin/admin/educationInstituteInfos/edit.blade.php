@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.educationInstituteInfo.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.education-institute-infos.update", [$educationInstituteInfo->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('application_number') ? 'has-error' : '' }}">
                            <label class="required" for="application_number_id">{{ trans('cruds.educationInstituteInfo.fields.application_number') }}</label>
                            <select class="form-control select2" name="application_number_id" id="application_number_id" required>
                                @foreach($application_numbers as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('application_number_id') ? old('application_number_id') : $educationInstituteInfo->application_number->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('application_number'))
                                <span class="help-block" role="alert">{{ $errors->first('application_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.educationInstituteInfo.fields.application_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('institute_division') ? 'has-error' : '' }}">
                            <label class="required" for="institute_division">{{ trans('cruds.educationInstituteInfo.fields.institute_division') }}</label>
                            <input class="form-control" type="text" name="institute_division" id="institute_division" value="{{ old('institute_division', $educationInstituteInfo->institute_division) }}" required>
                            @if($errors->has('institute_division'))
                                <span class="help-block" role="alert">{{ $errors->first('institute_division') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.educationInstituteInfo.fields.institute_division_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('institute_district') ? 'has-error' : '' }}">
                            <label class="required" for="institute_district">{{ trans('cruds.educationInstituteInfo.fields.institute_district') }}</label>
                            <input class="form-control" type="text" name="institute_district" id="institute_district" value="{{ old('institute_district', $educationInstituteInfo->institute_district) }}" required>
                            @if($errors->has('institute_district'))
                                <span class="help-block" role="alert">{{ $errors->first('institute_district') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.educationInstituteInfo.fields.institute_district_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('institute_upazila') ? 'has-error' : '' }}">
                            <label class="required" for="institute_upazila">{{ trans('cruds.educationInstituteInfo.fields.institute_upazila') }}</label>
                            <input class="form-control" type="text" name="institute_upazila" id="institute_upazila" value="{{ old('institute_upazila', $educationInstituteInfo->institute_upazila) }}" required>
                            @if($errors->has('institute_upazila'))
                                <span class="help-block" role="alert">{{ $errors->first('institute_upazila') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.educationInstituteInfo.fields.institute_upazila_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('education_level') ? 'has-error' : '' }}">
                            <label class="required" for="education_level_id">{{ trans('cruds.educationInstituteInfo.fields.education_level') }}</label>
                            <select class="form-control select2" name="education_level_id" id="education_level_id" required>
                                @foreach($education_levels as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('education_level_id') ? old('education_level_id') : $educationInstituteInfo->education_level->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('education_level'))
                                <span class="help-block" role="alert">{{ $errors->first('education_level') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.educationInstituteInfo.fields.education_level_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('class_name') ? 'has-error' : '' }}">
                            <label class="required" for="class_name_id">{{ trans('cruds.educationInstituteInfo.fields.class_name') }}</label>
                            <select class="form-control select2" name="class_name_id" id="class_name_id" required>
                                @foreach($class_names as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('class_name_id') ? old('class_name_id') : $educationInstituteInfo->class_name->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('class_name'))
                                <span class="help-block" role="alert">{{ $errors->first('class_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.educationInstituteInfo.fields.class_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('institute_name') ? 'has-error' : '' }}">
                            <label class="required" for="institute_name_id">{{ trans('cruds.educationInstituteInfo.fields.institute_name') }}</label>
                            <select class="form-control select2" name="institute_name_id" id="institute_name_id" required>
                                @foreach($institute_names as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('institute_name_id') ? old('institute_name_id') : $educationInstituteInfo->institute_name->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('institute_name'))
                                <span class="help-block" role="alert">{{ $errors->first('institute_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.educationInstituteInfo.fields.institute_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('eiin') ? 'has-error' : '' }}">
                            <label class="required" for="eiin_id">{{ trans('cruds.educationInstituteInfo.fields.eiin') }}</label>
                            <select class="form-control select2" name="eiin_id" id="eiin_id" required>
                                @foreach($eiins as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('eiin_id') ? old('eiin_id') : $educationInstituteInfo->eiin->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('eiin'))
                                <span class="help-block" role="alert">{{ $errors->first('eiin') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.educationInstituteInfo.fields.eiin_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('last_study_class') ? 'has-error' : '' }}">
                            <label class="required" for="last_study_class_id">{{ trans('cruds.educationInstituteInfo.fields.last_study_class') }}</label>
                            <select class="form-control select2" name="last_study_class_id" id="last_study_class_id" required>
                                @foreach($last_study_classes as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('last_study_class_id') ? old('last_study_class_id') : $educationInstituteInfo->last_study_class->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('last_study_class'))
                                <span class="help-block" role="alert">{{ $errors->first('last_study_class') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.educationInstituteInfo.fields.last_study_class_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('last_gpa') ? 'has-error' : '' }}">
                            <label class="required" for="last_gpa">{{ trans('cruds.educationInstituteInfo.fields.last_gpa') }}</label>
                            <input class="form-control" type="number" name="last_gpa" id="last_gpa" value="{{ old('last_gpa', $educationInstituteInfo->last_gpa) }}" step="0.01" required>
                            @if($errors->has('last_gpa'))
                                <span class="help-block" role="alert">{{ $errors->first('last_gpa') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.educationInstituteInfo.fields.last_gpa_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('last_gpa_total') ? 'has-error' : '' }}">
                            <label class="required" for="last_gpa_total">{{ trans('cruds.educationInstituteInfo.fields.last_gpa_total') }}</label>
                            <input class="form-control" type="number" name="last_gpa_total" id="last_gpa_total" value="{{ old('last_gpa_total', $educationInstituteInfo->last_gpa_total) }}" step="0.01" required>
                            @if($errors->has('last_gpa_total'))
                                <span class="help-block" role="alert">{{ $errors->first('last_gpa_total') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.educationInstituteInfo.fields.last_gpa_total_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('user_id_no') ? 'has-error' : '' }}">
                            <label class="required" for="user_id_no">{{ trans('cruds.educationInstituteInfo.fields.user_id_no') }}</label>
                            <input class="form-control" type="text" name="user_id_no" id="user_id_no" value="{{ old('user_id_no', $educationInstituteInfo->user_id_no) }}" required>
                            @if($errors->has('user_id_no'))
                                <span class="help-block" role="alert">{{ $errors->first('user_id_no') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.educationInstituteInfo.fields.user_id_no_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection