@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.district.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.districts.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.district.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $district->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.district.fields.division_name') }}
                                    </th>
                                    <td>
                                        {{ $district->division_name->division_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.district.fields.district_name') }}
                                    </th>
                                    <td>
                                        {{ $district->district_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.district.fields.district_name_en') }}
                                    </th>
                                    <td>
                                        {{ $district->district_name_en }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.districts.index') }}">
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
                        <a href="#district_name_thanas" aria-controls="district_name_thanas" role="tab" data-toggle="tab">
                            {{ trans('cruds.thana.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="district_name_thanas">
                        @includeIf('admin.districts.relationships.districtNameThanas', ['thanas' => $district->districtNameThanas])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection