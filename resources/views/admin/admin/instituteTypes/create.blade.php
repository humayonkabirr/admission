@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.instituteType.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.institute-types.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('institute_type') ? 'has-error' : '' }}">
                            <label class="required" for="institute_type">{{ trans('cruds.instituteType.fields.institute_type') }}</label>
                            <input class="form-control" type="text" name="institute_type" id="institute_type" value="{{ old('institute_type', '') }}" required>
                            @if($errors->has('institute_type'))
                                <span class="help-block" role="alert">{{ $errors->first('institute_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.instituteType.fields.institute_type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('active') ? 'has-error' : '' }}">
                            <div>
                                <input type="checkbox" name="active" id="active" value="1" required {{ old('active', 0) == 1 || old('active') === null ? 'checked' : '' }}>
                                <label class="required" for="active" style="font-weight: 400">{{ trans('cruds.instituteType.fields.active') }}</label>
                            </div>
                            @if($errors->has('active'))
                                <span class="help-block" role="alert">{{ $errors->first('active') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.instituteType.fields.active_helper') }}</span>
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