@extends('layouts.admin')

@section('styles')
    <style>
        .panel-default{
        box-shadow: 0px 0px 7px #606060;
    }
    </style>
@endsection
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.primarySelectionCriterion.title_singular') }}
                </div>
                <div class="panel-body">
                    <form id="form_primary_check" method="POST" action="{{ url('admin/primary-selections/check/0') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('primary_criteria_name') ? 'has-error' : '' }}">
                                <label class="required" for="primary_criteria_name">{{ trans('cruds.primarySelectionCriterion.fields.primary_criteria_name') }}</label>
                                <input class="form-control" type="text" name="primary_criteria_name" id="primary_criteria_name" value="{{ old('primary_criteria_name', '') }}" required>
                                @if($errors->has('primary_criteria_name'))
                                    <span class="help-block" role="alert">{{ $errors->first('primary_criteria_name') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.primarySelectionCriterion.fields.primary_criteria_name_helper') }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('circular_id') ? 'has-error' : '' }}">
                                <label class="required" for="circular_id">{{ trans('cruds.finalSelectionCriterion.fields.cirular') }}</label>
                                <select class="form-control select2" name="circular_id" id="cirular_id" required>
                                    @foreach($cirulars as $id => $entry)
                                    <option value="{{ $id }}" {{ old('circular_id') == $id ? 'selected' : '' }}>{{ $entry}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('circular_id'))
                                    <span class="help-block" role="alert">{{ $errors->first('cirular_id') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.finalSelectionCriterion.fields.cirular_helper') }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('division_id') ? 'has-error' : '' }}">
                                <label class="required" for="division_id">{{ trans('cruds.finalSelectionCriterion.fields.division') }}</label>
                                <select class="form-control select2" name="division_id" id="division_id">
                                    @foreach($divisions as $id => $entry)
                                    <option value="{{ $id }}" {{ old('division_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('division_id'))
                                    <span class="help-block" role="alert">{{ $errors->first('division_id') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.finalSelectionCriterion.fields.division_helper') }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('district_id') ? 'has-error' : '' }}">
                                <label class="required" for="district_id">{{ trans('cruds.finalSelectionCriterion.fields.district') }}</label>
                                <select class="form-control select2" name="district_id" id="district_id">
                                    <option value="">{{ trans('global.pleaseSelect') }}</option>
                                </select>
                                @if($errors->has('district_id'))
                                    <span class="help-block" role="alert">{{ $errors->first('district_id') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.finalSelectionCriterion.fields.district_helper') }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('upazila_id') ? 'has-error' : '' }}">
                                <label class="required" for="upazila_id">{{ trans('cruds.finalSelectionCriterion.fields.upazila') }}</label>
                                <select class="form-control select2" name="upazila_id" id="upazila_id">
                                    <option value="">{{ trans('global.pleaseSelect') }}</option>
                                </select>
                                @if($errors->has('upazila_id'))
                                    <span class="help-block" role="alert">{{ $errors->first('upazila_id') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.finalSelectionCriterion.fields.upazila_helper') }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('last_gpa') ? 'has-error' : '' }}">
                                <label class="required" for="last_gpa">{{ trans('cruds.educationInstituteInfo.fields.last_gpa') }}</label>
                                <input class="form-control" type="text" name="last_gpa" id="last_gpa" value="{{ old('last_gpa', '') }}">
                                @if($errors->has('last_gpa'))
                                    <span class="help-block" role="alert">{{ $errors->first('last_gpa') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.educationInstituteInfo.fields.last_gpa_helper') }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('family_status_id') ? 'has-error' : '' }}">
                                <label class="required" for="family_status_id">{{ trans('cruds.familyInfo.fields.familystatus') }}</label>
                                <select class="form-control select2" name="family_status_id" id="family_status_id">
                                    <option value>{{ trans('global.pleaseSelect') }}</option>
                                    @foreach($family_statuses as $key => $item)
                                    <option value="{{ $item->id }}">{{ $item->status_name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('family_status_id'))
                                    <span class="help-block" role="alert">{{ $errors->first('family_status_id') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.familyInfo.fields.familystatus_helper') }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('family_member_id') ? 'has-error' : '' }}">
                                <label class="required" for="family_member_id">{{ trans('cruds.familyInfo.fields.family_member') }}</label>
                                <input class="form-control" type="number" name="family_member_id" id="family_member_id" value="{{ old('family_member_id', '') }}">
                                @if($errors->has('family_member_id'))
                                    <span class="help-block" role="alert">{{ $errors->first('family_member_id') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.familyInfo.fields.family_member_helper') }}</span>
                            </div>
                        </div>
                        {{-- <div class="col-md-12">
                            <div class="form-group {{ $errors->has('app_number') ? 'has-error' : '' }}">
                        <label class="required" for="app_number">{{ trans('cruds.selection.fields.app_number') }}</label>
                        <input class="form-control" type="text" name="app_number" id="app_number" value="{{ old('app_number', '') }}">
                        @if($errors->has('app_number'))
                            <span class="help-block" role="alert">{{ $errors->first('app_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.selection.fields.app_number') }}</span>
                </div>
            </div> --}}
            <div class="col-md-12">
                <div class="form-group {{ $errors->has('active') ? 'has-error' : '' }}">
                    <div>
                        <input type="checkbox" name="active" id="active" value="1" required {{ old('active', 0) == 1 || old('active') === null ? 'checked' : '' }}>
                        <label class="required" for="active" style="font-weight: 400">{{ trans('cruds.finalSelectionCriterion.fields.active') }}</label>
                    </div>
                    @if($errors->has('active'))
                        <span class="help-block" role="alert">{{ $errors->first('active') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.finalSelectionCriterion.fields.active_helper') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group" style="float: right;">
                    <button id="save" class="btn btn-danger" value="1" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
                <div class="form-group" style="float: right; margin-right:5px">
                    <button id="verify" class="btn btn-info" type="button" name="submit">
                        {{ trans('global.two_factor.verify') }}
                    </button>
                </div>
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
    // get circular date
    $("#app_number").keypress(function() {
        var app_number = this.value;
        $("#primary_selection_set").html("");
        var table = "";
        var url = "{{ url('/admin') }}"
        $.get(url + "/primary-selections/app-number-id/" + app_number, function(data) {
            data = JSON.parse(data);
            data = JSON.parse(data);
            alert(data.length);
        });
    });
    // $("#cirular_id").change(function() {
    //     var cirular_id = $("#cirular_id").val();
    //     $("#primary_selection_set").html("");
    //     var table = 0;
    //     var url = "{{ url('/admin') }}"
    //     $.get(url + "/primary-selections/circular-id/" + cirular_id, function(data) {
    //         data = JSON.parse(data);
    //         alert(data.length);
    //     });
    // });
    // get district name
    $("#division_id").change(function() {
        var division = $("#division_id").val();
        $("#district_id").html("");
        $("#upazila_id").html("<option value=''> {{ trans('global.pleaseSelect') }} </option>");
        var option = "<option value=''>{{ trans('global.pleaseSelect') }}</option>";
        var url = "{{ url('/admin') }}"
        $.get(url + "/get-districts/" + division, function(data) {
            data = JSON.parse(data);
            data.forEach(function(element) {
                option += "<option value='" + element.id + "'>" + element.district_name + "</option>";
            });
            $("#district_id").html(option);
        });
    });
    // get sub discrict name
    $("#district_id").change(function() {
        var distric_id = $("#district_id").val();
        $("#upazila_id").html("<option value=''> {{ trans('global.pleaseSelect') }} </option>");
        var option = "<option value=''> {{ trans('global.pleaseSelect') }} </option>";
        var url = "{{ url('/admin') }}"
        $.get(url + "/get-upazilas/" + distric_id, function(data) {
            data = JSON.parse(data);
            data.forEach(function(element) {
                option += "<option value='" + element.id + "'>" + element.upazila_name + "</option>";
            });
            $("#upazila_id").html(option);
        });

    });

    $("#verify").click(function(e) {
        // $("#formaddbtn").button('loading');
        e.preventDefault();
        // Get form
        var form = $('#form_primary_check')[0];
        // FormData object
        var data = new FormData(form);

        $.ajax({
            url: "{{ url('admin/primary-selections/check/1') }}",
            type: "POST",
            data: data,
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                alert("Your Criteria Matching Students: " + data.length);
                if (data.status == "fail") {
                    var message = "";
                    $.each(data.error, function(index, value) {
                        message += value;
                    });
                    errorMsg(message);
                } else {
                    successMsg(data.message);
                    window.location.reload(true);
                }
                // $("#formaddbtn").button('reset');
            },
            error: function() {

            }
        });
    });
</script>

@endsection