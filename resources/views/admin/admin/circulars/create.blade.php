@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.circular.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('admin.circulars.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('circular_type') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.circular.fields.circular_type') }}</label>
                            <select class="form-control" name="circular_type" id="circular_type" required>
                                <option value disabled {{ old('circular_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Circular::CIRCULAR_TYPE_SELECT as $key => $label)
                                <option value="{{ $key }}" {{ old('circular_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('circular_type'))
                            <span class="help-block" role="alert">{{ $errors->first('circular_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.circular.fields.circular_type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('cirucular_name') ? 'has-error' : '' }}">
                            <label class="required" for="cirucular_name">{{ trans('cruds.circular.fields.cirucular_name') }}</label>
                            <input class="form-control" type="text" name="cirucular_name" id="cirucular_name" value="{{ old('cirucular_name', '') }}" required>
                            @if($errors->has('cirucular_name'))
                            <span class="help-block" role="alert">{{ $errors->first('cirucular_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.circular.fields.cirucular_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('circular_year') ? 'has-error' : '' }}">
                            <label for="circular_year">{{ trans('cruds.circular.fields.circular_year') }}</label>
                            <input class="form-control" type="number" name="circular_year" id="circular_year" value="{{ old('circular_year', '') }}" step="1">
                            @if($errors->has('circular_year'))
                            <span class="help-block" role="alert">{{ $errors->first('circular_year') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.circular.fields.circular_year_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('reference_number') ? 'has-error' : '' }}">
                            <label class="required" for="reference_number">{{ trans('cruds.circular.fields.reference_number') }}</label>
                            <input class="form-control" type="text" name="reference_number" id="reference_number" value="{{ old('reference_number', '') }}" required>
                            @if($errors->has('reference_number'))
                            <span class="help-block" role="alert">{{ $errors->first('reference_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.circular.fields.reference_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('reference_date') ? 'has-error' : '' }}">
                            <label class="required" for="reference_date">{{ trans('cruds.circular.fields.reference_date') }}</label>
                            <input class="form-control date" type="text" name="reference_date" id="reference_date" value="{{ old('reference_date') }}" required>
                            @if($errors->has('reference_date'))
                            <span class="help-block" role="alert">{{ $errors->first('reference_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.circular.fields.reference_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('academic_year') ? 'has-error' : '' }}">
                            <label class="required" for="academic_year_id">{{ trans('cruds.circular.fields.academic_year') }}</label>
                            <select class="form-control select2" name="academic_year_id" id="academic_year_id" required>
                                @foreach($academic_years as $id => $entry)
                                <option value="{{ $id }}" {{ old('academic_year_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('academic_year'))
                            <span class="help-block" role="alert">{{ $errors->first('academic_year') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.circular.fields.academic_year_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('policy') ? 'has-error' : '' }}">
                            <label class="required" for="policy_id">{{ trans('cruds.circular.fields.policy') }}</label>
                            <select class="form-control select2" name="policy_id" id="policy_id" required>
                                @foreach($policies as $id => $entry)
                                <option value="{{ $id }}" {{ old('policy_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('policy'))
                            <span class="help-block" role="alert">{{ $errors->first('policy') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.circular.fields.policy_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('sec_stipend_amount') ? 'has-error' : '' }}">
                            <label class="required" for="sec_stipend_amount">{{ trans('cruds.circular.fields.sec_stipend_amount') }}</label>
                            <input class="form-control" type="number" name="sec_stipend_amount" id="sec_stipend_amount" value="{{ old('sec_stipend_amount', '') }}" step="0.01" required>
                            @if($errors->has('sec_stipend_amount'))
                            <span class="help-block" role="alert">{{ $errors->first('sec_stipend_amount') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.circular.fields.sec_stipend_amount_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('hsec_stipend_amount') ? 'has-error' : '' }}">
                            <label class="required" for="hsec_stipend_amount">{{ trans('cruds.circular.fields.hsec_stipend_amount') }}</label>
                            <input class="form-control" type="number" name="hsec_stipend_amount" id="hsec_stipend_amount" value="{{ old('hsec_stipend_amount', '') }}" step="0.01" required>
                            @if($errors->has('hsec_stipend_amount'))
                            <span class="help-block" role="alert">{{ $errors->first('hsec_stipend_amount') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.circular.fields.hsec_stipend_amount_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('hons_stipend_amount') ? 'has-error' : '' }}">
                            <label class="required" for="hons_stipend_amount">{{ trans('cruds.circular.fields.hons_stipend_amount') }}</label>
                            <input class="form-control" type="number" name="hons_stipend_amount" id="hons_stipend_amount" value="{{ old('hons_stipend_amount', '') }}" step="0.01" required>
                            @if($errors->has('hons_stipend_amount'))
                            <span class="help-block" role="alert">{{ $errors->first('hons_stipend_amount') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.circular.fields.hons_stipend_amount_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('application_deadline') ? 'has-error' : '' }}">
                            <label class="required" for="application_deadline">{{ trans('cruds.circular.fields.application_deadline') }}</label>
                            <input class="form-control date" type="text" name="application_deadline" id="application_deadline" value="{{ old('application_deadline') }}" required>
                            @if($errors->has('application_deadline'))
                            <span class="help-block" role="alert">{{ $errors->first('application_deadline') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.circular.fields.application_deadline_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('institution_head_deadline') ? 'has-error' : '' }}">
                            <label for="institution_head_deadline">{{ trans('cruds.circular.fields.institution_head_deadline') }}</label>
                            <input class="form-control date" type="text" name="institution_head_deadline" id="institution_head_deadline" value="{{ old('institution_head_deadline') }}">
                            @if($errors->has('institution_head_deadline'))
                            <span class="help-block" role="alert">{{ $errors->first('institution_head_deadline') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.circular.fields.institution_head_deadline_helper') }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('circular_file') ? 'has-error' : '' }}">
                            <label for="circular_file">{{ trans('cruds.circular.fields.circular_file') }}</label>
                            <div class="needsclick dropzone" id="circular_file-dropzone">
                            </div>
                            @if($errors->has('circular_file'))
                            <span class="help-block" role="alert">{{ $errors->first('circular_file') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.circular.fields.circular_file_helper') }}</span>
                        </div>


                        <!-- circular image  -->
                        <div class="form-group {{ $errors->has('circular_image') ? 'has-error' : '' }}">
                            <label for="circular_image">{{ trans('cruds.circular.fields.circular_image') }}</label>
                            <input class="form-control" type="file" id="circular_image" name="circular_image" onchange="preview()">
                            <img id="circular_image_preview" src="" width="200px" height="200px" />
                            @if($errors->has('circular_image'))
                            <span class="help-block" role="alert">{{ $errors->first('circular_image') }}</span>
                            @endif
                        </div>




                        <div class="form-group {{ $errors->has('circular_status') ? 'has-error' : '' }}">
                            <div>
                                <input type="checkbox" name="circular_status" id="circular_status" value="1" required {{ old('circular_status', 0) == 1 || old('circular_status') === null ? 'checked' : '' }}>
                                <label class="required" for="circular_status" style="font-weight: 400">{{ trans('cruds.circular.fields.circular_status') }}</label>
                            </div>
                            @if($errors->has('circular_status'))
                            <span class="help-block" role="alert">{{ $errors->first('circular_status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.circular.fields.circular_status_helper') }}</span>
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
    function preview() {
        circular_image_preview.src = URL.createObjectURL(event.target.files[0]);
    }
</script>

 
<script>
    Dropzone.options.circularFileDropzone = {
    url: '{{ route('admin.circulars.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="circular_file"]').remove()
      $('form').append('<input type="hidden" name="circular_file" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="circular_file"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($circular) && $circular->circular_file)
      var file = {!! json_encode($circular->circular_file) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="circular_file" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection