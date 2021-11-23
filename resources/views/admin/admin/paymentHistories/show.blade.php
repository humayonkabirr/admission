@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.paymentHistory.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.payment-histories.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.paymentHistory.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $paymentHistory->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.paymentHistory.fields.payroll') }}
                                    </th>
                                    <td>
                                        {{ $paymentHistory->payroll->payroll_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.paymentHistory.fields.app_number') }}
                                    </th>
                                    <td>
                                        {{ $paymentHistory->app_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.paymentHistory.fields.stu_name') }}
                                    </th>
                                    <td>
                                        {{ $paymentHistory->stu_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.paymentHistory.fields.brid') }}
                                    </th>
                                    <td>
                                        {{ $paymentHistory->brid }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.paymentHistory.fields.bank_acc_no') }}
                                    </th>
                                    <td>
                                        {{ $paymentHistory->bank_acc_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.paymentHistory.fields.bank_acc_name') }}
                                    </th>
                                    <td>
                                        {{ $paymentHistory->bank_acc_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.paymentHistory.fields.student_bank_name') }}
                                    </th>
                                    <td>
                                        {{ $paymentHistory->student_bank_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.paymentHistory.fields.student_bank_branch') }}
                                    </th>
                                    <td>
                                        {{ $paymentHistory->student_bank_branch }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.paymentHistory.fields.bank_routing_no') }}
                                    </th>
                                    <td>
                                        {{ $paymentHistory->bank_routing_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.paymentHistory.fields.student_division') }}
                                    </th>
                                    <td>
                                        {{ $paymentHistory->student_division }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.paymentHistory.fields.student_district') }}
                                    </th>
                                    <td>
                                        {{ $paymentHistory->student_district }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.paymentHistory.fields.student_upazila') }}
                                    </th>
                                    <td>
                                        {{ $paymentHistory->student_upazila }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.paymentHistory.fields.pay_amount') }}
                                    </th>
                                    <td>
                                        {{ $paymentHistory->pay_amount }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.paymentHistory.fields.service_provider') }}
                                    </th>
                                    <td>
                                        {{ $paymentHistory->service_provider }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.paymentHistory.fields.disbursement_amount') }}
                                    </th>
                                    <td>
                                        {{ $paymentHistory->disbursement_amount }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.paymentHistory.fields.disbursement_date') }}
                                    </th>
                                    <td>
                                        {{ $paymentHistory->disbursement_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.paymentHistory.fields.disbursement_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\PaymentHistory::DISBURSEMENT_STATUS_SELECT[$paymentHistory->disbursement_status] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.payment-histories.index') }}">
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