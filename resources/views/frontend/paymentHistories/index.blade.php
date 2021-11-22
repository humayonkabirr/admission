@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('payment_history_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.payment-histories.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.paymentHistory.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'PaymentHistory', 'route' => 'admin.payment-histories.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.paymentHistory.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-PaymentHistory">
                            <thead>
                                <tr>
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
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($payrolls as $key => $item)
                                                <option value="{{ $item->payroll_name }}">{{ $item->payroll_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\Models\PaymentHistory::DISBURSEMENT_STATUS_SELECT as $key => $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($paymentHistories as $key => $paymentHistory)
                                    <tr data-entry-id="{{ $paymentHistory->id }}">
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
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.payment-histories.show', $paymentHistory->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('payment_history_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.payment-histories.edit', $paymentHistory->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('payment_history_delete')
                                                <form action="{{ route('frontend.payment-histories.destroy', $paymentHistory->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('payment_history_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.payment-histories.massDestroy') }}",
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
  let table = $('.datatable-PaymentHistory:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection