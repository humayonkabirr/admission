<div class="content">
    @can('family_info_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.family-infos.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.familyInfo.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.familyInfo.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-applicationNumberFamilyInfos">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.familyInfo.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.familyInfo.fields.application_number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.familyInfo.fields.familystatus') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.familyInfo.fields.guardian_occupation') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.familyInfo.fields.guardian_education') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.familyInfo.fields.guardian_land') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.familyInfo.fields.guardian_annual_income') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.familyInfo.fields.family_member') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($familyInfos as $key => $familyInfo)
                                    <tr data-entry-id="{{ $familyInfo->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $familyInfo->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $familyInfo->application_number->application_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $familyInfo->familystatus->status_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $familyInfo->guardian_occupation->occupation_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\FamilyInfo::GUARDIAN_EDUCATION_SELECT[$familyInfo->guardian_education] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $familyInfo->guardian_land ?? '' }}
                                        </td>
                                        <td>
                                            {{ $familyInfo->guardian_annual_income ?? '' }}
                                        </td>
                                        <td>
                                            {{ $familyInfo->family_member ?? '' }}
                                        </td>
                                        <td>
                                            @can('family_info_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.family-infos.show', $familyInfo->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('family_info_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.family-infos.edit', $familyInfo->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('family_info_delete')
                                                <form action="{{ route('admin.family-infos.destroy', $familyInfo->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('family_info_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.family-infos.massDestroy') }}",
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
  let table = $('.datatable-applicationNumberFamilyInfos:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection