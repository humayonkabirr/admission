@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.policy.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.policies.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.policy.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $policy->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.policy.fields.policy_name') }}
                                    </th>
                                    <td>
                                        {{ $policy->policy_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.policy.fields.policy_year') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Policy::POLICY_YEAR_SELECT[$policy->policy_year] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.policy.fields.last_gpa') }}
                                    </th>
                                    <td>
                                        {{ $policy->last_gpa }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.policy.fields.max_annual_income') }}
                                    </th>
                                    <td>
                                        {{ $policy->max_annual_income }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.policy.fields.active') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $policy->active ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.policies.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li role="presentation">
                        <a href="#policy_circulars" aria-controls="policy_circulars" role="tab" data-toggle="tab">
                            {{ trans('cruds.circular.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="policy_circulars">
                        @includeIf('admin.policies.relationships.policyCirculars', ['circulars' => $policy->policyCirculars])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection