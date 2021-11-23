@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.selection.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.selections.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.selection.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $selection->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.selection.fields.app_number') }}
                                    </th>
                                    <td>
                                        {{ $selection->app_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.selection.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $selection->user }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.selection.fields.ih_comments') }}
                                    </th>
                                    <td>
                                        {{ $selection->ih_comments }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.selection.fields.ih_approval') }}
                                    </th>
                                    <td>
                                        {{ $selection->ih_approval }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.selection.fields.ih_submission') }}
                                    </th>
                                    <td>
                                        {{ $selection->ih_submission }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.selection.fields.useo_approval') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Selection::USEO_APPROVAL_SELECT[$selection->useo_approval] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.selection.fields.useo_submission') }}
                                    </th>
                                    <td>
                                        {{ $selection->useo_submission }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.selection.fields.pmeat_comments') }}
                                    </th>
                                    <td>
                                        {{ $selection->pmeat_comments }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.selection.fields.pmeat_approval') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Selection::PMEAT_APPROVAL_SELECT[$selection->pmeat_approval] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.selection.fields.eiin') }}
                                    </th>
                                    <td>
                                        {{ $selection->eiin }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.selection.fields.division') }}
                                    </th>
                                    <td>
                                        {{ $selection->division }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.selection.fields.district') }}
                                    </th>
                                    <td>
                                        {{ $selection->district }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.selection.fields.upazila') }}
                                    </th>
                                    <td>
                                        {{ $selection->upazila }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.selections.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection