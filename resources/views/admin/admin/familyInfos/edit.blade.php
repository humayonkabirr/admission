@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.familyInfo.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.family-infos.update", [$familyInfo->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('user_id_no') ? 'has-error' : '' }}">
                            <label class="required" for="user_id_no">{{ trans('cruds.familyInfo.fields.user_id_no') }}</label>
                            <input class="form-control" type="text" name="user_id_no" id="user_id_no" value="{{ old('user_id_no', $familyInfo->user_id_no) }}" required>
                            @if($errors->has('user_id_no'))
                                <span class="help-block" role="alert">{{ $errors->first('user_id_no') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.familyInfo.fields.user_id_no_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('application_number') ? 'has-error' : '' }}">
                            <label class="required" for="application_number_id">{{ trans('cruds.familyInfo.fields.application_number') }}</label>
                            <select class="form-control select2" name="application_number_id" id="application_number_id" required>
                                @foreach($application_numbers as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('application_number_id') ? old('application_number_id') : $familyInfo->application_number->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('application_number'))
                                <span class="help-block" role="alert">{{ $errors->first('application_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.familyInfo.fields.application_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('familystatus') ? 'has-error' : '' }}">
                            <label class="required" for="familystatus_id">{{ trans('cruds.familyInfo.fields.familystatus') }}</label>
                            <select class="form-control select2" name="familystatus_id" id="familystatus_id" required>
                                @foreach($familystatuses as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('familystatus_id') ? old('familystatus_id') : $familyInfo->familystatus->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('familystatus'))
                                <span class="help-block" role="alert">{{ $errors->first('familystatus') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.familyInfo.fields.familystatus_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('guardian_occupation') ? 'has-error' : '' }}">
                            <label class="required" for="guardian_occupation_id">{{ trans('cruds.familyInfo.fields.guardian_occupation') }}</label>
                            <select class="form-control select2" name="guardian_occupation_id" id="guardian_occupation_id" required>
                                @foreach($guardian_occupations as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('guardian_occupation_id') ? old('guardian_occupation_id') : $familyInfo->guardian_occupation->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('guardian_occupation'))
                                <span class="help-block" role="alert">{{ $errors->first('guardian_occupation') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.familyInfo.fields.guardian_occupation_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('guardian_education') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.familyInfo.fields.guardian_education') }}</label>
                            <select class="form-control" name="guardian_education" id="guardian_education" required>
                                <option value disabled {{ old('guardian_education', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\FamilyInfo::GUARDIAN_EDUCATION_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('guardian_education', $familyInfo->guardian_education) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('guardian_education'))
                                <span class="help-block" role="alert">{{ $errors->first('guardian_education') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.familyInfo.fields.guardian_education_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('guardian_land') ? 'has-error' : '' }}">
                            <label class="required" for="guardian_land">{{ trans('cruds.familyInfo.fields.guardian_land') }}</label>
                            <input class="form-control" type="number" name="guardian_land" id="guardian_land" value="{{ old('guardian_land', $familyInfo->guardian_land) }}" step="0.01" required max="100">
                            @if($errors->has('guardian_land'))
                                <span class="help-block" role="alert">{{ $errors->first('guardian_land') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.familyInfo.fields.guardian_land_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('guardian_annual_income') ? 'has-error' : '' }}">
                            <label class="required" for="guardian_annual_income">{{ trans('cruds.familyInfo.fields.guardian_annual_income') }}</label>
                            <input class="form-control" type="number" name="guardian_annual_income" id="guardian_annual_income" value="{{ old('guardian_annual_income', $familyInfo->guardian_annual_income) }}" step="0.01" required>
                            @if($errors->has('guardian_annual_income'))
                                <span class="help-block" role="alert">{{ $errors->first('guardian_annual_income') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.familyInfo.fields.guardian_annual_income_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('family_member') ? 'has-error' : '' }}">
                            <label for="family_member">{{ trans('cruds.familyInfo.fields.family_member') }}</label>
                            <input class="form-control" type="number" name="family_member" id="family_member" value="{{ old('family_member', $familyInfo->family_member) }}" step="1">
                            @if($errors->has('family_member'))
                                <span class="help-block" role="alert">{{ $errors->first('family_member') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.familyInfo.fields.family_member_helper') }}</span>
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