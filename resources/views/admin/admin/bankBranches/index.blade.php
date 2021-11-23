@extends('layouts.admin')
@section('content')
<div class="content">
    @can('bank_branch_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.bank-branches.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.bankBranch.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'BankBranch', 'route' => 'admin.bank-branches.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.bankBranch.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-BankBranch">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.bankBranch.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.bankBranch.fields.bank_name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.bankBranch.fields.branch_name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.bankBranch.fields.branch_code') }}
                                </th>
                                <th>
                                    {{ trans('cruds.bankBranch.fields.district') }}
                                </th>
                                <th>
                                    {{ trans('cruds.bankBranch.fields.upazila') }}
                                </th>
                                <th>
                                    {{ trans('cruds.bankBranch.fields.routing_number') }}
                                </th>
                                <th>
                                    {{ trans('cruds.bankBranch.fields.swift_code') }}
                                </th>
                                <th>
                                    {{ trans('cruds.bankBranch.fields.email') }}
                                </th>
                                <th>
                                    {{ trans('cruds.bankBranch.fields.manager_name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.bankBranch.fields.phone') }}
                                </th>
                                <th>
                                    {{ trans('cruds.bankBranch.fields.mobile') }}
                                </th>
                                <th>
                                    {{ trans('cruds.bankBranch.fields.active') }}
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
                                        @foreach($banking_service_providers as $key => $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
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
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
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
@can('bank_branch_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.bank-branches.massDestroy') }}",
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
    ajax: "{{ route('admin.bank-branches.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'bank_name_name', name: 'bank_name.name' },
{ data: 'branch_name', name: 'branch_name' },
{ data: 'branch_code', name: 'branch_code' },
{ data: 'district_district_name', name: 'district.district_name' },
{ data: 'upazila_upazila_name', name: 'upazila.upazila_name' },
{ data: 'routing_number', name: 'routing_number' },
{ data: 'swift_code', name: 'swift_code' },
{ data: 'email', name: 'email' },
{ data: 'manager_name', name: 'manager_name' },
{ data: 'phone', name: 'phone' },
{ data: 'mobile', name: 'mobile' },
{ data: 'active', name: 'active' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-BankBranch').DataTable(dtOverrideGlobals);
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