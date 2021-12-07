@extends('layouts.admin')
@section('content')
<div class="content">
    @can('payroll_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.payrolls.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.payroll.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'Payroll', 'route' => 'admin.payrolls.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.payroll.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Payroll">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.payroll.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.payroll.fields.payroll_name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.payroll.fields.circular') }}
                                </th>
                                <th>
                                    {{ trans('cruds.payroll.fields.division') }}
                                </th>
                                <th>
                                    {{ trans('cruds.payroll.fields.district') }}
                                </th>
                                <th>
                                    {{ trans('cruds.payroll.fields.upazila') }}
                                </th>
                                <th>
                                    {{ trans('cruds.payroll.fields.total_student') }}
                                </th>
                                <th>
                                    {{ trans('cruds.payroll.fields.financial_institutaion') }}
                                </th>
                                <th>
                                    {{ trans('cruds.payroll.fields.total_assistance') }}
                                </th>
                                <th>
                                    {{ trans('cruds.payroll.fields.total_disbursement') }}
                                </th>
                                <th>
                                    {{ trans('cruds.payroll.fields.disbursement_status') }}
                                </th>
                                <th>
                                    {{ trans('cruds.payroll.fields.activation_date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.payroll.fields.deactivation_date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.payroll.fields.api_key') }}
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
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($circulars as $key => $item)
                                            <option value="{{ $item->cirucular_name }}">{{ $item->cirucular_name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($divisions as $key => $item)
                                            <option value="{{ $item->division_name }}">{{ $item->division_name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($districts as $key => $item)
                                            <option value="{{ $item->district_name }}">{{ $item->district_name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($upazilas as $key => $item)
                                            <option value="{{ $item->upazila_name }}">{{ $item->upazila_name }}</option>
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
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
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
@can('payroll_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.payrolls.massDestroy') }}",
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
    ajax: "{{ route('admin.payrolls.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'payroll_name', name: 'payroll_name' },
{ data: 'circular_cirucular_name', name: 'circular.cirucular_name' },
{ data: 'division_division_name', name: 'division.division_name' },
{ data: 'district_district_name', name: 'district.district_name' },
{ data: 'upazila_upazila_name', name: 'upazila.upazila_name' },
{ data: 'total_student', name: 'total_student' },
{ data: 'financial_institutaion', name: 'financial_institutaion' },
{ data: 'total_assistance', name: 'total_assistance' },
{ data: 'total_disbursement', name: 'total_disbursement' },
{ data: 'disbursement_status', name: 'disbursement_status' },
{ data: 'activation_date', name: 'activation_date' },
{ data: 'deactivation_date', name: 'deactivation_date' },
{ data: 'api_key', name: 'api_key' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Payroll').DataTable(dtOverrideGlobals);
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