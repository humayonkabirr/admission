@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
<style media="screen">
    #myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    #myImg:hover {
        opacity: 0.7;
    }

    td img {
        cursor: pointer;
    }

    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 8%;
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.9);
        /* Black w/ opacity */
    }

    /* Modal Content (image) */
    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }

    /* Caption of Modal Image */
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* Add Animation */
    .modal-content,
    #caption {
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @-webkit-keyframeszoom {
        from {
            -webkit-transform: scale(0)
        }

        to {
            -webkit-transform: scale(1)
        }
    }

    @keyframeszoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }

    /* The Close Button */
    .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    /* 100% Image Width on Smaller Screens */
    @mediaonlyscreenand(max-width: 700px) {
        .modal-content {
            width: 100%;
        }
    }
</style>
@endsection

@section('content')
<div class="content">
    <div style="margin-bottom: 10px;" class="row">
        @can('final_selection_create')
        <div style="width: 21%;" class="col-lg-3">
            <a class="btn btn-success" href="{{ route('admin.primary-selections.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.primarySelection.title_singular') }}
            </a>
        </div>
        @endcan
        <div class="col-md-4">
            <div class="form-group {{ $errors->has('circular_id') ? 'has-error' : '' }}">
                <select class="form-control select2" name="circular_id" id="cirular_id">
                    <option value="">{{ trans('cruds.primarySelectionCriterion.fields.cirular') }}</option>
                    @foreach($cirulars as $id => $entry)
                    <option value="{{ $entry->id }}" {{ old('circular_id') == $id ? 'selected' : '' }}>{{ $entry->cirucular_name}}</option>
                    @endforeach
                </select>
                @if($errors->has('circular_id'))
                    <span class="help-block" role="alert">{{ $errors->first('cirular_id') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.finalSelectionCriterion.fields.cirular_helper') }}</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group {{ $errors->has('circular_id') ? 'has-error' : '' }}">
                <select class="form-control select2" name="circular_id" id="cirular_id">
                    <option value="">{{ trans('cruds.primarySelectionCriterion.fields.primary_criteria_name') }}</option>
                    @foreach($PrimarySelectionCriterias as $id => $entry)
                    <option value="{{ $id }}" {{ old('circular_id') == $id ? 'selected' : '' }}>{{ $entry}}</option>
                    @endforeach
                </select>
                @if($errors->has('circular_id'))
                    <span class="help-block" role="alert">{{ $errors->first('criteria_id') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.finalSelectionCriterion.fields.cirular_helper') }}</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.primarySelection.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <table id="example" class="display nowrap" style="width:100%">
                        <thead>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.generalInfo.fields.application_no') }}
                            </th>
                            <th>
                                {{ trans('cruds.generalInfo.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.generalInfo.fields.father_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.generalInfo.fields.mother_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.generalInfo.fields.division') }}
                            </th>
                            <th>
                                {{ trans('cruds.generalInfo.fields.district') }}
                            </th>
                            <th>
                                {{ trans('cruds.generalInfo.fields.upazila') }}
                            </th>
                            <th>
                                {{ trans('cruds.document.fields.photo') }}
                            </th>
                            <th>
                                {{ trans('cruds.document.fields.sign') }}
                            </th>
                            <th>
                                {{ trans('cruds.document.fields.brid_copy') }}
                            </th>
                        </thead>
                        <tbody id="set_table_data">
                            @foreach ($PrimarySelection as $key => $value)
                            <tr>
                                <td></td>
                                <td>{{ $value->app_number}}</td>
                                <td>{{ $value->student_name}}</td>
                                <td>{{ $value->father_name}}</td>
                                <td>{{ $value->mother_name}}</td>
                                <td>{{ $value->division->division_name}}</td>
                                <td>{{ $value->district->district_name}}</td>
                                <td>{{ $value->upazila->upazila_name}}</td>
                                <td>
                                    @if ($value->documents->profile ?? '')
                                    <img id="{{$value->id}}" onclick="showPic('{{$value->id}}')" width="50%" src="{!! asset('uploads/profile/'.$value->documents->profile) !!}" alt="Studen Photo">
                                    @else
                                    <img id="{{$value->id}}" onclick="showPic('{{$value->id}}')" width="50%" src="{!! asset('uploads/profile/default-avatar.png') !!}" alt="Photo">
                                    @endif
                                </td>
                                <td>
                                    @if ($value->documents->signature ?? '')
                                    <img id="sig{{$value->id}}" onclick="showSig('sig{{$value->id}}')" width="50%" src="{!! asset('uploads/sign/'.$value->documents->signature) !!}">
                                    @else
                                    <img id="sig{{$value->id}}" onclick="showSig('sig{{$value->id}}')" width="40%" src="{!! asset('uploads/default.jpg') !!}" alt="signature">
                                    @endif
                                </td>
                                <td>
                                    @if ($value->documents->brid ?? '')
                                    <img id="brid{{$value->id}}" onclick="showBird('brid{{$value->id}}')" width="15%" src="{!! asset('uploads/brid/'.$value->documents->brid) !!}">
                                    @else
                                    <img id="brid{{$value->id}}" onclick="showBird('brid{{$value->id}}')" width="15%" src="{!! asset('uploads/default.jpg') !!}" alt="signature">
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
</div>

@endsection
@section('scripts')

<script>
    function showPic(id) {
        var modal = document.getElementById("myModal");
        var img = document.getElementById(id);
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function() {
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }
        var span = document.getElementsByClassName("close")[0];
        span.onclick = function() {
            modal.style.display = "none";
        }
    }

    function showSig(id) {
        var modal = document.getElementById("myModal");
        var img = document.getElementById(id);
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function() {
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }
        var span = document.getElementsByClassName("close")[0];
        span.onclick = function() {
            modal.style.display = "none";
        }
    }

    function showBird(id) {
        var modal = document.getElementById("myModal");
        var img = document.getElementById(id);
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function() {
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }
        var span = document.getElementsByClassName("close")[0];
        span.onclick = function() {
            modal.style.display = "none";
        }
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
@endsection