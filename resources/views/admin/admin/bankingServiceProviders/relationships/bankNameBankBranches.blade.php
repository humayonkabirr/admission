<div class="content">
    @can('bank_branch_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.bank-branches.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.bankBranch.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.bankBranch.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-bankNameBankBranches">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.bankBranch.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bankBranch.fields.bank_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bankBranch.fields.branch_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bankBranch.fields.branch_code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bankBranch.fields.district') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bankBranch.fields.upazila') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bankBranch.fields.routing_number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bankBranch.fields.swift_code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bankBranch.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bankBranch.fields.manager_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bankBranch.fields.phone') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bankBranch.fields.mobile') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bankBranch.fields.active') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bankBranches as $key => $bankBranch)
                                    <tr data-entry-id="{{ $bankBranch->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $bankBranch->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $bankBranch->bank_name->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $bankBranch->branch_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $bankBranch->branch_code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $bankBranch->district->district_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $bankBranch->upazila->upazila_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $bankBranch->routing_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $bankBranch->swift_code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $bankBranch->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $bankBranch->manager_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $bankBranch->phone ?? '' }}
                                        </td>
                                        <td>
                                            {{ $bankBranch->mobile ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $bankBranch->active ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $bankBranch->active ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            @can('bank_branch_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.bank-branches.show', $bankBranch->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('bank_branch_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.bank-branches.edit', $bankBranch->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('bank_branch_delete')
                                                <form action="{{ route('admin.bank-branches.destroy', $bankBranch->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('bank_branch_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.bank-branches.massDestroy') }}",
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
  let table = $('.datatable-bankNameBankBranches:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection