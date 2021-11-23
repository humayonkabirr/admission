@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.department.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.departments.update", [$department->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('department_name') ? 'has-error' : '' }}">
                            <label class="required" for="department_name">{{ trans('cruds.department.fields.department_name') }}</label>
                            <input class="form-control" type="text" name="department_name" id="department_name" value="{{ old('department_name', $department->department_name) }}" required>
                            @if($errors->has('department_name'))
                                <span class="help-block" role="alert">{{ $errors->first('department_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.department.fields.department_name_helper') }}</span>
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