<div class="content">
    @can('document_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.documents.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.document.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.document.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-appNumberDocuments">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.document.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.document.fields.app_number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.document.fields.userid') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.document.fields.photo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.document.fields.sign') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.document.fields.brid_copy') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.document.fields.nid_copy') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.document.fields.last_result_copy') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.document.fields.institute_confirmation_letter') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.document.fields.medical_certificate') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.document.fields.govt_office_certificate') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.document.fields.land_certificate') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($documents as $key => $document)
                                    <tr data-entry-id="{{ $document->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $document->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $document->app_number->application_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $document->userid ?? '' }}
                                        </td>
                                        <td>
                                            @if($document->photo)
                                                <a href="{{ $document->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $document->photo->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($document->sign)
                                                <a href="{{ $document->sign->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $document->sign->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($document->brid_copy)
                                                <a href="{{ $document->brid_copy->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $document->brid_copy->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($document->nid_copy)
                                                <a href="{{ $document->nid_copy->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $document->nid_copy->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($document->last_result_copy)
                                                <a href="{{ $document->last_result_copy->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $document->last_result_copy->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($document->institute_confirmation_letter)
                                                <a href="{{ $document->institute_confirmation_letter->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $document->institute_confirmation_letter->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($document->medical_certificate)
                                                <a href="{{ $document->medical_certificate->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $document->medical_certificate->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($document->govt_office_certificate)
                                                <a href="{{ $document->govt_office_certificate->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $document->govt_office_certificate->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($document->land_certificate)
                                                <a href="{{ $document->land_certificate->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $document->land_certificate->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @can('document_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.documents.show', $document->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('document_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.documents.edit', $document->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('document_delete')
                                                <form action="{{ route('admin.documents.destroy', $document->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('document_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.documents.massDestroy') }}",
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
  let table = $('.datatable-appNumberDocuments:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection