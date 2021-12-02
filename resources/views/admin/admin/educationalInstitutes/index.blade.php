@extends('layouts.admin')
@section('content')
<div class="content">
    @can('educational_institute_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.educational-institutes.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.educationalInstitute.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'EducationalInstitute', 'route' => 'admin.educational-institutes.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.educationalInstitute.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-EducationalInstitute">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.educationalInstitute.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.educationalInstitute.fields.institution_eiin_no') }}
                                </th>
                                <th>
                                    {{ trans('cruds.educationalInstitute.fields.institution_name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.educationalInstitute.fields.legal_status') }}
                                </th>
                                <th>
                                    {{ trans('cruds.educationalInstitute.fields.academic_level') }}
                                </th>
                                <th>
                                    {{ trans('cruds.educationalInstitute.fields.institute_head') }}
                                </th>
                                <th>
                                    {{ trans('cruds.educationalInstitute.fields.email') }}
                                </th>
                                <th>
                                    {{ trans('cruds.educationalInstitute.fields.mobile_phone') }}
                                </th>
                                <th>
                                    {{ trans('cruds.educationalInstitute.fields.phone') }}
                                </th>
                                <th>
                                    {{ trans('cruds.educationalInstitute.fields.division') }}
                                </th>
                                <th>
                                    {{ trans('cruds.educationalInstitute.fields.district') }}
                                </th>
                                <th>
                                    {{ trans('cruds.educationalInstitute.fields.upazila') }}
                                </th>
                                <th>
                                    {{ trans('cruds.educationalInstitute.fields.union') }}
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
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($institut_legal_statuses as $key => $item)
                                            <option value="{{ $item->institute_legal_status }}">{{ $item->institute_legal_status }}</option>
                                        @endforeach
                                    </select>
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
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($unions as $key => $item)
                                            <option value="{{ $item->union_name }}">{{ $item->union_name }}</option>
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
@can('educational_institute_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.educational-institutes.massDestroy') }}",
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
    ajax: "{{ route('admin.educational-institutes.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'institution_eiin_no', name: 'institution_eiin_no' },
{ data: 'institution_name', name: 'institution_name' },
{ data: 'legal_status_institute_legal_status', name: 'legal_status.institute_legal_status' },
{ data: 'academic_level', name: 'academic_levels.level_name' },
{ data: 'institute_head', name: 'institute_head' },
{ data: 'email', name: 'email' },
{ data: 'mobile_phone', name: 'mobile_phone' },
{ data: 'phone', name: 'phone' },
{ data: 'division_division_name', name: 'division.division_name' },
{ data: 'district_district_name', name: 'district.district_name' },
{ data: 'upazila_upazila_name', name: 'upazila.upazila_name' },
{ data: 'union_union_name', name: 'union.union_name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-EducationalInstitute').DataTable(dtOverrideGlobals);
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