<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    <style>
        /* Show it is fixed to the top */
        body {
            min-height: 75rem;
            padding-top: 4.5rem;
            background-image: url('{{ asset("assets/gov-bg.png") }}');
        }

        .navbar-brand .nav-link {
            font-size: 25px;
        }

        .nav-link:active {
            background-color: white !important;
        }



        .nav-link:hover {
            background-color: white;
        }

        .logo-lg{
            margin-right: 30px;
        }


        /* End of loading Animation css */
    </style>
    @yield('styles')
</head>

<body>


    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light fixed-top bg-gray">
            <a href="{{ url('/') }}" class="logo">
                <span class="logo-lg">
                    <img id="companyNameLogo" style="background-color: while !important;" src="{{asset('public/images/aams-logo-big.png')}}" alt="PMEAT LOGO">
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    @guest
                    @else
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('frontend.home') }}">
                            {{ trans('global.dashboard') }}
                            <span class="sr-only">(current)</span></a>
                    </li>
                    @endguest

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('frontend.application.applynow')}}">
                            আবেদন করুন
                        </a>
                    </li>

                    @can('general_info_access')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('frontend.general-infos.index') }}">
                            {{ trans('cruds.generalInfo.title') }}
                        </a>
                    </li>
                    @endcan


                    @can('student_management_access')
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            শিক্ষার্থী ব্যবস্থাপনা <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @can('student_management_access')
                            <a class="dropdown-item disabled" href="#">
                                {{ trans('cruds.studentManagement.title') }}
                            </a>
                            @endcan
                            @can('general_info_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.general-infos.index') }}">
                                {{ trans('cruds.generalInfo.title') }}
                            </a>
                            @endcan
                            @can('family_info_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.family-infos.index') }}">
                                {{ trans('cruds.familyInfo.title') }}
                            </a>
                            @endcan
                            @can('education_institute_info_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.education-institute-infos.index') }}">
                                {{ trans('cruds.educationInstituteInfo.title') }}
                            </a>
                            @endcan
                            @can('account_info_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.account-infos.index') }}">
                                {{ trans('cruds.accountInfo.title') }}
                            </a>
                            @endcan
                            @can('document_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.documents.index') }}">
                                {{ trans('cruds.document.title') }}
                            </a>
                            @endcan
                            @can('application_tracking_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.application-trackings.index') }}">
                                {{ trans('cruds.applicationTracking.title') }}
                            </a>
                            @endcan
                            @can('recommendation_access')
                            <a class="dropdown-item disabled" href="#">
                                {{ trans('cruds.recommendation.title') }}
                            </a>
                            @endcan
                            @can('selection_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.selections.index') }}">
                                {{ trans('cruds.selection.title') }}
                            </a>
                            @endcan
                            @can('pmeat_approval_access')
                            <a class="dropdown-item disabled" href="#">
                                {{ trans('cruds.pmeatApproval.title') }}
                            </a>
                            @endcan
                            @can('final_selection_criterion_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.final-selection-criteria.index') }}">
                                {{ trans('cruds.finalSelectionCriterion.title') }}
                            </a>
                            @endcan
                            @can('final_selection_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.final-selections.index') }}">
                                {{ trans('cruds.finalSelection.title') }}
                            </a>
                            @endcan

                        </div>
                    </li>
                    @endcan

                    @can('institute_management_access')
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            প্রতিষ্ঠান ব্যবস্থাপনা <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @can('institute_management_access')
                            <a class="dropdown-item disabled" href="#">
                                {{ trans('cruds.instituteManagement.title') }}
                            </a>
                            @endcan
                            @can('educational_institute_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.educational-institutes.index') }}">
                                {{ trans('cruds.educationalInstitute.title') }}
                            </a>
                            @endcan
                            @can('institute_bank_account_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.institute-bank-accounts.index') }}">
                                {{ trans('cruds.instituteBankAccount.title') }}
                            </a>
                            @endcan
                            @can('discipline_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.disciplines.index') }}">
                                {{ trans('cruds.discipline.title') }}
                            </a>
                            @endcan
                            @can('institute_type_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.institute-types.index') }}">
                                {{ trans('cruds.instituteType.title') }}
                            </a>
                            @endcan
                            @can('academic_level_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.academic-levels.index') }}">
                                {{ trans('cruds.academicLevel.title') }}
                            </a>
                            @endcan
                            @can('level_wise_class_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.level-wise-classes.index') }}">
                                {{ trans('cruds.levelWiseClass.title') }}
                            </a>
                            @endcan
                            @can('academic_year_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.academic-years.index') }}">
                                {{ trans('cruds.academicYear.title') }}
                            </a>
                            @endcan
                            @can('department_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.departments.index') }}">
                                {{ trans('cruds.department.title') }}
                            </a>
                            @endcan
                            @can('exam_version_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.exam-versions.index') }}">
                                {{ trans('cruds.examVersion.title') }}
                            </a>
                            @endcan
                            @can('institut_legal_status_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.institut-legal-statuses.index') }}">
                                {{ trans('cruds.institutLegalStatus.title') }}
                            </a>
                            @endcan
                            @can('financial_institute_management_access')
                            <a class="dropdown-item disabled" href="#">
                                {{ trans('cruds.financialInstituteManagement.title') }}
                            </a>
                            @endcan
                            @can('banking_service_provider_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.banking-service-providers.index') }}">
                                {{ trans('cruds.bankingServiceProvider.title') }}
                            </a>
                            @endcan
                            @can('bank_branch_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.bank-branches.index') }}">
                                {{ trans('cruds.bankBranch.title') }}
                            </a>
                            @endcan

                        </div>
                    </li>
                    @endcan

                    @can('fund_disbursement_mgt_access')
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ trans('cruds.fundDisbursementMgt.title') }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @can('fund_disbursement_mgt_access')
                            <a class="dropdown-item disabled" href="#">
                                {{ trans('cruds.fundDisbursementMgt.title') }}
                            </a>
                            @endcan
                            @can('disbursement_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.disbursements.index') }}">
                                {{ trans('cruds.disbursement.title') }}
                            </a>
                            @endcan
                            @can('payroll_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.payrolls.index') }}">
                                {{ trans('cruds.payroll.title') }}
                            </a>
                            @endcan
                            @can('payment_history_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.payment-histories.index') }}">
                                {{ trans('cruds.paymentHistory.title') }}
                            </a>
                            @endcan

                        </div>
                    </li>

                    @endcan
                    @can('setup_access')
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ trans('cruds.setup.title') }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <!-- setup  -->
                            @can('setup_access')
                            <a class="dropdown-item disabled" href="#">
                                {{ trans('cruds.setup.title') }}
                            </a>
                            @endcan
                            @can('ministry_division_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.ministry-divisions.index') }}">
                                {{ trans('cruds.ministryDivision.title') }}
                            </a>
                            @endcan
                            @can('government_office_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.government-offices.index') }}">
                                {{ trans('cruds.governmentOffice.title') }}
                            </a>
                            @endcan
                            @can('division_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.divisions.index') }}">
                                {{ trans('cruds.division.title') }}
                            </a>
                            @endcan
                            @can('district_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.districts.index') }}">
                                {{ trans('cruds.district.title') }}
                            </a>
                            @endcan
                            @can('thana_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.thanas.index') }}">
                                {{ trans('cruds.thana.title') }}
                            </a>
                            @endcan
                            @can('upazila_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.upazilas.index') }}">
                                {{ trans('cruds.upazila.title') }}
                            </a>
                            @endcan
                            @can('union_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.unions.index') }}">
                                {{ trans('cruds.union.title') }}
                            </a>
                            @endcan
                            @can('family_status_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.family-statuses.index') }}">
                                {{ trans('cruds.familyStatus.title') }}
                            </a>
                            @endcan
                            @can('occupation_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.occupations.index') }}">
                                {{ trans('cruds.occupation.title') }}
                            </a>
                            @endcan
                            @can('banking_type_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.banking-types.index') }}">
                                {{ trans('cruds.bankingType.title') }}
                            </a>
                            @endcan
                            @can('alert_message_access')
                            <a class="dropdown-item disabled" href="#">
                                {{ trans('cruds.alertMessage.title') }}
                            </a>
                            @endcan
                            @can('user_alert_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.user-alerts.index') }}">
                                {{ trans('cruds.userAlert.title') }}
                            </a>
                            @endcan
                        </div>
                    </li>
                    @endcan

                    @can('circular_management_access')
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ trans('cruds.circularManagement.title') }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @can('circular_management_access')
                            <a class="dropdown-item disabled" href="#">
                                {{ trans('cruds.circularManagement.title') }}
                            </a>
                            @endcan
                            @can('circular_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.circulars.index') }}">
                                {{ trans('cruds.circular.title') }}
                            </a>
                            @endcan
                            @can('policy_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.policies.index') }}">
                                {{ trans('cruds.policy.title') }}
                            </a>
                            @endcan
                        </div>
                    </li>
                    @endcan

                    @can('user_management_access')
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ trans('cruds.userManagement.title') }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @can('user_management_access')
                            <a class="dropdown-item disabled" href="#">
                                {{ trans('cruds.userManagement.title') }}
                            </a>
                            @endcan
                            @can('permission_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.permissions.index') }}">
                                {{ trans('cruds.permission.title') }}
                            </a>
                            @endcan
                            @can('role_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.roles.index') }}">
                                {{ trans('cruds.role.title') }}
                            </a>
                            @endcan
                            @can('user_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.users.index') }}">
                                {{ trans('cruds.user.title') }}
                            </a>
                            @endcan
                            @can('user_category_access')
                            <a class="dropdown-item ml-3" href="{{ route('frontend.user-categories.index') }}">
                                {{ trans('cruds.userCategory.title') }}
                            </a>
                            @endcan
                        </div>
                    </li>
                    @endcan


                </ul>


                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if(Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{ route('frontend.profile.index') }}">{{ __('My profile') }}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>

            </div>
        </nav>


        <main class="py-4">
            @if(session('message'))
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                    </div>
                </div>
            </div>
            @endif
            @if($errors->count() > 0)
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <ul class="list-unstyled mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @yield('content')

        </main>

    </div>
    <!-- Footer Area Start -->
    <footer id="footer">


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>

@yield('scripts')

</html>