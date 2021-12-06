@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.instituteBankAccount.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.institute-bank-accounts.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('banking_type') ? 'has-error' : '' }}">
                            <label for="banking_type_id">{{ trans('cruds.instituteBankAccount.fields.banking_type') }}</label>
                            <select class="form-control select2" name="banking_type_id" id="banking_type_id">
                                @foreach($banking_types as $id => $entry)
                                    <option value="{{ $id }}" {{ old('banking_type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('banking_type'))
                                <span class="help-block" role="alert">{{ $errors->first('banking_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.instituteBankAccount.fields.banking_type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('account_name') ? 'has-error' : '' }}">
                            <label class="required" for="account_name">{{ trans('cruds.instituteBankAccount.fields.account_name') }}</label>
                            <input class="form-control" type="text" name="account_name" id="account_name" value="{{ old('account_name', '') }}" required>
                            @if($errors->has('account_name'))
                                <span class="help-block" role="alert">{{ $errors->first('account_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.instituteBankAccount.fields.account_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('account_number') ? 'has-error' : '' }}">
                            <label class="required" for="account_number">{{ trans('cruds.instituteBankAccount.fields.account_number') }}</label>
                            <input class="form-control" type="number" name="account_number" id="account_number" value="{{ old('account_number', '') }}" step="1" required>
                            @if($errors->has('account_number'))
                                <span class="help-block" role="alert">{{ $errors->first('account_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.instituteBankAccount.fields.account_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bank_name') ? 'has-error' : '' }}">
                            <label for="bank_name_id">{{ trans('cruds.instituteBankAccount.fields.bank_name') }}</label>
                            <select class="form-control select2" name="bank_name_id" id="bank_name_id">
                                @foreach($bank_names as $id => $entry)
                                    <option value="{{ $id }}" {{ old('bank_name_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('bank_name'))
                                <span class="help-block" role="alert">{{ $errors->first('bank_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.instituteBankAccount.fields.bank_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('branch_name') ? 'has-error' : '' }}">
                            <label for="branch_name_id">{{ trans('cruds.instituteBankAccount.fields.branch_name') }}</label>
                            <select class="form-control select2" name="branch_name_id" id="branch_name_id">
                                @foreach($branch_names as $id => $entry)
                                    <option value="{{ $id }}" {{ old('branch_name_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('branch_name'))
                                <span class="help-block" role="alert">{{ $errors->first('branch_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.instituteBankAccount.fields.branch_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('routing_no') ? 'has-error' : '' }}">
                            <label for="routing_no_id">{{ trans('cruds.instituteBankAccount.fields.routing_no') }}</label>
                            <select class="form-control select2" name="routing_no_id" id="routing_no_id">
                                @foreach($routing_nos as $id => $entry)
                                    <option value="{{ $id }}" {{ old('routing_no_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('routing_no'))
                                <span class="help-block" role="alert">{{ $errors->first('routing_no') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.instituteBankAccount.fields.routing_no_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('eiin') ? 'has-error' : '' }}">
                            <label for="eiin_id">{{ trans('cruds.instituteBankAccount.fields.eiin') }}</label>
                            <select class="form-control select2" name="eiin_id" id="eiin_id">
                                @foreach($eiins as $id => $entry)
                                    <option value="{{ $id }}" {{ old('eiin_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('eiin'))
                                <span class="help-block" role="alert">{{ $errors->first('eiin') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.instituteBankAccount.fields.eiin_helper') }}</span>
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