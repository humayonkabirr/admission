@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.academicLevel.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.academic-levels.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.academicLevel.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $academicLevel->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.academicLevel.fields.level_name') }}
                                    </th>
                                    <td>
                                        {{ $academicLevel->level_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.academicLevel.fields.active') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $academicLevel->active ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.academic-levels.index') }}">
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
                        <a href="#academic_level_level_wise_classes" aria-controls="academic_level_level_wise_classes" role="tab" data-toggle="tab">
                            {{ trans('cruds.levelWiseClass.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="academic_level_level_wise_classes">
                        @includeIf('admin.academicLevels.relationships.academicLevelLevelWiseClasses', ['levelWiseClasses' => $academicLevel->academicLevelLevelWiseClasses])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection