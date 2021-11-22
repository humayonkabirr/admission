@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.bankBranch.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.bank-branches.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bankBranch.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $bankBranch->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bankBranch.fields.bank_name') }}
                                    </th>
                                    <td>
                                        {{ $bankBranch->bank_name->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bankBranch.fields.branch_name') }}
                                    </th>
                                    <td>
                                        {{ $bankBranch->branch_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bankBranch.fields.branch_code') }}
                                    </th>
                                    <td>
                                        {{ $bankBranch->branch_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bankBranch.fields.district') }}
                                    </th>
                                    <td>
                                        {{ $bankBranch->district->district_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bankBranch.fields.upazila') }}
                                    </th>
                                    <td>
                                        {{ $bankBranch->upazila->upazila_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bankBranch.fields.routing_number') }}
                                    </th>
                                    <td>
                                        {{ $bankBranch->routing_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bankBranch.fields.address') }}
                                    </th>
                                    <td>
                                        {!! $bankBranch->address !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bankBranch.fields.swift_code') }}
                                    </th>
                                    <td>
                                        {{ $bankBranch->swift_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bankBranch.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $bankBranch->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bankBranch.fields.manager_name') }}
                                    </th>
                                    <td>
                                        {{ $bankBranch->manager_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bankBranch.fields.phone') }}
                                    </th>
                                    <td>
                                        {{ $bankBranch->phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bankBranch.fields.mobile') }}
                                    </th>
                                    <td>
                                        {{ $bankBranch->mobile }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bankBranch.fields.active') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $bankBranch->active ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.bank-branches.index') }}">
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