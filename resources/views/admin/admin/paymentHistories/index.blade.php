@extends('layouts.admin')
@section('content')
<div class="content">
    @can('payment_history_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.payment-histories.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.paymentHistory.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'PaymentHistory', 'route' => 'admin.payment-histories.parseCsvImport'])
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
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-PaymentHistory">
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
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                </td>
                            </tr>
                        </thead>
                    </table>
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
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.payment-histories.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.payment-histories.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'payroll_payroll_name', name: 'payroll.payroll_name' },
{ data: 'app_number', name: 'app_number' },
{ data: 'stu_name', name: 'stu_name' },
{ data: 'bank_acc_no', name: 'bank_acc_no' },
{ data: 'student_bank_name', name: 'student_bank_name' },
{ data: 'student_division', name: 'student_division' },
{ data: 'student_district', name: 'student_district' },
{ data: 'student_upazila', name: 'student_upazila' },
{ data: 'pay_amount', name: 'pay_amount' },
{ data: 'disbursement_date', name: 'disbursement_date' },
{ data: 'disbursement_status', name: 'disbursement_status' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-PaymentHistory').DataTable(dtOverrideGlobals);
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
});

</script>
@endsection