@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.accountInfo.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.account-infos.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('user') ? 'has-error' : '' }}">
                            <label class="required" for="user">{{ trans('cruds.accountInfo.fields.user') }}</label>
                            <input class="form-control" type="text" name="user" id="user" value="{{ old('user', '') }}" required>
                            @if($errors->has('user'))
                                <span class="help-block" role="alert">{{ $errors->first('user') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.accountInfo.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('app_number') ? 'has-error' : '' }}">
                            <label class="required" for="app_number_id">{{ trans('cruds.accountInfo.fields.app_number') }}</label>
                            <select class="form-control select2" name="app_number_id" id="app_number_id" required>
                                @foreach($app_numbers as $id => $entry)
                                    <option value="{{ $id }}" {{ old('app_number_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('app_number'))
                                <span class="help-block" role="alert">{{ $errors->first('app_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.accountInfo.fields.app_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('student_name') ? 'has-error' : '' }}">
                            <label class="required" for="student_name">{{ trans('cruds.accountInfo.fields.student_name') }}</label>
                            <input class="form-control" type="text" name="student_name" id="student_name" value="{{ old('student_name', '') }}" required>
                            @if($errors->has('student_name'))
                                <span class="help-block" role="alert">{{ $errors->first('student_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.accountInfo.fields.student_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('banking_type') ? 'has-error' : '' }}">
                            <label class="required" for="banking_type_id">{{ trans('cruds.accountInfo.fields.banking_type') }}</label>
                            <select class="form-control select2" name="banking_type_id" id="banking_type_id" required>
                                @foreach($banking_types as $id => $entry)
                                    <option value="{{ $id }}" {{ old('banking_type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('banking_type'))
                                <span class="help-block" role="alert">{{ $errors->first('banking_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.accountInfo.fields.banking_type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bank_name') ? 'has-error' : '' }}">
                            <label class="required" for="bank_name_id">{{ trans('cruds.accountInfo.fields.bank_name') }}</label>
                            <select class="form-control select2" name="bank_name_id" id="bank_name_id" required>
                                @foreach($bank_names as $id => $entry)
                                    <option value="{{ $id }}" {{ old('bank_name_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('bank_name'))
                                <span class="help-block" role="alert">{{ $errors->first('bank_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.accountInfo.fields.bank_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('district') ? 'has-error' : '' }}">
                            <label for="district_id">{{ trans('cruds.accountInfo.fields.district') }}</label>
                            <select class="form-control select2" name="district_id" id="district_id">
                                @foreach($districts as $id => $entry)
                                    <option value="{{ $id }}" {{ old('district_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('district'))
                                <span class="help-block" role="alert">{{ $errors->first('district') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.accountInfo.fields.district_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bank_branch') ? 'has-error' : '' }}">
                            <label for="bank_branch_id">{{ trans('cruds.accountInfo.fields.bank_branch') }}</label>
                            <select class="form-control select2" name="bank_branch_id" id="bank_branch_id">
                                @foreach($bank_branches as $id => $entry)
                                    <option value="{{ $id }}" {{ old('bank_branch_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('bank_branch'))
                                <span class="help-block" role="alert">{{ $errors->first('bank_branch') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.accountInfo.fields.bank_branch_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('routing_no') ? 'has-error' : '' }}">
                            <label class="required" for="routing_no">{{ trans('cruds.accountInfo.fields.routing_no') }}</label>
                            <input class="form-control" type="text" name="routing_no" id="routing_no" value="{{ old('routing_no', '') }}" required>
                            @if($errors->has('routing_no'))
                                <span class="help-block" role="alert">{{ $errors->first('routing_no') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.accountInfo.fields.routing_no_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bank_account_owner') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.accountInfo.fields.bank_account_owner') }}</label>
                            <select class="form-control" name="bank_account_owner" id="bank_account_owner" required>
                                <option value disabled {{ old('bank_account_owner', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\AccountInfo::BANK_ACCOUNT_OWNER_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('bank_account_owner', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('bank_account_owner'))
                                <span class="help-block" role="alert">{{ $errors->first('bank_account_owner') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.accountInfo.fields.bank_account_owner_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('acc_name') ? 'has-error' : '' }}">
                            <label class="required" for="acc_name">{{ trans('cruds.accountInfo.fields.acc_name') }}</label>
                            <input class="form-control" type="text" name="acc_name" id="acc_name" value="{{ old('acc_name', '') }}" required>
                            @if($errors->has('acc_name'))
                                <span class="help-block" role="alert">{{ $errors->first('acc_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.accountInfo.fields.acc_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('acc_no') ? 'has-error' : '' }}">
                            <label class="required" for="acc_no">{{ trans('cruds.accountInfo.fields.acc_no') }}</label>
                            <input class="form-control" type="text" name="acc_no" id="acc_no" value="{{ old('acc_no', '') }}" required>
                            @if($errors->has('acc_no'))
                                <span class="help-block" role="alert">{{ $errors->first('acc_no') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.accountInfo.fields.acc_no_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('account_type') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.accountInfo.fields.account_type') }}</label>
                            <select class="form-control" name="account_type" id="account_type">
                                <option value disabled {{ old('account_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\AccountInfo::ACCOUNT_TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('account_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('account_type'))
                                <span class="help-block" role="alert">{{ $errors->first('account_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.accountInfo.fields.account_type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('branch_code') ? 'has-error' : '' }}">
                            <label for="branch_code_id">{{ trans('cruds.accountInfo.fields.branch_code') }}</label>
                            <select class="form-control select2" name="branch_code_id" id="branch_code_id">
                                @foreach($branch_codes as $id => $entry)
                                    <option value="{{ $id }}" {{ old('branch_code_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('branch_code'))
                                <span class="help-block" role="alert">{{ $errors->first('branch_code') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.accountInfo.fields.branch_code_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('account_holder_nid') ? 'has-error' : '' }}">
                            <label class="required" for="account_holder_nid">{{ trans('cruds.accountInfo.fields.account_holder_nid') }}</label>
                            <input class="form-control" type="number" name="account_holder_nid" id="account_holder_nid" value="{{ old('account_holder_nid', '') }}" step="1" required>
                            @if($errors->has('account_holder_nid'))
                                <span class="help-block" role="alert">{{ $errors->first('account_holder_nid') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.accountInfo.fields.account_holder_nid_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('eiin') ? 'has-error' : '' }}">
                            <label for="eiin">{{ trans('cruds.accountInfo.fields.eiin') }}</label>
                            <input class="form-control" type="text" name="eiin" id="eiin" value="{{ old('eiin', '') }}">
                            @if($errors->has('eiin'))
                                <span class="help-block" role="alert">{{ $errors->first('eiin') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.accountInfo.fields.eiin_helper') }}</span>
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