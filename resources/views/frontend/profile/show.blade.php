@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.my_profile') }}
                </div>

                <div class="card-body">
                    <div class="form-group">

                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $user->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                </tr>
                                @if(!empty($user->guardian_name))
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.guardian_name') }}
                                    </th>
                                    <td>
                                        {{ $user->guardian_name }}
                                    </td>
                                </tr>
                                @endif

                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                </tr>
                                @if(!empty($user->eiin))
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.eiin') }}
                                    </th>
                                    <td>
                                        {{ $user->eiin }}
                                    </td>
                                </tr>
                                @endif
                                @if(!empty($user->brid))
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.brid') }}
                                    </th>
                                    <td>
                                        {{ $user->brid }}
                                    </td>
                                </tr>
                                @endif

                                @if(!empty($user->user_contact))
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.user_contact') }}
                                    </th>
                                    <td>
                                        {{ $user->user_contact }}
                                    </td>
                                </tr>
                                @endif

                                <tr>
                                    <th>
                                        ঠিকানা
                                    </th>
                                    <td>
                                        {{ $user->upazila->upazila_name }}, {{ $user->district->district_name }}, {{ $user->division->division_name}}
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-primary pull-right" href="{{ route('frontend.profile.edit') }}">
                                <i class="fa fa-pencil"></i> {{ trans('global.edit') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection