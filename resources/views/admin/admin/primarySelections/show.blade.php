@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.finalSelection.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.final-selections.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.finalSelection.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $finalSelection->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.finalSelection.fields.app_number') }}
                                    </th>
                                    <td>
                                        {{ $finalSelection->app_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.finalSelection.fields.user_id_no') }}
                                    </th>
                                    <td>
                                        {{ $finalSelection->user_id_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.finalSelection.fields.student_name') }}
                                    </th>
                                    <td>
                                        {{ $finalSelection->student_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.finalSelection.fields.brid') }}
                                    </th>
                                    <td>
                                        {{ $finalSelection->brid }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.finalSelection.fields.father_name') }}
                                    </th>
                                    <td>
                                        {{ $finalSelection->father_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.finalSelection.fields.father_nid') }}
                                    </th>
                                    <td>
                                        {{ $finalSelection->father_nid }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.finalSelection.fields.mother_name') }}
                                    </th>
                                    <td>
                                        {{ $finalSelection->mother_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.finalSelection.fields.mother_nid') }}
                                    </th>
                                    <td>
                                        {{ $finalSelection->mother_nid }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.finalSelection.fields.academic_level') }}
                                    </th>
                                    <td>
                                        {{ $finalSelection->academic_level->level_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.finalSelection.fields.admission_class') }}
                                    </th>
                                    <td>
                                        {{ $finalSelection->admission_class->class_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.finalSelection.fields.education_institute') }}
                                    </th>
                                    <td>
                                        {{ $finalSelection->education_institute->institution_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.finalSelection.fields.eiin') }}
                                    </th>
                                    <td>
                                        {{ $finalSelection->eiin->eiin ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.finalSelection.fields.division') }}
                                    </th>
                                    <td>
                                        {{ $finalSelection->division->division_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.finalSelection.fields.district') }}
                                    </th>
                                    <td>
                                        {{ $finalSelection->district->district_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.finalSelection.fields.upazila') }}
                                    </th>
                                    <td>
                                        {{ $finalSelection->upazila->upazila_name ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.final-selections.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection