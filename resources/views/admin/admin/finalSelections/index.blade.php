@extends('layouts.admin')
@section('content')
<div class="content">
    @can('final_selection_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.final-selections.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.finalSelection.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.finalSelection.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-FinalSelection">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.finalSelection.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.finalSelection.fields.app_number') }}
                                </th>
                                <th>
                                    {{ trans('cruds.finalSelection.fields.student_name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.finalSelection.fields.brid') }}
                                </th>
                                <th>
                                    {{ trans('cruds.finalSelection.fields.father_name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.finalSelection.fields.mother_name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.finalSelection.fields.academic_level') }}
                                </th>
                                <th>
                                    {{ trans('cruds.finalSelection.fields.admission_class') }}
                                </th>
                                <th>
                                    {{ trans('cruds.finalSelection.fields.education_institute') }}
                                </th>
                                <th>
                                    {{ trans('cruds.finalSelection.fields.division') }}
                                </th>
                                <th>
                                    {{ trans('cruds.finalSelection.fields.district') }}
                                </th>
                                <th>
                                    {{ trans('cruds.finalSelection.fields.upazila') }}
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
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($academic_levels as $key => $item)
                                            <option value="{{ $item->level_name }}">{{ $item->level_name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($level_wise_classes as $key => $item)
                                            <option value="{{ $item->class_name }}">{{ $item->class_name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($educational_institutes as $key => $item)
                                            <option value="{{ $item->institution_name }}">{{ $item->institution_name }}</option>
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
@can('final_selection_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.final-selections.massDestroy') }}",
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
    ajax: "{{ route('admin.final-selections.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'app_number', name: 'app_number' },
{ data: 'student_name', name: 'student_name' },
{ data: 'brid', name: 'brid' },
{ data: 'father_name', name: 'father_name' },
{ data: 'mother_name', name: 'mother_name' },
{ data: 'academic_level_level_name', name: 'academic_level.level_name' },
{ data: 'admission_class_class_name', name: 'admission_class.class_name' },
{ data: 'education_institute_institution_name', name: 'education_institute.institution_name' },
{ data: 'division_division_name', name: 'division.division_name' },
{ data: 'district_district_name', name: 'district.district_name' },
{ data: 'upazila_upazila_name', name: 'upazila.upazila_name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-FinalSelection').DataTable(dtOverrideGlobals);
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