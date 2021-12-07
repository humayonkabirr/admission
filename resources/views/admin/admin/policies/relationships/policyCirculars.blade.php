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

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-policyCirculars">
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
                            </thead>
                            <tbody>
                                @foreach($circulars as $key => $circular)
                                    <tr data-entry-id="{{ $circular->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ App\Models\Circular::CIRCULAR_TYPE_SELECT[$circular->circular_type] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $circular->cirucular_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $circular->circular_year ?? '' }}
                                        </td>
                                        <td>
                                            {{ $circular->academic_year->academic_year ?? '' }}
                                        </td>
                                        <td>
                                            {{ $circular->policy->policy_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $circular->sec_stipend_amount ?? '' }}
                                        </td>
                                        <td>
                                            {{ $circular->hsec_stipend_amount ?? '' }}
                                        </td>
                                        <td>
                                            {{ $circular->hons_stipend_amount ?? '' }}
                                        </td>
                                        <td>
                                            {{ $circular->application_deadline ?? '' }}
                                        </td>
                                        <td>
                                            @if($circular->circular_file)
                                                <a href="{{ $circular->circular_file->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @can('circular_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.circulars.show', $circular->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('circular_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.circulars.edit', $circular->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('circular_delete')
                                                <form action="{{ route('admin.circulars.destroy', $circular->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('circular_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.circulars.massDestroy') }}",
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
    order: [[ 2, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-policyCirculars:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection