@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.finalSelection.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.final-selections.update", [$finalSelection->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('app_number') ? 'has-error' : '' }}">
                            <label class="required" for="app_number">{{ trans('cruds.finalSelection.fields.app_number') }}</label>
                            <input class="form-control" type="text" name="app_number" id="app_number" value="{{ old('app_number', $finalSelection->app_number) }}" required>
                            @if($errors->has('app_number'))
                                <span class="help-block" role="alert">{{ $errors->first('app_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.finalSelection.fields.app_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('user_id_no') ? 'has-error' : '' }}">
                            <label class="required" for="user_id_no">{{ trans('cruds.finalSelection.fields.user_id_no') }}</label>
                            <input class="form-control" type="text" name="user_id_no" id="user_id_no" value="{{ old('user_id_no', $finalSelection->user_id_no) }}" required>
                            @if($errors->has('user_id_no'))
                                <span class="help-block" role="alert">{{ $errors->first('user_id_no') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.finalSelection.fields.user_id_no_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('student_name') ? 'has-error' : '' }}">
                            <label class="required" for="student_name">{{ trans('cruds.finalSelection.fields.student_name') }}</label>
                            <input class="form-control" type="text" name="student_name" id="student_name" value="{{ old('student_name', $finalSelection->student_name) }}" required>
                            @if($errors->has('student_name'))
                                <span class="help-block" role="alert">{{ $errors->first('student_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.finalSelection.fields.student_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('brid') ? 'has-error' : '' }}">
                            <label class="required" for="brid">{{ trans('cruds.finalSelection.fields.brid') }}</label>
                            <input class="form-control" type="text" name="brid" id="brid" value="{{ old('brid', $finalSelection->brid) }}" required>
                            @if($errors->has('brid'))
                                <span class="help-block" role="alert">{{ $errors->first('brid') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.finalSelection.fields.brid_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('father_name') ? 'has-error' : '' }}">
                            <label class="required" for="father_name">{{ trans('cruds.finalSelection.fields.father_name') }}</label>
                            <input class="form-control" type="text" name="father_name" id="father_name" value="{{ old('father_name', $finalSelection->father_name) }}" required>
                            @if($errors->has('father_name'))
                                <span class="help-block" role="alert">{{ $errors->first('father_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.finalSelection.fields.father_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('father_nid') ? 'has-error' : '' }}">
                            <label class="required" for="father_nid">{{ trans('cruds.finalSelection.fields.father_nid') }}</label>
                            <input class="form-control" type="text" name="father_nid" id="father_nid" value="{{ old('father_nid', $finalSelection->father_nid) }}" required>
                            @if($errors->has('father_nid'))
                                <span class="help-block" role="alert">{{ $errors->first('father_nid') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.finalSelection.fields.father_nid_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mother_name') ? 'has-error' : '' }}">
                            <label class="required" for="mother_name">{{ trans('cruds.finalSelection.fields.mother_name') }}</label>
                            <input class="form-control" type="text" name="mother_name" id="mother_name" value="{{ old('mother_name', $finalSelection->mother_name) }}" required>
                            @if($errors->has('mother_name'))
                                <span class="help-block" role="alert">{{ $errors->first('mother_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.finalSelection.fields.mother_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mother_nid') ? 'has-error' : '' }}">
                            <label class="required" for="mother_nid">{{ trans('cruds.finalSelection.fields.mother_nid') }}</label>
                            <input class="form-control" type="text" name="mother_nid" id="mother_nid" value="{{ old('mother_nid', $finalSelection->mother_nid) }}" required>
                            @if($errors->has('mother_nid'))
                                <span class="help-block" role="alert">{{ $errors->first('mother_nid') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.finalSelection.fields.mother_nid_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('academic_level') ? 'has-error' : '' }}">
                            <label class="required" for="academic_level_id">{{ trans('cruds.finalSelection.fields.academic_level') }}</label>
                            <select class="form-control select2" name="academic_level_id" id="academic_level_id" required>
                                @foreach($academic_levels as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('academic_level_id') ? old('academic_level_id') : $finalSelection->academic_level->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('academic_level'))
                                <span class="help-block" role="alert">{{ $errors->first('academic_level') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.finalSelection.fields.academic_level_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('admission_class') ? 'has-error' : '' }}">
                            <label class="required" for="admission_class_id">{{ trans('cruds.finalSelection.fields.admission_class') }}</label>
                            <select class="form-control select2" name="admission_class_id" id="admission_class_id" required>
                                @foreach($admission_classes as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('admission_class_id') ? old('admission_class_id') : $finalSelection->admission_class->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('admission_class'))
                                <span class="help-block" role="alert">{{ $errors->first('admission_class') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.finalSelection.fields.admission_class_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('education_institute') ? 'has-error' : '' }}">
                            <label for="education_institute_id">{{ trans('cruds.finalSelection.fields.education_institute') }}</label>
                            <select class="form-control select2" name="education_institute_id" id="education_institute_id">
                                @foreach($education_institutes as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('education_institute_id') ? old('education_institute_id') : $finalSelection->education_institute->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('education_institute'))
                                <span class="help-block" role="alert">{{ $errors->first('education_institute') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.finalSelection.fields.education_institute_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('eiin') ? 'has-error' : '' }}">
                            <label class="required" for="eiin_id">{{ trans('cruds.finalSelection.fields.eiin') }}</label>
                            <select class="form-control select2" name="eiin_id" id="eiin_id" required>
                                @foreach($eiins as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('eiin_id') ? old('eiin_id') : $finalSelection->eiin->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('eiin'))
                                <span class="help-block" role="alert">{{ $errors->first('eiin') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.finalSelection.fields.eiin_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('division') ? 'has-error' : '' }}">
                            <label class="required" for="division_id">{{ trans('cruds.finalSelection.fields.division') }}</label>
                            <select class="form-control select2" name="division_id" id="division_id" required>
                                @foreach($divisions as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('division_id') ? old('division_id') : $finalSelection->division->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('division'))
                                <span class="help-block" role="alert">{{ $errors->first('division') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.finalSelection.fields.division_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('district') ? 'has-error' : '' }}">
                            <label class="required" for="district_id">{{ trans('cruds.finalSelection.fields.district') }}</label>
                            <select class="form-control select2" name="district_id" id="district_id" required>
                                @foreach($districts as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('district_id') ? old('district_id') : $finalSelection->district->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('district'))
                                <span class="help-block" role="alert">{{ $errors->first('district') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.finalSelection.fields.district_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('upazila') ? 'has-error' : '' }}">
                            <label class="required" for="upazila_id">{{ trans('cruds.finalSelection.fields.upazila') }}</label>
                            <select class="form-control select2" name="upazila_id" id="upazila_id" required>
                                @foreach($upazilas as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('upazila_id') ? old('upazila_id') : $finalSelection->upazila->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('upazila'))
                                <span class="help-block" role="alert">{{ $errors->first('upazila') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.finalSelection.fields.upazila_helper') }}</span>
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