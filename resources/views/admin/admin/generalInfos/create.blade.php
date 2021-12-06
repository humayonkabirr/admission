@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.generalInfo.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.general-infos.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('user_id_no') ? 'has-error' : '' }}">
                            <label class="required" for="user_id_no">{{ trans('cruds.generalInfo.fields.user_id_no') }}</label>
                            <input class="form-control" type="text" name="user_id_no" id="user_id_no" value="{{ old('user_id_no', '') }}" required>
                            @if($errors->has('user_id_no'))
                                <span class="help-block" role="alert">{{ $errors->first('user_id_no') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalInfo.fields.user_id_no_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('application_no') ? 'has-error' : '' }}">
                            <label class="required" for="application_no">{{ trans('cruds.generalInfo.fields.application_no') }}</label>
                            <input class="form-control" type="text" name="application_no" id="application_no" value="{{ old('application_no', '') }}" required>
                            @if($errors->has('application_no'))
                                <span class="help-block" role="alert">{{ $errors->first('application_no') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalInfo.fields.application_no_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('grants_name') ? 'has-error' : '' }}">
                            <label class="required" for="grants_name">{{ trans('cruds.generalInfo.fields.grants_name') }}</label>
                            <input class="form-control" type="text" name="grants_name" id="grants_name" value="{{ old('grants_name', '') }}" required>
                            @if($errors->has('grants_name'))
                                <span class="help-block" role="alert">{{ $errors->first('grants_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalInfo.fields.grants_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('circular') ? 'has-error' : '' }}">
                            <label class="required" for="circular_id">{{ trans('cruds.generalInfo.fields.circular') }}</label>
                            <select class="form-control select2" name="circular_id" id="circular_id" required>
                                @foreach($circulars as $id => $entry)
                                    <option value="{{ $id }}" {{ old('circular_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('circular'))
                                <span class="help-block" role="alert">{{ $errors->first('circular') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalInfo.fields.circular_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('brid') ? 'has-error' : '' }}">
                            <label class="required" for="brid">{{ trans('cruds.generalInfo.fields.brid') }}</label>
                            <input class="form-control" type="text" name="brid" id="brid" value="{{ old('brid', '') }}" required>
                            @if($errors->has('brid'))
                                <span class="help-block" role="alert">{{ $errors->first('brid') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalInfo.fields.brid_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nid') ? 'has-error' : '' }}">
                            <label for="nid">{{ trans('cruds.generalInfo.fields.nid') }}</label>
                            <input class="form-control" type="text" name="nid" id="nid" value="{{ old('nid', '') }}">
                            @if($errors->has('nid'))
                                <span class="help-block" role="alert">{{ $errors->first('nid') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalInfo.fields.nid_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.generalInfo.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalInfo.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('father_name') ? 'has-error' : '' }}">
                            <label class="required" for="father_name">{{ trans('cruds.generalInfo.fields.father_name') }}</label>
                            <input class="form-control" type="text" name="father_name" id="father_name" value="{{ old('father_name', '') }}" required>
                            @if($errors->has('father_name'))
                                <span class="help-block" role="alert">{{ $errors->first('father_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalInfo.fields.father_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('father_nid') ? 'has-error' : '' }}">
                            <label for="father_nid">{{ trans('cruds.generalInfo.fields.father_nid') }}</label>
                            <input class="form-control" type="number" name="father_nid" id="father_nid" value="{{ old('father_nid', '') }}" step="1">
                            @if($errors->has('father_nid'))
                                <span class="help-block" role="alert">{{ $errors->first('father_nid') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalInfo.fields.father_nid_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mother_name') ? 'has-error' : '' }}">
                            <label class="required" for="mother_name">{{ trans('cruds.generalInfo.fields.mother_name') }}</label>
                            <input class="form-control" type="text" name="mother_name" id="mother_name" value="{{ old('mother_name', '') }}" required>
                            @if($errors->has('mother_name'))
                                <span class="help-block" role="alert">{{ $errors->first('mother_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalInfo.fields.mother_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mother_nid') ? 'has-error' : '' }}">
                            <label for="mother_nid">{{ trans('cruds.generalInfo.fields.mother_nid') }}</label>
                            <input class="form-control" type="number" name="mother_nid" id="mother_nid" value="{{ old('mother_nid', '') }}" step="1">
                            @if($errors->has('mother_nid'))
                                <span class="help-block" role="alert">{{ $errors->first('mother_nid') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalInfo.fields.mother_nid_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dob') ? 'has-error' : '' }}">
                            <label class="required" for="dob">{{ trans('cruds.generalInfo.fields.dob') }}</label>
                            <input class="form-control date" type="text" name="dob" id="dob" value="{{ old('dob') }}" required>
                            @if($errors->has('dob'))
                                <span class="help-block" role="alert">{{ $errors->first('dob') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalInfo.fields.dob_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('age') ? 'has-error' : '' }}">
                            <label class="required" for="age">{{ trans('cruds.generalInfo.fields.age') }}</label>
                            <input class="form-control" type="number" name="age" id="age" value="{{ old('age', '') }}" step="1" required>
                            @if($errors->has('age'))
                                <span class="help-block" role="alert">{{ $errors->first('age') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalInfo.fields.age_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.generalInfo.fields.gender') }}</label>
                            <select class="form-control" name="gender" id="gender">
                                <option value disabled {{ old('gender', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\GeneralInfo::GENDER_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('gender', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('gender'))
                                <span class="help-block" role="alert">{{ $errors->first('gender') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalInfo.fields.gender_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('division') ? 'has-error' : '' }}">
                            <label class="required" for="division_id">{{ trans('cruds.generalInfo.fields.division') }}</label>
                            <select class="form-control select2" name="division_id" id="division_id" required>
                                @foreach($divisions as $id => $entry)
                                    <option value="{{ $id }}" {{ old('division_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('division'))
                                <span class="help-block" role="alert">{{ $errors->first('division') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalInfo.fields.division_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('district') ? 'has-error' : '' }}">
                            <label class="required" for="district_id">{{ trans('cruds.generalInfo.fields.district') }}</label>
                            <select class="form-control select2" name="district_id" id="district_id" required>
                                @foreach($districts as $id => $entry)
                                    <option value="{{ $id }}" {{ old('district_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('district'))
                                <span class="help-block" role="alert">{{ $errors->first('district') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalInfo.fields.district_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('upazila') ? 'has-error' : '' }}">
                            <label class="required" for="upazila_id">{{ trans('cruds.generalInfo.fields.upazila') }}</label>
                            <select class="form-control select2" name="upazila_id" id="upazila_id" required>
                                @foreach($upazilas as $id => $entry)
                                    <option value="{{ $id }}" {{ old('upazila_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('upazila'))
                                <span class="help-block" role="alert">{{ $errors->first('upazila') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalInfo.fields.upazila_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('union') ? 'has-error' : '' }}">
                            <label class="required" for="union_id">{{ trans('cruds.generalInfo.fields.union') }}</label>
                            <select class="form-control select2" name="union_id" id="union_id" required>
                                @foreach($unions as $id => $entry)
                                    <option value="{{ $id }}" {{ old('union_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('union'))
                                <span class="help-block" role="alert">{{ $errors->first('union') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalInfo.fields.union_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('village') ? 'has-error' : '' }}">
                            <label class="required" for="village">{{ trans('cruds.generalInfo.fields.village') }}</label>
                            <input class="form-control" type="text" name="village" id="village" value="{{ old('village', '') }}" required>
                            @if($errors->has('village'))
                                <span class="help-block" role="alert">{{ $errors->first('village') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalInfo.fields.village_helper') }}</span>
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