@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.ministryDivision.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.ministry-divisions.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('ministry_name') ? 'has-error' : '' }}">
                            <label class="required" for="ministry_name">{{ trans('cruds.ministryDivision.fields.ministry_name') }}</label>
                            <input class="form-control" type="text" name="ministry_name" id="ministry_name" value="{{ old('ministry_name', '') }}" required>
                            @if($errors->has('ministry_name'))
                                <span class="help-block" role="alert">{{ $errors->first('ministry_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.ministryDivision.fields.ministry_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('division_name') ? 'has-error' : '' }}">
                            <label for="division_name">{{ trans('cruds.ministryDivision.fields.division_name') }}</label>
                            <input class="form-control" type="text" name="division_name" id="division_name" value="{{ old('division_name', '') }}">
                            @if($errors->has('division_name'))
                                <span class="help-block" role="alert">{{ $errors->first('division_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.ministryDivision.fields.division_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('active') ? 'has-error' : '' }}">
                            <div>
                                <input type="checkbox" name="active" id="active" value="1" required {{ old('active', 0) == 1 || old('active') === null ? 'checked' : '' }}>
                                <label class="required" for="active" style="font-weight: 400">{{ trans('cruds.ministryDivision.fields.active') }}</label>
                            </div>
                            @if($errors->has('active'))
                                <span class="help-block" role="alert">{{ $errors->first('active') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.ministryDivision.fields.active_helper') }}</span>
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