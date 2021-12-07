@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.bankingType.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.banking-types.update", [$bankingType->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('banking_type') ? 'has-error' : '' }}">
                            <label for="banking_type">{{ trans('cruds.bankingType.fields.banking_type') }}</label>
                            <input class="form-control" type="text" name="banking_type" id="banking_type" value="{{ old('banking_type', $bankingType->banking_type) }}">
                            @if($errors->has('banking_type'))
                                <span class="help-block" role="alert">{{ $errors->first('banking_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.bankingType.fields.banking_type_helper') }}</span>
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