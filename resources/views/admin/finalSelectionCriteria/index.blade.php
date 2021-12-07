@extends('layouts.admin')
@section('content')
<div class="content">
    @can('final_selection_criterion_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.final-selection-criteria.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.finalSelectionCriterion.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'FinalSelectionCriterion', 'route' => 'admin.final-selection-criteria.parseCsvImport'])
        </div>
    </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.finalSelectionCriterion.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable FinalSelectionCriterion">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>
                                    {{ trans('cruds.finalSelectionCriterion.fields.final_criteria_name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.finalSelectionCriterion.fields.cirular') }}
                                </th>
                                <th>
                                    {{ trans('cruds.finalSelectionCriterion.fields.division') }}
                                </th>
                                <th>
                                    {{ trans('cruds.finalSelectionCriterion.fields.district') }}
                                </th>
                                <th>
                                    {{ trans('cruds.finalSelectionCriterion.fields.upazila') }}
                                </th>
                                <th>
                                    {{ trans('cruds.educationInstituteInfo.fields.last_gpa') }}
                                </th>
                                <th>
                                    {{ trans('cruds.familyInfo.fields.familystatus') }}
                                </th>
                                <th>
                                    {{ trans('cruds.familyInfo.fields.family_member') }}
                                </th>
                                <th>
                                    {{ trans('cruds.finalSelectionCriterion.fields.active') }}
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                            @foreach ($FinalSelectionCriterions as $key => $criteria)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$criteria->final_criteria_name}}</td>
                                <td>{{$criteria->cirular->cirucular_name ?? '--' }}</td>
                                <td>{{$criteria->division->division_name ?? '--'}}</td>
                                <td>{{$criteria->district->district_name ?? '--'}}</td>
                                <td>{{$criteria->upazila->upazila_name ?? '--'}}</td>
                                <td>{{$criteria->last_gpa?? '--'}}</td>
                                <td>{{$criteria->familyStatus->status_name ?? '--'}}</td>
                                <td>{{$criteria->family_member ?? '--'}}</td>
                                <td>{{$criteria->active ? 'Active' : 'Deactive'}}</td>
                            </tr>
                            @endforeach
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
    $(function() {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons) < blade can('general_info_delete') / >
            let deleteButtonTrans = '{{ trans('
        global.datatables.delete ') }}';
        let deleteButton = {
            text: deleteButtonTrans,
            url: "{{ route('admin.general-infos.massDestroy') }}",
            className: 'btn-danger',
            action: function(e, dt, node, config) {
                var ids = $.map(dt.rows({
                    selected: true
                }).data(), function(entry) {
                    return entry.id
                });

                if (ids.length === 0) {
                    alert('{{ trans('
                        global.datatables.zero_selected ') }}')

                    return
                }

                if (confirm('{{ trans('
                        global.areYouSure ') }}')) {
                    $.ajax({
                            headers: {
                                'x-csrf-token': _token
                            },
                            method: 'POST',
                            url: config.url,
                            data: {
                                ids: ids,
                                _method: 'DELETE'
                            }
                        })
                        .done(function() {
                            location.reload()
                        })
                }
            }
        }
        dtButtons.push(deleteButton) < blade endcan / >

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route('admin.general-infos.index') }}",
                columns: [{
                        data: 'placeholder',
                        name: 'placeholder'
                    },
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'application_no',
                        name: 'application_no'
                    },
                    {
                        data: 'brid',
                        name: 'brid'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'father_name',
                        name: 'father_name'
                    },
                    {
                        data: 'dob',
                        name: 'dob'
                    },
                    {
                        data: 'gender',
                        name: 'gender'
                    },
                    {
                        data: 'division_division_name',
                        name: 'division.division_name'
                    },
                    {
                        data: 'district_district_name',
                        name: 'district.district_name'
                    },
                    {
                        data: 'upazila_upazila_name',
                        name: 'upazila.upazila_name'
                    },
                    {
                        data: 'union_union_name',
                        name: 'union.union_name'
                    },
                    {
                        data: 'actions',
                        name: '{{ trans('
                        global.actions ') }}'
                    }
                ],
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 100,
            };
        let table = $('.datatable-GeneralInfo').DataTable(dtOverrideGlobals);
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });

        let visibleColumnsIndexes = null;
        $('.datatable thead').on('input', '.search', function() {
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
