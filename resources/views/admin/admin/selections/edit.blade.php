@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.selection.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.selections.update", [$selection->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('app_number') ? 'has-error' : '' }}">
                            <label class="required" for="app_number">{{ trans('cruds.selection.fields.app_number') }}</label>
                            <input class="form-control" type="text" name="app_number" id="app_number" value="{{ old('app_number', $selection->app_number) }}" required>
                            @if($errors->has('app_number'))
                                <span class="help-block" role="alert">{{ $errors->first('app_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.selection.fields.app_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('user') ? 'has-error' : '' }}">
                            <label class="required" for="user">{{ trans('cruds.selection.fields.user') }}</label>
                            <input class="form-control" type="text" name="user" id="user" value="{{ old('user', $selection->user) }}" required>
                            @if($errors->has('user'))
                                <span class="help-block" role="alert">{{ $errors->first('user') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.selection.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ih_comments') ? 'has-error' : '' }}">
                            <label class="required" for="ih_comments">{{ trans('cruds.selection.fields.ih_comments') }}</label>
                            <input class="form-control" type="text" name="ih_comments" id="ih_comments" value="{{ old('ih_comments', $selection->ih_comments) }}" required>
                            @if($errors->has('ih_comments'))
                                <span class="help-block" role="alert">{{ $errors->first('ih_comments') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.selection.fields.ih_comments_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ih_approval') ? 'has-error' : '' }}">
                            <label class="required" for="ih_approval">{{ trans('cruds.selection.fields.ih_approval') }}</label>
                            <input class="form-control" type="text" name="ih_approval" id="ih_approval" value="{{ old('ih_approval', $selection->ih_approval) }}" required>
                            @if($errors->has('ih_approval'))
                                <span class="help-block" role="alert">{{ $errors->first('ih_approval') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.selection.fields.ih_approval_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ih_submission') ? 'has-error' : '' }}">
                            <label class="required" for="ih_submission">{{ trans('cruds.selection.fields.ih_submission') }}</label>
                            <input class="form-control" type="text" name="ih_submission" id="ih_submission" value="{{ old('ih_submission', $selection->ih_submission) }}" required>
                            @if($errors->has('ih_submission'))
                                <span class="help-block" role="alert">{{ $errors->first('ih_submission') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.selection.fields.ih_submission_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('useo_approval') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.selection.fields.useo_approval') }}</label>
                            <select class="form-control" name="useo_approval" id="useo_approval" required>
                                <option value disabled {{ old('useo_approval', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Selection::USEO_APPROVAL_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('useo_approval', $selection->useo_approval) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('useo_approval'))
                                <span class="help-block" role="alert">{{ $errors->first('useo_approval') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.selection.fields.useo_approval_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('useo_submission') ? 'has-error' : '' }}">
                            <label class="required" for="useo_submission">{{ trans('cruds.selection.fields.useo_submission') }}</label>
                            <input class="form-control" type="text" name="useo_submission" id="useo_submission" value="{{ old('useo_submission', $selection->useo_submission) }}" required>
                            @if($errors->has('useo_submission'))
                                <span class="help-block" role="alert">{{ $errors->first('useo_submission') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.selection.fields.useo_submission_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pmeat_comments') ? 'has-error' : '' }}">
                            <label class="required" for="pmeat_comments">{{ trans('cruds.selection.fields.pmeat_comments') }}</label>
                            <input class="form-control" type="text" name="pmeat_comments" id="pmeat_comments" value="{{ old('pmeat_comments', $selection->pmeat_comments) }}" required>
                            @if($errors->has('pmeat_comments'))
                                <span class="help-block" role="alert">{{ $errors->first('pmeat_comments') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.selection.fields.pmeat_comments_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pmeat_approval') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.selection.fields.pmeat_approval') }}</label>
                            <select class="form-control" name="pmeat_approval" id="pmeat_approval" required>
                                <option value disabled {{ old('pmeat_approval', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Selection::PMEAT_APPROVAL_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('pmeat_approval', $selection->pmeat_approval) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('pmeat_approval'))
                                <span class="help-block" role="alert">{{ $errors->first('pmeat_approval') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.selection.fields.pmeat_approval_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('eiin') ? 'has-error' : '' }}">
                            <label class="required" for="eiin">{{ trans('cruds.selection.fields.eiin') }}</label>
                            <input class="form-control" type="text" name="eiin" id="eiin" value="{{ old('eiin', $selection->eiin) }}" required>
                            @if($errors->has('eiin'))
                                <span class="help-block" role="alert">{{ $errors->first('eiin') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.selection.fields.eiin_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('division') ? 'has-error' : '' }}">
                            <label class="required" for="division">{{ trans('cruds.selection.fields.division') }}</label>
                            <input class="form-control" type="text" name="division" id="division" value="{{ old('division', $selection->division) }}" required>
                            @if($errors->has('division'))
                                <span class="help-block" role="alert">{{ $errors->first('division') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.selection.fields.division_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('district') ? 'has-error' : '' }}">
                            <label class="required" for="district">{{ trans('cruds.selection.fields.district') }}</label>
                            <input class="form-control" type="text" name="district" id="district" value="{{ old('district', $selection->district) }}" required>
                            @if($errors->has('district'))
                                <span class="help-block" role="alert">{{ $errors->first('district') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.selection.fields.district_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('upazila') ? 'has-error' : '' }}">
                            <label class="required" for="upazila">{{ trans('cruds.selection.fields.upazila') }}</label>
                            <input class="form-control" type="text" name="upazila" id="upazila" value="{{ old('upazila', $selection->upazila) }}" required>
                            @if($errors->has('upazila'))
                                <span class="help-block" role="alert">{{ $errors->first('upazila') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.selection.fields.upazila_helper') }}</span>
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