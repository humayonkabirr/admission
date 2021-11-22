@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.applicationTracking.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.application-trackings.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.applicationTracking.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $applicationTracking->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.applicationTracking.fields.user_id_no') }}
                                    </th>
                                    <td>
                                        {{ $applicationTracking->user_id_no->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.applicationTracking.fields.application_no') }}
                                    </th>
                                    <td>
                                        {{ $applicationTracking->application_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.applicationTracking.fields.is_completed') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $applicationTracking->is_completed ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.applicationTracking.fields.is_submitted') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $applicationTracking->is_submitted ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.applicationTracking.fields.ih_seen') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $applicationTracking->ih_seen ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.applicationTracking.fields.ih_approve') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $applicationTracking->ih_approve ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.applicationTracking.fields.ih_forwarded') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $applicationTracking->ih_forwarded ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.applicationTracking.fields.useo_forwarded') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $applicationTracking->useo_forwarded ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.applicationTracking.fields.pmeat_accepted') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $applicationTracking->pmeat_accepted ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.applicationTracking.fields.pmeat_selected') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $applicationTracking->pmeat_selected ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.applicationTracking.fields.rejection_reaseon') }}
                                    </th>
                                    <td>
                                        {{ $applicationTracking->rejection_reaseon }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.application-trackings.index') }}">
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