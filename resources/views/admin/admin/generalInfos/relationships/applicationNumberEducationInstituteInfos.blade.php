<div class="content">
    @can('education_institute_info_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.education-institute-infos.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.educationInstituteInfo.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.educationInstituteInfo.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-applicationNumberEducationInstituteInfos">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.educationInstituteInfo.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.educationInstituteInfo.fields.application_number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.educationInstituteInfo.fields.education_level') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.educationInstituteInfo.fields.eiin') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.educationInstituteInfo.fields.last_gpa') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.educationInstituteInfo.fields.last_gpa_total') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($educationInstituteInfos as $key => $educationInstituteInfo)
                                    <tr data-entry-id="{{ $educationInstituteInfo->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $educationInstituteInfo->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $educationInstituteInfo->application_number->application_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $educationInstituteInfo->education_level->level_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $educationInstituteInfo->eiin->institution_eiin_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $educationInstituteInfo->last_gpa ?? '' }}
                                        </td>
                                        <td>
                                            {{ $educationInstituteInfo->last_gpa_total ?? '' }}
                                        </td>
                                        <td>
                                            @can('education_institute_info_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.education-institute-infos.show', $educationInstituteInfo->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('education_institute_info_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.education-institute-infos.edit', $educationInstituteInfo->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('education_institute_info_delete')
                                                <form action="{{ route('admin.education-institute-infos.destroy', $educationInstituteInfo->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('education_institute_info_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.education-institute-infos.massDestroy') }}",
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
  let table = $('.datatable-applicationNumberEducationInstituteInfos:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection