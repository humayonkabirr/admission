@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.educationalInstitute.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.educational-institutes.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.educationalInstitute.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $educationalInstitute->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.educationalInstitute.fields.institution_eiin_no') }}
                                    </th>
                                    <td>
                                        {{ $educationalInstitute->institution_eiin_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.educationalInstitute.fields.institution_name') }}
                                    </th>
                                    <td>
                                        {{ $educationalInstitute->institution_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.educationalInstitute.fields.institution_code') }}
                                    </th>
                                    <td>
                                        {{ $educationalInstitute->institution_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.educationalInstitute.fields.mpo_number') }}
                                    </th>
                                    <td>
                                        {{ $educationalInstitute->mpo_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.educationalInstitute.fields.legal_status') }}
                                    </th>
                                    <td>
                                        {{ $educationalInstitute->legal_status->institute_legal_status ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.educationalInstitute.fields.academic_level') }}
                                    </th>
                                    <td>
                                        @foreach($educationalInstitute->academic_levels as $key => $academic_level)
                                            <span class="label label-info">{{ $academic_level->level_name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.educationalInstitute.fields.discipline') }}
                                    </th>
                                    <td>
                                        @foreach($educationalInstitute->disciplines as $key => $discipline)
                                            <span class="label label-info">{{ $discipline->discipline_name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.educationalInstitute.fields.institute_head') }}
                                    </th>
                                    <td>
                                        {{ $educationalInstitute->institute_head }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.educationalInstitute.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $educationalInstitute->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.educationalInstitute.fields.mobile_phone') }}
                                    </th>
                                    <td>
                                        {{ $educationalInstitute->mobile_phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.educationalInstitute.fields.phone') }}
                                    </th>
                                    <td>
                                        {{ $educationalInstitute->phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.educationalInstitute.fields.division') }}
                                    </th>
                                    <td>
                                        {{ $educationalInstitute->division->division_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.educationalInstitute.fields.district') }}
                                    </th>
                                    <td>
                                        {{ $educationalInstitute->district->district_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.educationalInstitute.fields.upazila') }}
                                    </th>
                                    <td>
                                        {{ $educationalInstitute->upazila->upazila_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.educationalInstitute.fields.union') }}
                                    </th>
                                    <td>
                                        {{ $educationalInstitute->union->union_name ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.educational-institutes.index') }}">
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
                        <a href="#eiin_institute_bank_accounts" aria-controls="eiin_institute_bank_accounts" role="tab" data-toggle="tab">
                            {{ trans('cruds.instituteBankAccount.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="eiin_institute_bank_accounts">
                        @includeIf('admin.educationalInstitutes.relationships.eiinInstituteBankAccounts', ['instituteBankAccounts' => $educationalInstitute->eiinInstituteBankAccounts])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection