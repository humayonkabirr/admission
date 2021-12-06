@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.occupation.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.occupations.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('occupation_name') ? 'has-error' : '' }}">
                            <label for="occupation_name">{{ trans('cruds.occupation.fields.occupation_name') }}</label>
                            <input class="form-control" type="text" name="occupation_name" id="occupation_name" value="{{ old('occupation_name', '') }}">
                            @if($errors->has('occupation_name'))
                                <span class="help-block" role="alert">{{ $errors->first('occupation_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.occupation.fields.occupation_name_helper') }}</span>
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