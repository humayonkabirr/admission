@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.generalInfo.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.general-infos.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalInfo.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $generalInfo->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalInfo.fields.user_id_no') }}
                                    </th>
                                    <td>
                                        {{ $generalInfo->user_id_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalInfo.fields.application_no') }}
                                    </th>
                                    <td>
                                        {{ $generalInfo->application_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalInfo.fields.grants_name') }}
                                    </th>
                                    <td>
                                        {{ $generalInfo->grants_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalInfo.fields.circular') }}
                                    </th>
                                    <td>
                                        {{ $generalInfo->circular->cirucular_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalInfo.fields.brid') }}
                                    </th>
                                    <td>
                                        {{ $generalInfo->brid }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalInfo.fields.nid') }}
                                    </th>
                                    <td>
                                        {{ $generalInfo->nid }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalInfo.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $generalInfo->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalInfo.fields.father_name') }}
                                    </th>
                                    <td>
                                        {{ $generalInfo->father_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalInfo.fields.father_nid') }}
                                    </th>
                                    <td>
                                        {{ $generalInfo->father_nid }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalInfo.fields.mother_name') }}
                                    </th>
                                    <td>
                                        {{ $generalInfo->mother_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalInfo.fields.mother_nid') }}
                                    </th>
                                    <td>
                                        {{ $generalInfo->mother_nid }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalInfo.fields.dob') }}
                                    </th>
                                    <td>
                                        {{ $generalInfo->dob }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalInfo.fields.age') }}
                                    </th>
                                    <td>
                                        {{ $generalInfo->age }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalInfo.fields.gender') }}
                                    </th>
                                    <td>
                                        {{ App\Models\GeneralInfo::GENDER_SELECT[$generalInfo->gender] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalInfo.fields.division') }}
                                    </th>
                                    <td>
                                        {{ $generalInfo->division->division_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalInfo.fields.district') }}
                                    </th>
                                    <td>
                                        {{ $generalInfo->district->district_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalInfo.fields.upazila') }}
                                    </th>
                                    <td>
                                        {{ $generalInfo->upazila->upazila_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalInfo.fields.union') }}
                                    </th>
                                    <td>
                                        {{ $generalInfo->union->union_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalInfo.fields.village') }}
                                    </th>
                                    <td>
                                        {{ $generalInfo->village }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.general-infos.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li role="presentation">
                        <a href="#application_number_family_infos" aria-controls="application_number_family_infos" role="tab" data-toggle="tab">
                            {{ trans('cruds.familyInfo.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#app_number_documents" aria-controls="app_number_documents" role="tab" data-toggle="tab">
                            {{ trans('cruds.document.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#application_number_education_institute_infos" aria-controls="application_number_education_institute_infos" role="tab" data-toggle="tab">
                            {{ trans('cruds.educationInstituteInfo.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#app_number_account_infos" aria-controls="app_number_account_infos" role="tab" data-toggle="tab">
                            {{ trans('cruds.accountInfo.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="application_number_family_infos">
                        @includeIf('admin.generalInfos.relationships.applicationNumberFamilyInfos', ['familyInfos' => $generalInfo->applicationNumberFamilyInfos])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="app_number_documents">
                        @includeIf('admin.generalInfos.relationships.appNumberDocuments', ['documents' => $generalInfo->appNumberDocuments])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="application_number_education_institute_infos">
                        @includeIf('admin.generalInfos.relationships.applicationNumberEducationInstituteInfos', ['educationInstituteInfos' => $generalInfo->applicationNumberEducationInstituteInfos])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="app_number_account_infos">
                        @includeIf('admin.generalInfos.relationships.appNumberAccountInfos', ['accountInfos' => $generalInfo->appNumberAccountInfos])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection