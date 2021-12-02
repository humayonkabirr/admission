@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.payroll.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.payrolls.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.payroll.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $payroll->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.payroll.fields.payroll_name') }}
                                    </th>
                                    <td>
                                        {{ $payroll->payroll_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.payroll.fields.circular') }}
                                    </th>
                                    <td>
                                        {{ $payroll->circular->cirucular_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.payroll.fields.division') }}
                                    </th>
                                    <td>
                                        {{ $payroll->division->division_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.payroll.fields.district') }}
                                    </th>
                                    <td>
                                        {{ $payroll->district->district_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.payroll.fields.upazila') }}
                                    </th>
                                    <td>
                                        {{ $payroll->upazila->upazila_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.payroll.fields.total_student') }}
                                    </th>
                                    <td>
                                        {{ $payroll->total_student }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.payroll.fields.financial_institutaion') }}
                                    </th>
                                    <td>
                                        {{ $payroll->financial_institutaion }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.payroll.fields.total_assistance') }}
                                    </th>
                                    <td>
                                        {{ $payroll->total_assistance }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.payroll.fields.total_disbursement') }}
                                    </th>
                                    <td>
                                        {{ $payroll->total_disbursement }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.payroll.fields.disbursement_status') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $payroll->disbursement_status ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.payroll.fields.activation_date') }}
                                    </th>
                                    <td>
                                        {{ $payroll->activation_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.payroll.fields.deactivation_date') }}
                                    </th>
                                    <td>
                                        {{ $payroll->deactivation_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.payroll.fields.api_key') }}
                                    </th>
                                    <td>
                                        {{ $payroll->api_key }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.payrolls.index') }}">
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
                        <a href="#payroll_payment_histories" aria-controls="payroll_payment_histories" role="tab" data-toggle="tab">
                            {{ trans('cruds.paymentHistory.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="payroll_payment_histories">
                        @includeIf('admin.payrolls.relationships.payrollPaymentHistories', ['paymentHistories' => $payroll->payrollPaymentHistories])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection