@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.accountInfo.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.account-infos.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.accountInfo.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $accountInfo->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.accountInfo.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $accountInfo->user }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.accountInfo.fields.app_number') }}
                                    </th>
                                    <td>
                                        {{ $accountInfo->app_number->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.accountInfo.fields.student_name') }}
                                    </th>
                                    <td>
                                        {{ $accountInfo->student_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.accountInfo.fields.banking_type') }}
                                    </th>
                                    <td>
                                        {{ $accountInfo->banking_type->banking_type ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.accountInfo.fields.bank_name') }}
                                    </th>
                                    <td>
                                        {{ $accountInfo->bank_name->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.accountInfo.fields.district') }}
                                    </th>
                                    <td>
                                        {{ $accountInfo->district->district_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.accountInfo.fields.bank_branch') }}
                                    </th>
                                    <td>
                                        {{ $accountInfo->bank_branch->branch_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.accountInfo.fields.routing_no') }}
                                    </th>
                                    <td>
                                        {{ $accountInfo->routing_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.accountInfo.fields.bank_account_owner') }}
                                    </th>
                                    <td>
                                        {{ App\Models\AccountInfo::BANK_ACCOUNT_OWNER_SELECT[$accountInfo->bank_account_owner] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.accountInfo.fields.acc_name') }}
                                    </th>
                                    <td>
                                        {{ $accountInfo->acc_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.accountInfo.fields.acc_no') }}
                                    </th>
                                    <td>
                                        {{ $accountInfo->acc_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.accountInfo.fields.account_type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\AccountInfo::ACCOUNT_TYPE_SELECT[$accountInfo->account_type] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.accountInfo.fields.branch_code') }}
                                    </th>
                                    <td>
                                        {{ $accountInfo->branch_code->branch_code ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.accountInfo.fields.account_holder_nid') }}
                                    </th>
                                    <td>
                                        {{ $accountInfo->account_holder_nid }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.accountInfo.fields.eiin') }}
                                    </th>
                                    <td>
                                        {{ $accountInfo->eiin }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.account-infos.index') }}">
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