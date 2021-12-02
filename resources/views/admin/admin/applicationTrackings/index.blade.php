@extends('layouts.admin')
@section('content')
<div class="content">
    @can('application_tracking_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.application-trackings.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.applicationTracking.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'ApplicationTracking', 'route' => 'admin.application-trackings.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.applicationTracking.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-ApplicationTracking">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.applicationTracking.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.applicationTracking.fields.user_id_no') }}
                                </th>
                                <th>
                                    {{ trans('cruds.applicationTracking.fields.application_no') }}
                                </th>
                                <th>
                                    {{ trans('cruds.applicationTracking.fields.is_completed') }}
                                </th>
                                <th>
                                    {{ trans('cruds.applicationTracking.fields.is_submitted') }}
                                </th>
                                <th>
                                    {{ trans('cruds.applicationTracking.fields.ih_seen') }}
                                </th>
                                <th>
                                    {{ trans('cruds.applicationTracking.fields.ih_approve') }}
                                </th>
                                <th>
                                    {{ trans('cruds.applicationTracking.fields.ih_forwarded') }}
                                </th>
                                <th>
                                    {{ trans('cruds.applicationTracking.fields.useo_forwarded') }}
                                </th>
                                <th>
                                    {{ trans('cruds.applicationTracking.fields.pmeat_accepted') }}
                                </th>
                                <th>
                                    {{ trans('cruds.applicationTracking.fields.pmeat_selected') }}
                                </th>
                                <th>
                                    {{ trans('cruds.applicationTracking.fields.rejection_reaseon') }}
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
                                        @foreach($users as $key => $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
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
                                </td>
                                <td>
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
@can('application_tracking_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.application-trackings.massDestroy') }}",
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
    ajax: "{{ route('admin.application-trackings.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'user_id_no_name', name: 'user_id_no.name' },
{ data: 'application_no', name: 'application_no' },
{ data: 'is_completed', name: 'is_completed' },
{ data: 'is_submitted', name: 'is_submitted' },
{ data: 'ih_seen', name: 'ih_seen' },
{ data: 'ih_approve', name: 'ih_approve' },
{ data: 'ih_forwarded', name: 'ih_forwarded' },
{ data: 'useo_forwarded', name: 'useo_forwarded' },
{ data: 'pmeat_accepted', name: 'pmeat_accepted' },
{ data: 'pmeat_selected', name: 'pmeat_selected' },
{ data: 'rejection_reaseon', name: 'rejection_reaseon' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-ApplicationTracking').DataTable(dtOverrideGlobals);
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