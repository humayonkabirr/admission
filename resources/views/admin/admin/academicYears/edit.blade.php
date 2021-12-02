@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.academicYear.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.academic-years.update", [$academicYear->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('academic_year') ? 'has-error' : '' }}">
                            <label class="required" for="academic_year">{{ trans('cruds.academicYear.fields.academic_year') }}</label>
                            <input class="form-control" type="text" name="academic_year" id="academic_year" value="{{ old('academic_year', $academicYear->academic_year) }}" required>
                            @if($errors->has('academic_year'))
                                <span class="help-block" role="alert">{{ $errors->first('academic_year') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.academicYear.fields.academic_year_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('start_year') ? 'has-error' : '' }}">
                            <label for="start_year">{{ trans('cruds.academicYear.fields.start_year') }}</label>
                            <input class="form-control" type="text" name="start_year" id="start_year" value="{{ old('start_year', $academicYear->start_year) }}">
                            @if($errors->has('start_year'))
                                <span class="help-block" role="alert">{{ $errors->first('start_year') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.academicYear.fields.start_year_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('end_year') ? 'has-error' : '' }}">
                            <label for="end_year">{{ trans('cruds.academicYear.fields.end_year') }}</label>
                            <input class="form-control" type="text" name="end_year" id="end_year" value="{{ old('end_year', $academicYear->end_year) }}">
                            @if($errors->has('end_year'))
                                <span class="help-block" role="alert">{{ $errors->first('end_year') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.academicYear.fields.end_year_helper') }}</span>
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