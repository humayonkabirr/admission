@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.policy.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.policies.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('policy_name') ? 'has-error' : '' }}">
                            <label class="required" for="policy_name">{{ trans('cruds.policy.fields.policy_name') }}</label>
                            <input class="form-control" type="text" name="policy_name" id="policy_name" value="{{ old('policy_name', '') }}" required>
                            @if($errors->has('policy_name'))
                                <span class="help-block" role="alert">{{ $errors->first('policy_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.policy.fields.policy_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('policy_year') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.policy.fields.policy_year') }}</label>
                            <select class="form-control" name="policy_year" id="policy_year" required>
                                <option value disabled {{ old('policy_year', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Policy::POLICY_YEAR_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('policy_year', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('policy_year'))
                                <span class="help-block" role="alert">{{ $errors->first('policy_year') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.policy.fields.policy_year_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('last_gpa') ? 'has-error' : '' }}">
                            <label for="last_gpa">{{ trans('cruds.policy.fields.last_gpa') }}</label>
                            <input class="form-control" type="number" name="last_gpa" id="last_gpa" value="{{ old('last_gpa', '') }}" step="0.01" max="5">
                            @if($errors->has('last_gpa'))
                                <span class="help-block" role="alert">{{ $errors->first('last_gpa') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.policy.fields.last_gpa_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('max_annual_income') ? 'has-error' : '' }}">
                            <label for="max_annual_income">{{ trans('cruds.policy.fields.max_annual_income') }}</label>
                            <input class="form-control" type="number" name="max_annual_income" id="max_annual_income" value="{{ old('max_annual_income', '') }}" step="0.01">
                            @if($errors->has('max_annual_income'))
                                <span class="help-block" role="alert">{{ $errors->first('max_annual_income') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.policy.fields.max_annual_income_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('active') ? 'has-error' : '' }}">
                            <div>
                                <input type="checkbox" name="active" id="active" value="1" required {{ old('active', 0) == 1 || old('active') === null ? 'checked' : '' }}>
                                <label class="required" for="active" style="font-weight: 400">{{ trans('cruds.policy.fields.active') }}</label>
                            </div>
                            @if($errors->has('active'))
                                <span class="help-block" role="alert">{{ $errors->first('active') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.policy.fields.active_helper') }}</span>
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