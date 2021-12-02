@extends('layouts.admin')
@section('content')
<div class="content">
    @can('institute_bank_account_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.institute-bank-accounts.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.instituteBankAccount.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.instituteBankAccount.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-InstituteBankAccount">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.instituteBankAccount.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.instituteBankAccount.fields.banking_type') }}
                                </th>
                                <th>
                                    {{ trans('cruds.instituteBankAccount.fields.account_name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.instituteBankAccount.fields.account_number') }}
                                </th>
                                <th>
                                    {{ trans('cruds.instituteBankAccount.fields.bank_name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.instituteBankAccount.fields.branch_name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.instituteBankAccount.fields.routing_no') }}
                                </th>
                                <th>
                                    {{ trans('cruds.instituteBankAccount.fields.eiin') }}
                                </th>
                                <th>
                                    {{ trans('cruds.educationalInstitute.fields.institution_eiin_no') }}
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
                                        @foreach($banking_types as $key => $item)
                                            <option value="{{ $item->banking_type }}">{{ $item->banking_type }}</option>
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
                                        @foreach($banking_service_providers as $key => $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($bank_branches as $key => $item)
                                            <option value="{{ $item->branch_name }}">{{ $item->branch_name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($bank_branches as $key => $item)
                                            <option value="{{ $item->routing_number }}">{{ $item->routing_number }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($educational_institutes as $key => $item)
                                            <option value="{{ $item->institution_eiin_no }}">{{ $item->institution_eiin_no }}</option>
                                        @endforeach
                                    </select>
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
@can('institute_bank_account_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.institute-bank-accounts.massDestroy') }}",
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
    ajax: "{{ route('admin.institute-bank-accounts.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'banking_type_banking_type', name: 'banking_type.banking_type' },
{ data: 'account_name', name: 'account_name' },
{ data: 'account_number', name: 'account_number' },
{ data: 'bank_name_name', name: 'bank_name.name' },
{ data: 'branch_name_branch_name', name: 'branch_name.branch_name' },
{ data: 'routing_no_routing_number', name: 'routing_no.routing_number' },
{ data: 'eiin_institution_eiin_no', name: 'eiin.institution_eiin_no' },
{ data: 'eiin.institution_eiin_no', name: 'eiin.institution_eiin_no' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-InstituteBankAccount').DataTable(dtOverrideGlobals);
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