@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.familyStatus.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.family-statuses.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('status_name') ? 'has-error' : '' }}">
                            <label class="required" for="status_name">{{ trans('cruds.familyStatus.fields.status_name') }}</label>
                            <input class="form-control" type="text" name="status_name" id="status_name" value="{{ old('status_name', '') }}" required>
                            @if($errors->has('status_name'))
                                <span class="help-block" role="alert">{{ $errors->first('status_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.familyStatus.fields.status_name_helper') }}</span>
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