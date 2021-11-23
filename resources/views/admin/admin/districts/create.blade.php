@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.district.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.districts.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('division_name') ? 'has-error' : '' }}">
                            <label class="required" for="division_name_id">{{ trans('cruds.district.fields.division_name') }}</label>
                            <select class="form-control select2" name="division_name_id" id="division_name_id" required>
                                @foreach($division_names as $id => $entry)
                                    <option value="{{ $id }}" {{ old('division_name_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('division_name'))
                                <span class="help-block" role="alert">{{ $errors->first('division_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.district.fields.division_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('district_name') ? 'has-error' : '' }}">
                            <label for="district_name">{{ trans('cruds.district.fields.district_name') }}</label>
                            <input class="form-control" type="text" name="district_name" id="district_name" value="{{ old('district_name', '') }}">
                            @if($errors->has('district_name'))
                                <span class="help-block" role="alert">{{ $errors->first('district_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.district.fields.district_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('district_name_en') ? 'has-error' : '' }}">
                            <label for="district_name_en">{{ trans('cruds.district.fields.district_name_en') }}</label>
                            <input class="form-control" type="text" name="district_name_en" id="district_name_en" value="{{ old('district_name_en', '') }}">
                            @if($errors->has('district_name_en'))
                                <span class="help-block" role="alert">{{ $errors->first('district_name_en') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.district.fields.district_name_en_helper') }}</span>
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