@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.educationInstituteInfo.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.education-institute-infos.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.educationInstituteInfo.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $educationInstituteInfo->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.educationInstituteInfo.fields.application_number') }}
                                    </th>
                                    <td>
                                        {{ $educationInstituteInfo->application_number->application_no ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.educationInstituteInfo.fields.institute_division') }}
                                    </th>
                                    <td>
                                        {{ $educationInstituteInfo->institute_division }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.educationInstituteInfo.fields.institute_district') }}
                                    </th>
                                    <td>
                                        {{ $educationInstituteInfo->institute_district }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.educationInstituteInfo.fields.institute_upazila') }}
                                    </th>
                                    <td>
                                        {{ $educationInstituteInfo->institute_upazila }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.educationInstituteInfo.fields.education_level') }}
                                    </th>
                                    <td>
                                        {{ $educationInstituteInfo->education_level->level_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.educationInstituteInfo.fields.class_name') }}
                                    </th>
                                    <td>
                                        {{ $educationInstituteInfo->class_name->class_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.educationInstituteInfo.fields.institute_name') }}
                                    </th>
                                    <td>
                                        {{ $educationInstituteInfo->institute_name->institution_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.educationInstituteInfo.fields.eiin') }}
                                    </th>
                                    <td>
                                        {{ $educationInstituteInfo->eiin->institution_eiin_no ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.educationInstituteInfo.fields.last_study_class') }}
                                    </th>
                                    <td>
                                        {{ $educationInstituteInfo->last_study_class->class_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.educationInstituteInfo.fields.last_gpa') }}
                                    </th>
                                    <td>
                                        {{ $educationInstituteInfo->last_gpa }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.educationInstituteInfo.fields.last_gpa_total') }}
                                    </th>
                                    <td>
                                        {{ $educationInstituteInfo->last_gpa_total }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.educationInstituteInfo.fields.user_id_no') }}
                                    </th>
                                    <td>
                                        {{ $educationInstituteInfo->user_id_no }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.education-institute-infos.index') }}">
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