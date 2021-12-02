<div class="content">
    @can('training_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.trainings.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.training.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.training.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-empNoTrainings">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.training.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.training.fields.user') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.training.fields.emp_no') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.training.fields.training_subject') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.training.fields.training_institute') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.training.fields.certificate_issuer') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.training.fields.result_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.training.fields.result') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.training.fields.year') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.training.fields.start_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.training.fields.end_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.training.fields.approved') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.training.fields.approved_by') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($trainings as $key => $training)
                                    <tr data-entry-id="{{ $training->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $training->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $training->user->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $training->emp_no->employee_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $training->training_subject ?? '' }}
                                        </td>
                                        <td>
                                            {{ $training->training_institute ?? '' }}
                                        </td>
                                        <td>
                                            {{ $training->certificate_issuer ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Training::RESULT_TYPE_SELECT[$training->result_type] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $training->result ?? '' }}
                                        </td>
                                        <td>
                                            {{ $training->year ?? '' }}
                                        </td>
                                        <td>
                                            {{ $training->start_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $training->end_date ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $training->approved ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $training->approved ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $training->approved_by ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $training->approved_by ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            @can('training_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.trainings.show', $training->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('training_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.trainings.edit', $training->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('training_delete')
                                                <form action="{{ route('admin.trainings.destroy', $training->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('training_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.trainings.massDestroy') }}",
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
  let table = $('.datatable-empNoTrainings:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection