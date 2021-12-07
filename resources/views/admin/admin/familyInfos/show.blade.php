@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.familyInfo.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.family-infos.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.familyInfo.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $familyInfo->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.familyInfo.fields.user_id_no') }}
                                    </th>
                                    <td>
                                        {{ $familyInfo->user_id_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.familyInfo.fields.application_number') }}
                                    </th>
                                    <td>
                                        {{ $familyInfo->application_number->application_no ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.familyInfo.fields.familystatus') }}
                                    </th>
                                    <td>
                                        {{ $familyInfo->familystatus->status_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.familyInfo.fields.guardian_occupation') }}
                                    </th>
                                    <td>
                                        {{ $familyInfo->guardian_occupation->occupation_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.familyInfo.fields.guardian_education') }}
                                    </th>
                                    <td>
                                        {{ App\Models\FamilyInfo::GUARDIAN_EDUCATION_SELECT[$familyInfo->guardian_education] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.familyInfo.fields.guardian_land') }}
                                    </th>
                                    <td>
                                        {{ $familyInfo->guardian_land }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.familyInfo.fields.guardian_annual_income') }}
                                    </th>
                                    <td>
                                        {{ $familyInfo->guardian_annual_income }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.familyInfo.fields.family_member') }}
                                    </th>
                                    <td>
                                        {{ $familyInfo->family_member }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.family-infos.index') }}">
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