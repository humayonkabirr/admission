@extends('layouts.admin')
@section('content')
<div class="content">
    @can('academic_year_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.academic-years.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.academicYear.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.academicYear.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-AcademicYear">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.academicYear.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.academicYear.fields.academic_year') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.academicYear.fields.start_year') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.academicYear.fields.end_year') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($academicYears as $key => $academicYear)
                                    <tr data-entry-id="{{ $academicYear->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $academicYear->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $academicYear->academic_year ?? '' }}
                                        </td>
                                        <td>
                                            {{ $academicYear->start_year ?? '' }}
                                        </td>
                                        <td>
                                            {{ $academicYear->end_year ?? '' }}
                                        </td>
                                        <td>
                                            @can('academic_year_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.academic-years.show', $academicYear->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('academic_year_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.academic-years.edit', $academicYear->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('academic_year_delete')
                                                <form action="{{ route('admin.academic-years.destroy', $academicYear->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('academic_year_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.academic-years.massDestroy') }}",
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
  let table = $('.datatable-AcademicYear:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  $('div#sidebar').on('transitionend', function(e) {
    $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
  })
  
})

</script>
@endsection