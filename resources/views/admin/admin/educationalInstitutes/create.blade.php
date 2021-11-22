@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.educationalInstitute.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.educational-institutes.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('institution_eiin_no') ? 'has-error' : '' }}">
                            <label class="required" for="institution_eiin_no">{{ trans('cruds.educationalInstitute.fields.institution_eiin_no') }}</label>
                            <input class="form-control" type="text" name="institution_eiin_no" id="institution_eiin_no" value="{{ old('institution_eiin_no', '') }}" required>
                            @if($errors->has('institution_eiin_no'))
                                <span class="help-block" role="alert">{{ $errors->first('institution_eiin_no') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.educationalInstitute.fields.institution_eiin_no_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('institution_name') ? 'has-error' : '' }}">
                            <label class="required" for="institution_name">{{ trans('cruds.educationalInstitute.fields.institution_name') }}</label>
                            <input class="form-control" type="text" name="institution_name" id="institution_name" value="{{ old('institution_name', '') }}" required>
                            @if($errors->has('institution_name'))
                                <span class="help-block" role="alert">{{ $errors->first('institution_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.educationalInstitute.fields.institution_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('institution_code') ? 'has-error' : '' }}">
                            <label for="institution_code">{{ trans('cruds.educationalInstitute.fields.institution_code') }}</label>
                            <input class="form-control" type="text" name="institution_code" id="institution_code" value="{{ old('institution_code', '') }}">
                            @if($errors->has('institution_code'))
                                <span class="help-block" role="alert">{{ $errors->first('institution_code') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.educationalInstitute.fields.institution_code_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mpo_number') ? 'has-error' : '' }}">
                            <label for="mpo_number">{{ trans('cruds.educationalInstitute.fields.mpo_number') }}</label>
                            <input class="form-control" type="text" name="mpo_number" id="mpo_number" value="{{ old('mpo_number', '') }}">
                            @if($errors->has('mpo_number'))
                                <span class="help-block" role="alert">{{ $errors->first('mpo_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.educationalInstitute.fields.mpo_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('legal_status') ? 'has-error' : '' }}">
                            <label for="legal_status_id">{{ trans('cruds.educationalInstitute.fields.legal_status') }}</label>
                            <select class="form-control select2" name="legal_status_id" id="legal_status_id">
                                @foreach($legal_statuses as $id => $entry)
                                    <option value="{{ $id }}" {{ old('legal_status_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('legal_status'))
                                <span class="help-block" role="alert">{{ $errors->first('legal_status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.educationalInstitute.fields.legal_status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('academic_levels') ? 'has-error' : '' }}">
                            <label for="academic_levels">{{ trans('cruds.educationalInstitute.fields.academic_level') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="academic_levels[]" id="academic_levels" multiple>
                                @foreach($academic_levels as $id => $academic_level)
                                    <option value="{{ $id }}" {{ in_array($id, old('academic_levels', [])) ? 'selected' : '' }}>{{ $academic_level }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('academic_levels'))
                                <span class="help-block" role="alert">{{ $errors->first('academic_levels') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.educationalInstitute.fields.academic_level_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('disciplines') ? 'has-error' : '' }}">
                            <label for="disciplines">{{ trans('cruds.educationalInstitute.fields.discipline') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="disciplines[]" id="disciplines" multiple>
                                @foreach($disciplines as $id => $discipline)
                                    <option value="{{ $id }}" {{ in_array($id, old('disciplines', [])) ? 'selected' : '' }}>{{ $discipline }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('disciplines'))
                                <span class="help-block" role="alert">{{ $errors->first('disciplines') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.educationalInstitute.fields.discipline_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('institute_head') ? 'has-error' : '' }}">
                            <label for="institute_head">{{ trans('cruds.educationalInstitute.fields.institute_head') }}</label>
                            <input class="form-control" type="text" name="institute_head" id="institute_head" value="{{ old('institute_head', '') }}">
                            @if($errors->has('institute_head'))
                                <span class="help-block" role="alert">{{ $errors->first('institute_head') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.educationalInstitute.fields.institute_head_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">{{ trans('cruds.educationalInstitute.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}">
                            @if($errors->has('email'))
                                <span class="help-block" role="alert">{{ $errors->first('email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.educationalInstitute.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mobile_phone') ? 'has-error' : '' }}">
                            <label for="mobile_phone">{{ trans('cruds.educationalInstitute.fields.mobile_phone') }}</label>
                            <input class="form-control" type="number" name="mobile_phone" id="mobile_phone" value="{{ old('mobile_phone', '') }}" step="1">
                            @if($errors->has('mobile_phone'))
                                <span class="help-block" role="alert">{{ $errors->first('mobile_phone') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.educationalInstitute.fields.mobile_phone_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label for="phone">{{ trans('cruds.educationalInstitute.fields.phone') }}</label>
                            <input class="form-control" type="number" name="phone" id="phone" value="{{ old('phone', '') }}" step="1">
                            @if($errors->has('phone'))
                                <span class="help-block" role="alert">{{ $errors->first('phone') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.educationalInstitute.fields.phone_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('division') ? 'has-error' : '' }}">
                            <label class="required" for="division_id">{{ trans('cruds.educationalInstitute.fields.division') }}</label>
                            <select class="form-control select2" name="division_id" id="division_id" required>
                                @foreach($divisions as $id => $entry)
                                    <option value="{{ $id }}" {{ old('division_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('division'))
                                <span class="help-block" role="alert">{{ $errors->first('division') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.educationalInstitute.fields.division_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('district') ? 'has-error' : '' }}">
                            <label for="district_id">{{ trans('cruds.educationalInstitute.fields.district') }}</label>
                            <select class="form-control select2" name="district_id" id="district_id">
                                @foreach($districts as $id => $entry)
                                    <option value="{{ $id }}" {{ old('district_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('district'))
                                <span class="help-block" role="alert">{{ $errors->first('district') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.educationalInstitute.fields.district_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('upazila') ? 'has-error' : '' }}">
                            <label for="upazila_id">{{ trans('cruds.educationalInstitute.fields.upazila') }}</label>
                            <select class="form-control select2" name="upazila_id" id="upazila_id">
                                @foreach($upazilas as $id => $entry)
                                    <option value="{{ $id }}" {{ old('upazila_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('upazila'))
                                <span class="help-block" role="alert">{{ $errors->first('upazila') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.educationalInstitute.fields.upazila_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('union') ? 'has-error' : '' }}">
                            <label for="union_id">{{ trans('cruds.educationalInstitute.fields.union') }}</label>
                            <select class="form-control select2" name="union_id" id="union_id">
                                @foreach($unions as $id => $entry)
                                    <option value="{{ $id }}" {{ old('union_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('union'))
                                <span class="help-block" role="alert">{{ $errors->first('union') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.educationalInstitute.fields.union_helper') }}</span>
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