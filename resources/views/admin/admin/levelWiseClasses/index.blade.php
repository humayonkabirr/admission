@extends('layouts.admin')
@section('content')
<div class="content">
    @can('level_wise_class_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.level-wise-classes.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.levelWiseClass.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.levelWiseClass.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-LevelWiseClass">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.levelWiseClass.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.levelWiseClass.fields.class_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.levelWiseClass.fields.academic_level') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($levelWiseClasses as $key => $levelWiseClass)
                                    <tr data-entry-id="{{ $levelWiseClass->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $levelWiseClass->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $levelWiseClass->class_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $levelWiseClass->academic_level->level_name ?? '' }}
                                        </td>
                                        <td>
                                            @can('level_wise_class_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.level-wise-classes.show', $levelWiseClass->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('level_wise_class_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.level-wise-classes.edit', $levelWiseClass->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('level_wise_class_delete')
                                                <form action="{{ route('admin.level-wise-classes.destroy', $levelWiseClass->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('level_wise_class_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.level-wise-classes.massDestroy') }}",
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
  let table = $('.datatable-LevelWiseClass:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection