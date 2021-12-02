@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.upazila.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.upazilas.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('district') ? 'has-error' : '' }}">
                            <label for="district_id">{{ trans('cruds.upazila.fields.district') }}</label>
                            <select class="form-control select2" name="district_id" id="district_id">
                                @foreach($districts as $id => $entry)
                                    <option value="{{ $id }}" {{ old('district_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('district'))
                                <span class="help-block" role="alert">{{ $errors->first('district') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.upazila.fields.district_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('upazila_name') ? 'has-error' : '' }}">
                            <label for="upazila_name">{{ trans('cruds.upazila.fields.upazila_name') }}</label>
                            <input class="form-control" type="text" name="upazila_name" id="upazila_name" value="{{ old('upazila_name', '') }}">
                            @if($errors->has('upazila_name'))
                                <span class="help-block" role="alert">{{ $errors->first('upazila_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.upazila.fields.upazila_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('upazila_name_en') ? 'has-error' : '' }}">
                            <label for="upazila_name_en">{{ trans('cruds.upazila.fields.upazila_name_en') }}</label>
                            <input class="form-control" type="text" name="upazila_name_en" id="upazila_name_en" value="{{ old('upazila_name_en', '') }}">
                            @if($errors->has('upazila_name_en'))
                                <span class="help-block" role="alert">{{ $errors->first('upazila_name_en') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.upazila.fields.upazila_name_en_helper') }}</span>
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