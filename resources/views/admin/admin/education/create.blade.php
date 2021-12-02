@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.education.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.education.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('degree') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.education.fields.degree') }}</label>
                            <select class="form-control" name="degree" id="degree" required>
                                <option value disabled {{ old('degree', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Education::DEGREE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('degree', 'সিলেক্ট করুন') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('degree'))
                                <span class="help-block" role="alert">{{ $errors->first('degree') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.education.fields.degree_helper') }}</span>
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