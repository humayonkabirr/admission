@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.finalSelectionCriterion.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.final-selection-criteria.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.finalSelectionCriterion.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $finalSelectionCriterion->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.finalSelectionCriterion.fields.final_criteria_name') }}
                                    </th>
                                    <td>
                                        {{ $finalSelectionCriterion->final_criteria_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.finalSelectionCriterion.fields.cirular') }}
                                    </th>
                                    <td>
                                        {{ $finalSelectionCriterion->cirular->cirucular_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.finalSelectionCriterion.fields.division') }}
                                    </th>
                                    <td>
                                        {{ $finalSelectionCriterion->division->division_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.finalSelectionCriterion.fields.district') }}
                                    </th>
                                    <td>
                                        {{ $finalSelectionCriterion->district->district_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.finalSelectionCriterion.fields.upazila') }}
                                    </th>
                                    <td>
                                        {{ $finalSelectionCriterion->upazila->upazila_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.finalSelectionCriterion.fields.active') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $finalSelectionCriterion->active ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.final-selection-criteria.index') }}">
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