@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.payroll.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.payrolls.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('payroll_name') ? 'has-error' : '' }}">
                            <label class="required" for="payroll_name">{{ trans('cruds.payroll.fields.payroll_name') }}</label>
                            <input class="form-control" type="text" name="payroll_name" id="payroll_name" value="{{ old('payroll_name', '') }}" required>
                            @if($errors->has('payroll_name'))
                                <span class="help-block" role="alert">{{ $errors->first('payroll_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.payroll.fields.payroll_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('circular') ? 'has-error' : '' }}">
                            <label class="required" for="circular_id">{{ trans('cruds.payroll.fields.circular') }}</label>
                            <select class="form-control select2" name="circular_id" id="circular_id" required>
                                @foreach($circulars as $id => $entry)
                                    <option value="{{ $id }}" {{ old('circular_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('circular'))
                                <span class="help-block" role="alert">{{ $errors->first('circular') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.payroll.fields.circular_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('division') ? 'has-error' : '' }}">
                            <label for="division_id">{{ trans('cruds.payroll.fields.division') }}</label>
                            <select class="form-control select2" name="division_id" id="division_id">
                                @foreach($divisions as $id => $entry)
                                    <option value="{{ $id }}" {{ old('division_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('division'))
                                <span class="help-block" role="alert">{{ $errors->first('division') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.payroll.fields.division_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('district') ? 'has-error' : '' }}">
                            <label for="district_id">{{ trans('cruds.payroll.fields.district') }}</label>
                            <select class="form-control select2" name="district_id" id="district_id">
                                @foreach($districts as $id => $entry)
                                    <option value="{{ $id }}" {{ old('district_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('district'))
                                <span class="help-block" role="alert">{{ $errors->first('district') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.payroll.fields.district_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('upazila') ? 'has-error' : '' }}">
                            <label for="upazila_id">{{ trans('cruds.payroll.fields.upazila') }}</label>
                            <select class="form-control select2" name="upazila_id" id="upazila_id">
                                @foreach($upazilas as $id => $entry)
                                    <option value="{{ $id }}" {{ old('upazila_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('upazila'))
                                <span class="help-block" role="alert">{{ $errors->first('upazila') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.payroll.fields.upazila_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('total_student') ? 'has-error' : '' }}">
                            <label class="required" for="total_student">{{ trans('cruds.payroll.fields.total_student') }}</label>
                            <input class="form-control" type="number" name="total_student" id="total_student" value="{{ old('total_student', '') }}" step="1" required>
                            @if($errors->has('total_student'))
                                <span class="help-block" role="alert">{{ $errors->first('total_student') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.payroll.fields.total_student_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('financial_institutaion') ? 'has-error' : '' }}">
                            <label for="financial_institutaion">{{ trans('cruds.payroll.fields.financial_institutaion') }}</label>
                            <input class="form-control" type="text" name="financial_institutaion" id="financial_institutaion" value="{{ old('financial_institutaion', '') }}">
                            @if($errors->has('financial_institutaion'))
                                <span class="help-block" role="alert">{{ $errors->first('financial_institutaion') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.payroll.fields.financial_institutaion_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('total_assistance') ? 'has-error' : '' }}">
                            <label for="total_assistance">{{ trans('cruds.payroll.fields.total_assistance') }}</label>
                            <input class="form-control" type="number" name="total_assistance" id="total_assistance" value="{{ old('total_assistance', '') }}" step="0.01">
                            @if($errors->has('total_assistance'))
                                <span class="help-block" role="alert">{{ $errors->first('total_assistance') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.payroll.fields.total_assistance_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('total_disbursement') ? 'has-error' : '' }}">
                            <label for="total_disbursement">{{ trans('cruds.payroll.fields.total_disbursement') }}</label>
                            <input class="form-control" type="number" name="total_disbursement" id="total_disbursement" value="{{ old('total_disbursement', '') }}" step="0.01">
                            @if($errors->has('total_disbursement'))
                                <span class="help-block" role="alert">{{ $errors->first('total_disbursement') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.payroll.fields.total_disbursement_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('disbursement_status') ? 'has-error' : '' }}">
                            <div>
                                <input type="checkbox" name="disbursement_status" id="disbursement_status" value="1" required {{ old('disbursement_status', 0) == 1 || old('disbursement_status') === null ? 'checked' : '' }}>
                                <label class="required" for="disbursement_status" style="font-weight: 400">{{ trans('cruds.payroll.fields.disbursement_status') }}</label>
                            </div>
                            @if($errors->has('disbursement_status'))
                                <span class="help-block" role="alert">{{ $errors->first('disbursement_status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.payroll.fields.disbursement_status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('activation_date') ? 'has-error' : '' }}">
                            <label for="activation_date">{{ trans('cruds.payroll.fields.activation_date') }}</label>
                            <input class="form-control date" type="text" name="activation_date" id="activation_date" value="{{ old('activation_date') }}">
                            @if($errors->has('activation_date'))
                                <span class="help-block" role="alert">{{ $errors->first('activation_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.payroll.fields.activation_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('deactivation_date') ? 'has-error' : '' }}">
                            <label for="deactivation_date">{{ trans('cruds.payroll.fields.deactivation_date') }}</label>
                            <input class="form-control date" type="text" name="deactivation_date" id="deactivation_date" value="{{ old('deactivation_date') }}">
                            @if($errors->has('deactivation_date'))
                                <span class="help-block" role="alert">{{ $errors->first('deactivation_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.payroll.fields.deactivation_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('api_key') ? 'has-error' : '' }}">
                            <label for="api_key">{{ trans('cruds.payroll.fields.api_key') }}</label>
                            <input class="form-control" type="text" name="api_key" id="api_key" value="{{ old('api_key', '') }}">
                            @if($errors->has('api_key'))
                                <span class="help-block" role="alert">{{ $errors->first('api_key') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.payroll.fields.api_key_helper') }}</span>
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