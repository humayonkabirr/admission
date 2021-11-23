@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.institutLegalStatus.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.institut-legal-statuses.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('institute_legal_status') ? 'has-error' : '' }}">
                            <label for="institute_legal_status">{{ trans('cruds.institutLegalStatus.fields.institute_legal_status') }}</label>
                            <input class="form-control" type="text" name="institute_legal_status" id="institute_legal_status" value="{{ old('institute_legal_status', '') }}">
                            @if($errors->has('institute_legal_status'))
                                <span class="help-block" role="alert">{{ $errors->first('institute_legal_status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.institutLegalStatus.fields.institute_legal_status_helper') }}</span>
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