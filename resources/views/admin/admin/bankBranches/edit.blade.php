@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.bankBranch.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.bank-branches.update", [$bankBranch->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('bank_name') ? 'has-error' : '' }}">
                            <label class="required" for="bank_name_id">{{ trans('cruds.bankBranch.fields.bank_name') }}</label>
                            <select class="form-control select2" name="bank_name_id" id="bank_name_id" required>
                                @foreach($bank_names as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('bank_name_id') ? old('bank_name_id') : $bankBranch->bank_name->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('bank_name'))
                                <span class="help-block" role="alert">{{ $errors->first('bank_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.bankBranch.fields.bank_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('branch_name') ? 'has-error' : '' }}">
                            <label class="required" for="branch_name">{{ trans('cruds.bankBranch.fields.branch_name') }}</label>
                            <input class="form-control" type="text" name="branch_name" id="branch_name" value="{{ old('branch_name', $bankBranch->branch_name) }}" required>
                            @if($errors->has('branch_name'))
                                <span class="help-block" role="alert">{{ $errors->first('branch_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.bankBranch.fields.branch_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('branch_code') ? 'has-error' : '' }}">
                            <label for="branch_code">{{ trans('cruds.bankBranch.fields.branch_code') }}</label>
                            <input class="form-control" type="text" name="branch_code" id="branch_code" value="{{ old('branch_code', $bankBranch->branch_code) }}">
                            @if($errors->has('branch_code'))
                                <span class="help-block" role="alert">{{ $errors->first('branch_code') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.bankBranch.fields.branch_code_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('district') ? 'has-error' : '' }}">
                            <label class="required" for="district_id">{{ trans('cruds.bankBranch.fields.district') }}</label>
                            <select class="form-control select2" name="district_id" id="district_id" required>
                                @foreach($districts as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('district_id') ? old('district_id') : $bankBranch->district->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('district'))
                                <span class="help-block" role="alert">{{ $errors->first('district') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.bankBranch.fields.district_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('upazila') ? 'has-error' : '' }}">
                            <label for="upazila_id">{{ trans('cruds.bankBranch.fields.upazila') }}</label>
                            <select class="form-control select2" name="upazila_id" id="upazila_id">
                                @foreach($upazilas as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('upazila_id') ? old('upazila_id') : $bankBranch->upazila->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('upazila'))
                                <span class="help-block" role="alert">{{ $errors->first('upazila') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.bankBranch.fields.upazila_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('routing_number') ? 'has-error' : '' }}">
                            <label class="required" for="routing_number">{{ trans('cruds.bankBranch.fields.routing_number') }}</label>
                            <input class="form-control" type="number" name="routing_number" id="routing_number" value="{{ old('routing_number', $bankBranch->routing_number) }}" step="1" required>
                            @if($errors->has('routing_number'))
                                <span class="help-block" role="alert">{{ $errors->first('routing_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.bankBranch.fields.routing_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                            <label for="address">{{ trans('cruds.bankBranch.fields.address') }}</label>
                            <textarea class="form-control ckeditor" name="address" id="address">{!! old('address', $bankBranch->address) !!}</textarea>
                            @if($errors->has('address'))
                                <span class="help-block" role="alert">{{ $errors->first('address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.bankBranch.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('swift_code') ? 'has-error' : '' }}">
                            <label for="swift_code">{{ trans('cruds.bankBranch.fields.swift_code') }}</label>
                            <input class="form-control" type="text" name="swift_code" id="swift_code" value="{{ old('swift_code', $bankBranch->swift_code) }}">
                            @if($errors->has('swift_code'))
                                <span class="help-block" role="alert">{{ $errors->first('swift_code') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.bankBranch.fields.swift_code_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">{{ trans('cruds.bankBranch.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email', $bankBranch->email) }}">
                            @if($errors->has('email'))
                                <span class="help-block" role="alert">{{ $errors->first('email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.bankBranch.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('manager_name') ? 'has-error' : '' }}">
                            <label for="manager_name">{{ trans('cruds.bankBranch.fields.manager_name') }}</label>
                            <input class="form-control" type="text" name="manager_name" id="manager_name" value="{{ old('manager_name', $bankBranch->manager_name) }}">
                            @if($errors->has('manager_name'))
                                <span class="help-block" role="alert">{{ $errors->first('manager_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.bankBranch.fields.manager_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label for="phone">{{ trans('cruds.bankBranch.fields.phone') }}</label>
                            <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', $bankBranch->phone) }}">
                            @if($errors->has('phone'))
                                <span class="help-block" role="alert">{{ $errors->first('phone') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.bankBranch.fields.phone_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                            <label for="mobile">{{ trans('cruds.bankBranch.fields.mobile') }}</label>
                            <input class="form-control" type="text" name="mobile" id="mobile" value="{{ old('mobile', $bankBranch->mobile) }}">
                            @if($errors->has('mobile'))
                                <span class="help-block" role="alert">{{ $errors->first('mobile') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.bankBranch.fields.mobile_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('active') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="active" value="0">
                                <input type="checkbox" name="active" id="active" value="1" {{ $bankBranch->active || old('active', 0) === 1 ? 'checked' : '' }}>
                                <label for="active" style="font-weight: 400">{{ trans('cruds.bankBranch.fields.active') }}</label>
                            </div>
                            @if($errors->has('active'))
                                <span class="help-block" role="alert">{{ $errors->first('active') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.bankBranch.fields.active_helper') }}</span>
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

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.bank-branches.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $bankBranch->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection