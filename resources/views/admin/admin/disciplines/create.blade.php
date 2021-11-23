@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.discipline.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.disciplines.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('discipline_name') ? 'has-error' : '' }}">
                            <label class="required" for="discipline_name">{{ trans('cruds.discipline.fields.discipline_name') }}</label>
                            <input class="form-control" type="text" name="discipline_name" id="discipline_name" value="{{ old('discipline_name', '') }}" required>
                            @if($errors->has('discipline_name'))
                                <span class="help-block" role="alert">{{ $errors->first('discipline_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.discipline.fields.discipline_name_helper') }}</span>
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