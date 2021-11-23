@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.examVersion.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.exam-versions.update", [$examVersion->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('exam_version_name') ? 'has-error' : '' }}">
                            <label for="exam_version_name">{{ trans('cruds.examVersion.fields.exam_version_name') }}</label>
                            <input class="form-control" type="text" name="exam_version_name" id="exam_version_name" value="{{ old('exam_version_name', $examVersion->exam_version_name) }}">
                            @if($errors->has('exam_version_name'))
                                <span class="help-block" role="alert">{{ $errors->first('exam_version_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.examVersion.fields.exam_version_name_helper') }}</span>
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