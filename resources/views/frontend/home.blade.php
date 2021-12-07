@extends('layouts.frontend')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ __('Dashboard') }}
                </div>



                <!-- <table id="app_list" class="table table-striped"> -->
                <table id="app_list" class="display responsive nowrap dataTable no-footer dtr-inline collapsed" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
                    <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="app_list" rowspan="1" colspan="1" aria-label="First name: activate to sort column ascending" style="width: 142px;">আবেদন নম্বর</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="app_list" rowspan="1" colspan="1" aria-label="Last name: activate to sort column descending" style="width: 139px;" aria-sort="ascending">বিজ্ঞপ্তি নম্বর</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="app_list" rowspan="1" colspan="1" aria-label="Last name: activate to sort column descending" style="width: 139px;" aria-sort="ascending">প্রেরণের সময় ও তারিখ</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="app_list" rowspan="1" colspan="1" aria-label="Last name: activate to sort column descending" style="width: 139px;" aria-sort="ascending">আবেদনের বর্তমান অবস্থা</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="app_list" rowspan="1" colspan="1" aria-label="Last name: activate to sort column descending" style="width: 139px;" aria-sort="ascending">করণীয় কাজ</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="app_list" rowspan="1" colspan="1" aria-label="Last name: activate to sort column descending" style="width: 139px;" aria-sort="ascending">ডাউনলোড</th>

                        </tr>
                    </thead>

                    <!-- <thead>
                        <tr>
                            <th scope="col">Application_id</th>
                            <th scope="col"></th>
                            <th scope="col">Time & Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                            <th scope="col">Download</th>

                        </tr>
                    </thead> -->
                    <tbody>
                        @foreach($apply_list as $application)
                        <tr>
                            <th>{{ $application->application_no }}</th>
                            <td>{{ !empty($application->circular->cirucular_name) ? $application->circular->cirucular_name : '' }}</td>
                            <td>{{ $application->created_at->format('h:s A | d F,Y') }}</td>
                            <td>
                                @if($application->pemeat_selected == 1)
                                Selected by PMEAT
                                @elseif($application->pemeat_accepted == 1)
                                Accepted by PMEAT
                                @elseif($application->ih_forwarded == 1)
                                Frowarded by Institute Head
                                @elseif($application->ih_approve == 1)
                                Approved by Institute Head
                                @elseif($application->ih_seen == 1)
                                Seen by Institute Head
                                @elseif($application->is_submitted == 1)
                                Submitted
                                @elseif($application->is_completed == 1)
                                Completed
                                @else
                                Pending
                                @endif

                            </td>
                            <td>
                                @if(!empty($application->app_id->id) && $application->is_submitted != 1)
                                <a type="button" href="{{ url('submit_document/'.$application->application_no) }}" class="badge badge-success">
                                    Submit Document
                                </a>
                                @endif
                            </td>
                            <td>
                                @if(!empty($application->app_id->id) && $application->is_submitted == 1)
                                <a type="button" href="{{ url('download_pdf/'.$application->app_id->id) }}" class="btn btn-success">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>



                <div class="card-body">
                    @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif



                    @if(!empty($circular))


                    <img src="{{ asset('circular').'/'.$circular->circular_image}}" width="100%" height="100%" />

                    <a class="btn btn-success pull-right" href="{{route('frontend.application.apply',$circular->id)}}">Apply </a>

                    @else
                    {{ trans('global.zero_circluar') }}
                    {{ trans('global.zero_circluar_notice') }}
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endsection