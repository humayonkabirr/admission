@extends('layouts.admin')
@section('content')
<div class="content">
    @can('circular_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.circulars.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.circular.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.circular.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Circular">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.circular.fields.circular_type') }}
                                </th>
                                <th>
                                    {{ trans('cruds.circular.fields.cirucular_name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.circular.fields.circular_year') }}
                                </th>
                                <th>
                                    {{ trans('cruds.circular.fields.academic_year') }}
                                </th>
                                <th>
                                    {{ trans('cruds.circular.fields.policy') }}
                                </th>
                                <th>
                                    {{ trans('cruds.circular.fields.sec_stipend_amount') }}
                                </th>
                                <th>
                                    {{ trans('cruds.circular.fields.hsec_stipend_amount') }}
                                </th>
                                <th>
                                    {{ trans('cruds.circular.fields.hons_stipend_amount') }}
                                </th>
                                <th>
                                    {{ trans('cruds.circular.fields.application_deadline') }}
                                </th>
                                <th>
                                    {{ trans('cruds.circular.fields.circular_file') }}
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\Circular::CIRCULAR_TYPE_SELECT as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
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
                                        @foreach($academic_years as $key => $item)
                                            <option value="{{ $item->academic_year }}">{{ $item->academic_year }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($policies as $key => $item)
                                            <option value="{{ $item->policy_name }}">{{ $item->policy_name }}</option>
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
@can('circular_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.circulars.massDestroy') }}",
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
    ajax: "{{ route('admin.circulars.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
        { data: 'circular_type', name: 'circular_type' },
        { data: 'cirucular_name', name: 'cirucular_name' },
        { data: 'circular_year', name: 'circular_year' },
        { data: 'academic_year_academic_year', name: 'academic_year.academic_year' },
        { data: 'policy_policy_name', name: 'policy.policy_name' },
        { data: 'sec_stipend_amount', name: 'sec_stipend_amount' },
        { data: 'hsec_stipend_amount', name: 'hsec_stipend_amount' },
        { data: 'hons_stipend_amount', name: 'hons_stipend_amount' },
        { data: 'application_deadline', name: 'application_deadline' },
        { data: 'circular_file', name: 'circular_file', sortable: false, searchable: false },
        { data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 2, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Circular').DataTable(dtOverrideGlobals);
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