@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.paymentHistory.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.payment-histories.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('payroll') ? 'has-error' : '' }}">
                            <label for="payroll_id">{{ trans('cruds.paymentHistory.fields.payroll') }}</label>
                            <select class="form-control select2" name="payroll_id" id="payroll_id">
                                @foreach($payrolls as $id => $entry)
                                    <option value="{{ $id }}" {{ old('payroll_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('payroll'))
                                <span class="help-block" role="alert">{{ $errors->first('payroll') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.paymentHistory.fields.payroll_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('app_number') ? 'has-error' : '' }}">
                            <label class="required" for="app_number">{{ trans('cruds.paymentHistory.fields.app_number') }}</label>
                            <input class="form-control" type="text" name="app_number" id="app_number" value="{{ old('app_number', '') }}" required>
                            @if($errors->has('app_number'))
                                <span class="help-block" role="alert">{{ $errors->first('app_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.paymentHistory.fields.app_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('stu_name') ? 'has-error' : '' }}">
                            <label class="required" for="stu_name">{{ trans('cruds.paymentHistory.fields.stu_name') }}</label>
                            <input class="form-control" type="text" name="stu_name" id="stu_name" value="{{ old('stu_name', '') }}" required>
                            @if($errors->has('stu_name'))
                                <span class="help-block" role="alert">{{ $errors->first('stu_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.paymentHistory.fields.stu_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('brid') ? 'has-error' : '' }}">
                            <label class="required" for="brid">{{ trans('cruds.paymentHistory.fields.brid') }}</label>
                            <input class="form-control" type="text" name="brid" id="brid" value="{{ old('brid', '') }}" required>
                            @if($errors->has('brid'))
                                <span class="help-block" role="alert">{{ $errors->first('brid') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.paymentHistory.fields.brid_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bank_acc_no') ? 'has-error' : '' }}">
                            <label class="required" for="bank_acc_no">{{ trans('cruds.paymentHistory.fields.bank_acc_no') }}</label>
                            <input class="form-control" type="text" name="bank_acc_no" id="bank_acc_no" value="{{ old('bank_acc_no', '') }}" required>
                            @if($errors->has('bank_acc_no'))
                                <span class="help-block" role="alert">{{ $errors->first('bank_acc_no') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.paymentHistory.fields.bank_acc_no_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bank_acc_name') ? 'has-error' : '' }}">
                            <label class="required" for="bank_acc_name">{{ trans('cruds.paymentHistory.fields.bank_acc_name') }}</label>
                            <input class="form-control" type="text" name="bank_acc_name" id="bank_acc_name" value="{{ old('bank_acc_name', '') }}" required>
                            @if($errors->has('bank_acc_name'))
                                <span class="help-block" role="alert">{{ $errors->first('bank_acc_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.paymentHistory.fields.bank_acc_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('student_bank_name') ? 'has-error' : '' }}">
                            <label class="required" for="student_bank_name">{{ trans('cruds.paymentHistory.fields.student_bank_name') }}</label>
                            <input class="form-control" type="text" name="student_bank_name" id="student_bank_name" value="{{ old('student_bank_name', '') }}" required>
                            @if($errors->has('student_bank_name'))
                                <span class="help-block" role="alert">{{ $errors->first('student_bank_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.paymentHistory.fields.student_bank_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('student_bank_branch') ? 'has-error' : '' }}">
                            <label class="required" for="student_bank_branch">{{ trans('cruds.paymentHistory.fields.student_bank_branch') }}</label>
                            <input class="form-control" type="text" name="student_bank_branch" id="student_bank_branch" value="{{ old('student_bank_branch', '') }}" required>
                            @if($errors->has('student_bank_branch'))
                                <span class="help-block" role="alert">{{ $errors->first('student_bank_branch') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.paymentHistory.fields.student_bank_branch_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bank_routing_no') ? 'has-error' : '' }}">
                            <label class="required" for="bank_routing_no">{{ trans('cruds.paymentHistory.fields.bank_routing_no') }}</label>
                            <input class="form-control" type="text" name="bank_routing_no" id="bank_routing_no" value="{{ old('bank_routing_no', '') }}" required>
                            @if($errors->has('bank_routing_no'))
                                <span class="help-block" role="alert">{{ $errors->first('bank_routing_no') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.paymentHistory.fields.bank_routing_no_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('student_division') ? 'has-error' : '' }}">
                            <label class="required" for="student_division">{{ trans('cruds.paymentHistory.fields.student_division') }}</label>
                            <input class="form-control" type="text" name="student_division" id="student_division" value="{{ old('student_division', '') }}" required>
                            @if($errors->has('student_division'))
                                <span class="help-block" role="alert">{{ $errors->first('student_division') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.paymentHistory.fields.student_division_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('student_district') ? 'has-error' : '' }}">
                            <label class="required" for="student_district">{{ trans('cruds.paymentHistory.fields.student_district') }}</label>
                            <input class="form-control" type="text" name="student_district" id="student_district" value="{{ old('student_district', '') }}" required>
                            @if($errors->has('student_district'))
                                <span class="help-block" role="alert">{{ $errors->first('student_district') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.paymentHistory.fields.student_district_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('student_upazila') ? 'has-error' : '' }}">
                            <label class="required" for="student_upazila">{{ trans('cruds.paymentHistory.fields.student_upazila') }}</label>
                            <input class="form-control" type="text" name="student_upazila" id="student_upazila" value="{{ old('student_upazila', '') }}" required>
                            @if($errors->has('student_upazila'))
                                <span class="help-block" role="alert">{{ $errors->first('student_upazila') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.paymentHistory.fields.student_upazila_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pay_amount') ? 'has-error' : '' }}">
                            <label class="required" for="pay_amount">{{ trans('cruds.paymentHistory.fields.pay_amount') }}</label>
                            <input class="form-control" type="number" name="pay_amount" id="pay_amount" value="{{ old('pay_amount', '') }}" step="0.01" required>
                            @if($errors->has('pay_amount'))
                                <span class="help-block" role="alert">{{ $errors->first('pay_amount') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.paymentHistory.fields.pay_amount_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('service_provider') ? 'has-error' : '' }}">
                            <label class="required" for="service_provider">{{ trans('cruds.paymentHistory.fields.service_provider') }}</label>
                            <input class="form-control" type="text" name="service_provider" id="service_provider" value="{{ old('service_provider', '') }}" required>
                            @if($errors->has('service_provider'))
                                <span class="help-block" role="alert">{{ $errors->first('service_provider') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.paymentHistory.fields.service_provider_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('disbursement_amount') ? 'has-error' : '' }}">
                            <label class="required" for="disbursement_amount">{{ trans('cruds.paymentHistory.fields.disbursement_amount') }}</label>
                            <input class="form-control" type="number" name="disbursement_amount" id="disbursement_amount" value="{{ old('disbursement_amount', '') }}" step="0.01" required>
                            @if($errors->has('disbursement_amount'))
                                <span class="help-block" role="alert">{{ $errors->first('disbursement_amount') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.paymentHistory.fields.disbursement_amount_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('disbursement_date') ? 'has-error' : '' }}">
                            <label class="required" for="disbursement_date">{{ trans('cruds.paymentHistory.fields.disbursement_date') }}</label>
                            <input class="form-control date" type="text" name="disbursement_date" id="disbursement_date" value="{{ old('disbursement_date') }}" required>
                            @if($errors->has('disbursement_date'))
                                <span class="help-block" role="alert">{{ $errors->first('disbursement_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.paymentHistory.fields.disbursement_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('disbursement_status') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.paymentHistory.fields.disbursement_status') }}</label>
                            <select class="form-control" name="disbursement_status" id="disbursement_status" required>
                                <option value disabled {{ old('disbursement_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\PaymentHistory::DISBURSEMENT_STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('disbursement_status', '0') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('disbursement_status'))
                                <span class="help-block" role="alert">{{ $errors->first('disbursement_status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.paymentHistory.fields.disbursement_status_helper') }}</span>
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