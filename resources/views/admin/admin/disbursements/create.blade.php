@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.disbursement.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.disbursements.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('app_number') ? 'has-error' : '' }}">
                            <label class="required" for="app_number">{{ trans('cruds.disbursement.fields.app_number') }}</label>
                            <input class="form-control" type="text" name="app_number" id="app_number" value="{{ old('app_number', '') }}" required>
                            @if($errors->has('app_number'))
                                <span class="help-block" role="alert">{{ $errors->first('app_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.disbursement.fields.app_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('stu_name') ? 'has-error' : '' }}">
                            <label class="required" for="stu_name">{{ trans('cruds.disbursement.fields.stu_name') }}</label>
                            <input class="form-control" type="text" name="stu_name" id="stu_name" value="{{ old('stu_name', '') }}" required>
                            @if($errors->has('stu_name'))
                                <span class="help-block" role="alert">{{ $errors->first('stu_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.disbursement.fields.stu_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('brid') ? 'has-error' : '' }}">
                            <label class="required" for="brid">{{ trans('cruds.disbursement.fields.brid') }}</label>
                            <input class="form-control" type="text" name="brid" id="brid" value="{{ old('brid', '') }}" required>
                            @if($errors->has('brid'))
                                <span class="help-block" role="alert">{{ $errors->first('brid') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.disbursement.fields.brid_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('acc_no') ? 'has-error' : '' }}">
                            <label class="required" for="acc_no">{{ trans('cruds.disbursement.fields.acc_no') }}</label>
                            <input class="form-control" type="text" name="acc_no" id="acc_no" value="{{ old('acc_no', '') }}" required>
                            @if($errors->has('acc_no'))
                                <span class="help-block" role="alert">{{ $errors->first('acc_no') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.disbursement.fields.acc_no_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('acc_name') ? 'has-error' : '' }}">
                            <label class="required" for="acc_name">{{ trans('cruds.disbursement.fields.acc_name') }}</label>
                            <input class="form-control" type="text" name="acc_name" id="acc_name" value="{{ old('acc_name', '') }}" required>
                            @if($errors->has('acc_name'))
                                <span class="help-block" role="alert">{{ $errors->first('acc_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.disbursement.fields.acc_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bank_name') ? 'has-error' : '' }}">
                            <label class="required" for="bank_name">{{ trans('cruds.disbursement.fields.bank_name') }}</label>
                            <input class="form-control" type="text" name="bank_name" id="bank_name" value="{{ old('bank_name', '') }}" required>
                            @if($errors->has('bank_name'))
                                <span class="help-block" role="alert">{{ $errors->first('bank_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.disbursement.fields.bank_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bank_branch') ? 'has-error' : '' }}">
                            <label class="required" for="bank_branch">{{ trans('cruds.disbursement.fields.bank_branch') }}</label>
                            <input class="form-control" type="text" name="bank_branch" id="bank_branch" value="{{ old('bank_branch', '') }}" required>
                            @if($errors->has('bank_branch'))
                                <span class="help-block" role="alert">{{ $errors->first('bank_branch') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.disbursement.fields.bank_branch_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('routing_no') ? 'has-error' : '' }}">
                            <label class="required" for="routing_no">{{ trans('cruds.disbursement.fields.routing_no') }}</label>
                            <input class="form-control" type="text" name="routing_no" id="routing_no" value="{{ old('routing_no', '') }}" required>
                            @if($errors->has('routing_no'))
                                <span class="help-block" role="alert">{{ $errors->first('routing_no') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.disbursement.fields.routing_no_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('student_division') ? 'has-error' : '' }}">
                            <label class="required" for="student_division">{{ trans('cruds.disbursement.fields.student_division') }}</label>
                            <input class="form-control" type="text" name="student_division" id="student_division" value="{{ old('student_division', '') }}" required>
                            @if($errors->has('student_division'))
                                <span class="help-block" role="alert">{{ $errors->first('student_division') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.disbursement.fields.student_division_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('student_district') ? 'has-error' : '' }}">
                            <label class="required" for="student_district">{{ trans('cruds.disbursement.fields.student_district') }}</label>
                            <input class="form-control" type="text" name="student_district" id="student_district" value="{{ old('student_district', '') }}" required>
                            @if($errors->has('student_district'))
                                <span class="help-block" role="alert">{{ $errors->first('student_district') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.disbursement.fields.student_district_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('student_upazila') ? 'has-error' : '' }}">
                            <label class="required" for="student_upazila">{{ trans('cruds.disbursement.fields.student_upazila') }}</label>
                            <input class="form-control" type="text" name="student_upazila" id="student_upazila" value="{{ old('student_upazila', '') }}" required>
                            @if($errors->has('student_upazila'))
                                <span class="help-block" role="alert">{{ $errors->first('student_upazila') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.disbursement.fields.student_upazila_helper') }}</span>
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