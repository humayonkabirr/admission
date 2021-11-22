@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.bankingServiceProvider.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.banking-service-providers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bankingServiceProvider.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $bankingServiceProvider->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bankingServiceProvider.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $bankingServiceProvider->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bankingServiceProvider.fields.bank_type') }}
                                    </th>
                                    <td>
                                        {{ $bankingServiceProvider->bank_type->banking_type ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bankingServiceProvider.fields.head_office') }}
                                    </th>
                                    <td>
                                        {{ $bankingServiceProvider->head_office }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bankingServiceProvider.fields.known_as') }}
                                    </th>
                                    <td>
                                        {{ $bankingServiceProvider->known_as }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bankingServiceProvider.fields.swift_code') }}
                                    </th>
                                    <td>
                                        {{ $bankingServiceProvider->swift_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bankingServiceProvider.fields.category') }}
                                    </th>
                                    <td>
                                        {{ App\Models\BankingServiceProvider::CATEGORY_SELECT[$bankingServiceProvider->category] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bankingServiceProvider.fields.website') }}
                                    </th>
                                    <td>
                                        {{ $bankingServiceProvider->website }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.banking-service-providers.index') }}">
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
                        <a href="#bank_name_bank_branches" aria-controls="bank_name_bank_branches" role="tab" data-toggle="tab">
                            {{ trans('cruds.bankBranch.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="bank_name_bank_branches">
                        @includeIf('admin.bankingServiceProviders.relationships.bankNameBankBranches', ['bankBranches' => $bankingServiceProvider->bankNameBankBranches])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection