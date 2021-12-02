@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.document.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.documents.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.document.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $document->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.document.fields.app_number') }}
                                    </th>
                                    <td>
                                        {{ $document->app_number->application_no ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.document.fields.userid') }}
                                    </th>
                                    <td>
                                        {{ $document->userid }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.document.fields.photo') }}
                                    </th>
                                    <td>
                                        @if($document->photo)
                                            <a href="{{ $document->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $document->photo->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.document.fields.sign') }}
                                    </th>
                                    <td>
                                        @if($document->sign)
                                            <a href="{{ $document->sign->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $document->sign->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.document.fields.brid_copy') }}
                                    </th>
                                    <td>
                                        @if($document->brid_copy)
                                            <a href="{{ $document->brid_copy->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $document->brid_copy->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.document.fields.nid_copy') }}
                                    </th>
                                    <td>
                                        @if($document->nid_copy)
                                            <a href="{{ $document->nid_copy->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $document->nid_copy->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.document.fields.last_result_copy') }}
                                    </th>
                                    <td>
                                        @if($document->last_result_copy)
                                            <a href="{{ $document->last_result_copy->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $document->last_result_copy->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.document.fields.institute_confirmation_letter') }}
                                    </th>
                                    <td>
                                        @if($document->institute_confirmation_letter)
                                            <a href="{{ $document->institute_confirmation_letter->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $document->institute_confirmation_letter->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.document.fields.medical_certificate') }}
                                    </th>
                                    <td>
                                        @if($document->medical_certificate)
                                            <a href="{{ $document->medical_certificate->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $document->medical_certificate->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.document.fields.govt_office_certificate') }}
                                    </th>
                                    <td>
                                        @if($document->govt_office_certificate)
                                            <a href="{{ $document->govt_office_certificate->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $document->govt_office_certificate->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.document.fields.land_certificate') }}
                                    </th>
                                    <td>
                                        @if($document->land_certificate)
                                            <a href="{{ $document->land_certificate->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $document->land_certificate->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.documents.index') }}">
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