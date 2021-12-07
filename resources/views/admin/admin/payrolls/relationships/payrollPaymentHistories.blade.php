<div class="content">
    @can('payment_history_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.payment-histories.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.paymentHistory.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.paymentHistory.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-payrollPaymentHistories">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.paymentHistory.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paymentHistory.fields.payroll') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paymentHistory.fields.app_number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paymentHistory.fields.stu_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paymentHistory.fields.bank_acc_no') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paymentHistory.fields.student_bank_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paymentHistory.fields.student_division') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paymentHistory.fields.student_district') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paymentHistory.fields.student_upazila') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paymentHistory.fields.pay_amount') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paymentHistory.fields.disbursement_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paymentHistory.fields.disbursement_status') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($paymentHistories as $key => $paymentHistory)
                                    <tr data-entry-id="{{ $paymentHistory->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $paymentHistory->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $paymentHistory->payroll->payroll_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $paymentHistory->app_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $paymentHistory->stu_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $paymentHistory->bank_acc_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $paymentHistory->student_bank_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $paymentHistory->student_division ?? '' }}
                                        </td>
                                        <td>
                                            {{ $paymentHistory->student_district ?? '' }}
                                        </td>
                                        <td>
                                            {{ $paymentHistory->student_upazila ?? '' }}
                                        </td>
                                        <td>
                                            {{ $paymentHistory->pay_amount ?? '' }}
                                        </td>
                                        <td>
                                            {{ $paymentHistory->disbursement_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\PaymentHistory::DISBURSEMENT_STATUS_SELECT[$paymentHistory->disbursement_status] ?? '' }}
                                        </td>
                                        <td>
                                            @can('payment_history_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.payment-histories.show', $paymentHistory->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('payment_history_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.payment-histories.edit', $paymentHistory->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('payment_history_delete')
                                                <form action="{{ route('admin.payment-histories.destroy', $paymentHistory->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('payment_history_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.payment-histories.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-payrollPaymentHistories:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection