<div class="content">
    @can('account_info_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.account-infos.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.accountInfo.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.accountInfo.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-appNumberAccountInfos">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.accountInfo.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.accountInfo.fields.app_number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.accountInfo.fields.banking_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.accountInfo.fields.bank_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.accountInfo.fields.bank_branch') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.accountInfo.fields.routing_no') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.accountInfo.fields.bank_account_owner') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.accountInfo.fields.acc_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.accountInfo.fields.acc_no') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($accountInfos as $key => $accountInfo)
                                    <tr data-entry-id="{{ $accountInfo->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $accountInfo->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $accountInfo->app_number->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $accountInfo->banking_type->banking_type ?? '' }}
                                        </td>
                                        <td>
                                            {{ $accountInfo->bank_name->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $accountInfo->bank_branch->branch_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $accountInfo->routing_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\AccountInfo::BANK_ACCOUNT_OWNER_SELECT[$accountInfo->bank_account_owner] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $accountInfo->acc_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $accountInfo->acc_no ?? '' }}
                                        </td>
                                        <td>
                                            @can('account_info_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.account-infos.show', $accountInfo->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('account_info_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.account-infos.edit', $accountInfo->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('account_info_delete')
                                                <form action="{{ route('admin.account-infos.destroy', $accountInfo->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('account_info_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.account-infos.massDestroy') }}",
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
  let table = $('.datatable-appNumberAccountInfos:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection