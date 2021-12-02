@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.applicationTracking.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.application-trackings.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('user_id_no') ? 'has-error' : '' }}">
                            <label class="required" for="user_id_no_id">{{ trans('cruds.applicationTracking.fields.user_id_no') }}</label>
                            <select class="form-control select2" name="user_id_no_id" id="user_id_no_id" required>
                                @foreach($user_id_nos as $id => $entry)
                                    <option value="{{ $id }}" {{ old('user_id_no_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user_id_no'))
                                <span class="help-block" role="alert">{{ $errors->first('user_id_no') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.applicationTracking.fields.user_id_no_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('application_no') ? 'has-error' : '' }}">
                            <label class="required" for="application_no">{{ trans('cruds.applicationTracking.fields.application_no') }}</label>
                            <input class="form-control" type="text" name="application_no" id="application_no" value="{{ old('application_no', '') }}" required>
                            @if($errors->has('application_no'))
                                <span class="help-block" role="alert">{{ $errors->first('application_no') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.applicationTracking.fields.application_no_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_completed') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="is_completed" value="0">
                                <input type="checkbox" name="is_completed" id="is_completed" value="1" {{ old('is_completed', 0) == 1 ? 'checked' : '' }}>
                                <label for="is_completed" style="font-weight: 400">{{ trans('cruds.applicationTracking.fields.is_completed') }}</label>
                            </div>
                            @if($errors->has('is_completed'))
                                <span class="help-block" role="alert">{{ $errors->first('is_completed') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.applicationTracking.fields.is_completed_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_submitted') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="is_submitted" value="0">
                                <input type="checkbox" name="is_submitted" id="is_submitted" value="1" {{ old('is_submitted', 0) == 1 ? 'checked' : '' }}>
                                <label for="is_submitted" style="font-weight: 400">{{ trans('cruds.applicationTracking.fields.is_submitted') }}</label>
                            </div>
                            @if($errors->has('is_submitted'))
                                <span class="help-block" role="alert">{{ $errors->first('is_submitted') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.applicationTracking.fields.is_submitted_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ih_seen') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="ih_seen" value="0">
                                <input type="checkbox" name="ih_seen" id="ih_seen" value="1" {{ old('ih_seen', 0) == 1 ? 'checked' : '' }}>
                                <label for="ih_seen" style="font-weight: 400">{{ trans('cruds.applicationTracking.fields.ih_seen') }}</label>
                            </div>
                            @if($errors->has('ih_seen'))
                                <span class="help-block" role="alert">{{ $errors->first('ih_seen') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.applicationTracking.fields.ih_seen_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ih_approve') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="ih_approve" value="0">
                                <input type="checkbox" name="ih_approve" id="ih_approve" value="1" {{ old('ih_approve', 0) == 1 ? 'checked' : '' }}>
                                <label for="ih_approve" style="font-weight: 400">{{ trans('cruds.applicationTracking.fields.ih_approve') }}</label>
                            </div>
                            @if($errors->has('ih_approve'))
                                <span class="help-block" role="alert">{{ $errors->first('ih_approve') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.applicationTracking.fields.ih_approve_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ih_forwarded') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="ih_forwarded" value="0">
                                <input type="checkbox" name="ih_forwarded" id="ih_forwarded" value="1" {{ old('ih_forwarded', 0) == 1 ? 'checked' : '' }}>
                                <label for="ih_forwarded" style="font-weight: 400">{{ trans('cruds.applicationTracking.fields.ih_forwarded') }}</label>
                            </div>
                            @if($errors->has('ih_forwarded'))
                                <span class="help-block" role="alert">{{ $errors->first('ih_forwarded') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.applicationTracking.fields.ih_forwarded_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('useo_forwarded') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="useo_forwarded" value="0">
                                <input type="checkbox" name="useo_forwarded" id="useo_forwarded" value="1" {{ old('useo_forwarded', 0) == 1 ? 'checked' : '' }}>
                                <label for="useo_forwarded" style="font-weight: 400">{{ trans('cruds.applicationTracking.fields.useo_forwarded') }}</label>
                            </div>
                            @if($errors->has('useo_forwarded'))
                                <span class="help-block" role="alert">{{ $errors->first('useo_forwarded') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.applicationTracking.fields.useo_forwarded_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pmeat_accepted') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="pmeat_accepted" value="0">
                                <input type="checkbox" name="pmeat_accepted" id="pmeat_accepted" value="1" {{ old('pmeat_accepted', 0) == 1 ? 'checked' : '' }}>
                                <label for="pmeat_accepted" style="font-weight: 400">{{ trans('cruds.applicationTracking.fields.pmeat_accepted') }}</label>
                            </div>
                            @if($errors->has('pmeat_accepted'))
                                <span class="help-block" role="alert">{{ $errors->first('pmeat_accepted') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.applicationTracking.fields.pmeat_accepted_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pmeat_selected') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="pmeat_selected" value="0">
                                <input type="checkbox" name="pmeat_selected" id="pmeat_selected" value="1" {{ old('pmeat_selected', 0) == 1 ? 'checked' : '' }}>
                                <label for="pmeat_selected" style="font-weight: 400">{{ trans('cruds.applicationTracking.fields.pmeat_selected') }}</label>
                            </div>
                            @if($errors->has('pmeat_selected'))
                                <span class="help-block" role="alert">{{ $errors->first('pmeat_selected') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.applicationTracking.fields.pmeat_selected_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('rejection_reaseon') ? 'has-error' : '' }}">
                            <label for="rejection_reaseon">{{ trans('cruds.applicationTracking.fields.rejection_reaseon') }}</label>
                            <input class="form-control" type="text" name="rejection_reaseon" id="rejection_reaseon" value="{{ old('rejection_reaseon', '') }}">
                            @if($errors->has('rejection_reaseon'))
                                <span class="help-block" role="alert">{{ $errors->first('rejection_reaseon') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.applicationTracking.fields.rejection_reaseon_helper') }}</span>
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