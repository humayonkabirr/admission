@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.academicLevel.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.academic-levels.update", [$academicLevel->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('level_name') ? 'has-error' : '' }}">
                            <label class="required" for="level_name">{{ trans('cruds.academicLevel.fields.level_name') }}</label>
                            <input class="form-control" type="text" name="level_name" id="level_name" value="{{ old('level_name', $academicLevel->level_name) }}" required>
                            @if($errors->has('level_name'))
                                <span class="help-block" role="alert">{{ $errors->first('level_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.academicLevel.fields.level_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('active') ? 'has-error' : '' }}">
                            <div>
                                <input type="checkbox" name="active" id="active" value="1" {{ $academicLevel->active || old('active', 0) === 1 ? 'checked' : '' }} required>
                                <label class="required" for="active" style="font-weight: 400">{{ trans('cruds.academicLevel.fields.active') }}</label>
                            </div>
                            @if($errors->has('active'))
                                <span class="help-block" role="alert">{{ $errors->first('active') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.academicLevel.fields.active_helper') }}</span>
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