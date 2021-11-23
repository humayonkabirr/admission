@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.levelWiseClass.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.level-wise-classes.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('class_name') ? 'has-error' : '' }}">
                            <label class="required" for="class_name">{{ trans('cruds.levelWiseClass.fields.class_name') }}</label>
                            <input class="form-control" type="text" name="class_name" id="class_name" value="{{ old('class_name', '') }}" required>
                            @if($errors->has('class_name'))
                                <span class="help-block" role="alert">{{ $errors->first('class_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.levelWiseClass.fields.class_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('academic_level') ? 'has-error' : '' }}">
                            <label for="academic_level_id">{{ trans('cruds.levelWiseClass.fields.academic_level') }}</label>
                            <select class="form-control select2" name="academic_level_id" id="academic_level_id">
                                @foreach($academic_levels as $id => $entry)
                                    <option value="{{ $id }}" {{ old('academic_level_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('academic_level'))
                                <span class="help-block" role="alert">{{ $errors->first('academic_level') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.levelWiseClass.fields.academic_level_helper') }}</span>
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