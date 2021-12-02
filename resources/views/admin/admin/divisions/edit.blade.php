@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.division.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.divisions.update", [$division->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('division_name') ? 'has-error' : '' }}">
                            <label class="required" for="division_name">{{ trans('cruds.division.fields.division_name') }}</label>
                            <input class="form-control" type="text" name="division_name" id="division_name" value="{{ old('division_name', $division->division_name) }}" required>
                            @if($errors->has('division_name'))
                                <span class="help-block" role="alert">{{ $errors->first('division_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.division.fields.division_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('division_name_en') ? 'has-error' : '' }}">
                            <label for="division_name_en">{{ trans('cruds.division.fields.division_name_en') }}</label>
                            <input class="form-control" type="text" name="division_name_en" id="division_name_en" value="{{ old('division_name_en', $division->division_name_en) }}">
                            @if($errors->has('division_name_en'))
                                <span class="help-block" role="alert">{{ $errors->first('division_name_en') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.division.fields.division_name_en_helper') }}</span>
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