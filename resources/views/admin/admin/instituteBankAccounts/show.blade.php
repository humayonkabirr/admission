@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.instituteBankAccount.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.institute-bank-accounts.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.instituteBankAccount.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $instituteBankAccount->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.instituteBankAccount.fields.banking_type') }}
                                    </th>
                                    <td>
                                        {{ $instituteBankAccount->banking_type->banking_type ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.instituteBankAccount.fields.account_name') }}
                                    </th>
                                    <td>
                                        {{ $instituteBankAccount->account_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.instituteBankAccount.fields.account_number') }}
                                    </th>
                                    <td>
                                        {{ $instituteBankAccount->account_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.instituteBankAccount.fields.bank_name') }}
                                    </th>
                                    <td>
                                        {{ $instituteBankAccount->bank_name->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.instituteBankAccount.fields.branch_name') }}
                                    </th>
                                    <td>
                                        {{ $instituteBankAccount->branch_name->branch_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.instituteBankAccount.fields.routing_no') }}
                                    </th>
                                    <td>
                                        {{ $instituteBankAccount->routing_no->routing_number ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.instituteBankAccount.fields.eiin') }}
                                    </th>
                                    <td>
                                        {{ $instituteBankAccount->eiin->institution_eiin_no ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.institute-bank-accounts.index') }}">
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