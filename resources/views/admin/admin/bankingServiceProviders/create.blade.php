@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.bankingServiceProvider.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.banking-service-providers.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.bankingServiceProvider.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.bankingServiceProvider.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bank_type') ? 'has-error' : '' }}">
                            <label class="required" for="bank_type_id">{{ trans('cruds.bankingServiceProvider.fields.bank_type') }}</label>
                            <select class="form-control select2" name="bank_type_id" id="bank_type_id" required>
                                @foreach($bank_types as $id => $entry)
                                    <option value="{{ $id }}" {{ old('bank_type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('bank_type'))
                                <span class="help-block" role="alert">{{ $errors->first('bank_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.bankingServiceProvider.fields.bank_type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('head_office') ? 'has-error' : '' }}">
                            <label for="head_office">{{ trans('cruds.bankingServiceProvider.fields.head_office') }}</label>
                            <input class="form-control" type="text" name="head_office" id="head_office" value="{{ old('head_office', '') }}">
                            @if($errors->has('head_office'))
                                <span class="help-block" role="alert">{{ $errors->first('head_office') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.bankingServiceProvider.fields.head_office_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('known_as') ? 'has-error' : '' }}">
                            <label class="required" for="known_as">{{ trans('cruds.bankingServiceProvider.fields.known_as') }}</label>
                            <input class="form-control" type="text" name="known_as" id="known_as" value="{{ old('known_as', '') }}" required>
                            @if($errors->has('known_as'))
                                <span class="help-block" role="alert">{{ $errors->first('known_as') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.bankingServiceProvider.fields.known_as_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('swift_code') ? 'has-error' : '' }}">
                            <label for="swift_code">{{ trans('cruds.bankingServiceProvider.fields.swift_code') }}</label>
                            <input class="form-control" type="text" name="swift_code" id="swift_code" value="{{ old('swift_code', '') }}">
                            @if($errors->has('swift_code'))
                                <span class="help-block" role="alert">{{ $errors->first('swift_code') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.bankingServiceProvider.fields.swift_code_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.bankingServiceProvider.fields.category') }}</label>
                            <select class="form-control" name="category" id="category">
                                <option value disabled {{ old('category', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\BankingServiceProvider::CATEGORY_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('category', 'NULL') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category'))
                                <span class="help-block" role="alert">{{ $errors->first('category') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.bankingServiceProvider.fields.category_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('website') ? 'has-error' : '' }}">
                            <label for="website">{{ trans('cruds.bankingServiceProvider.fields.website') }}</label>
                            <input class="form-control" type="text" name="website" id="website" value="{{ old('website', '') }}">
                            @if($errors->has('website'))
                                <span class="help-block" role="alert">{{ $errors->first('website') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.bankingServiceProvider.fields.website_helper') }}</span>
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