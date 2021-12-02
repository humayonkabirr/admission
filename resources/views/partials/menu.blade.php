<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    <span> {{ trans('global.dashboard') }} </span>
                </a>
            </li>
            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa-fw fas fa-users">

                    </i>
                    <span>{{ trans('cruds.userManagement.title') }}</span>
                    <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    @can('permission_access')
                    <li class="{{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                        <a href="{{ route("admin.permissions.index") }}">
                            <i class="fa-fw fas fa-unlock-alt">

                            </i>
                            <span>{{ trans('cruds.permission.title') }}</span>

                        </a>
                    </li>
                    @endcan
                    @can('role_access')
                    <li class="{{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                        <a href="{{ route("admin.roles.index") }}">
                            <i class="fa-fw fas fa-briefcase">

                            </i>
                            <span>{{ trans('cruds.role.title') }}</span>

                        </a>
                    </li>
                    @endcan
                    @can('user_access')
                    <li class="{{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                        <a href="{{ route("admin.users.index") }}">
                            <i class="fa-fw fas fa-user">

                            </i>
                            <span>{{ trans('cruds.user.title') }}</span>

                        </a>
                    </li>
                    @endcan
                    @can('user_category_access')
                    <li class="{{ request()->is("admin/user-categories") || request()->is("admin/user-categories/*") ? "active" : "" }}">
                        <a href="{{ route("admin.user-categories.index") }}">
                            <i class="fa-fw fas fa-user-check">

                            </i>
                            <span>{{ trans('cruds.userCategory.title') }}</span>

                        </a>
                    </li>
                    @endcan
                    @can('audit_log_access')
                    <li class="{{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                        <a href="{{ route("admin.audit-logs.index") }}">
                            <i class="fa-fw fas fa-gavel">

                            </i>
                            <span>{{ trans('cruds.auditLog.title') }}</span>

                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('student_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa-fw fas fa-user-graduate">

                    </i>
                    <span>{{ trans('cruds.studentManagement.title') }}</span>
                    <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    @can('general_info_access')
                    <li class="{{ request()->is("admin/general-infos") || request()->is("admin/general-infos/*") ? "active" : "" }}">
                        <a href="{{ route("admin.general-infos.index") }}">
                            <i class="fa-fw far fa-address-card">

                            </i>
                            <span>{{ trans('cruds.generalInfo.title') }}</span>

                        </a>
                    </li>
                    @endcan
                    @can('family_info_access')
                    <li class="{{ request()->is("admin/family-infos") || request()->is("admin/family-infos/*") ? "active" : "" }}">
                        <a href="{{ route("admin.family-infos.index") }}">
                            <i class="fa-fw fas fa-users">

                            </i>
                            <span>{{ trans('cruds.familyInfo.title') }}</span>

                        </a>
                    </li>
                    @endcan
                    @can('education_institute_info_access')
                    <li class="{{ request()->is("admin/education-institute-infos") || request()->is("admin/education-institute-infos/*") ? "active" : "" }}">
                        <a href="{{ route("admin.education-institute-infos.index") }}">
                            <i class="fa-fw fas fa-chalkboard-teacher">

                            </i>
                            <span>{{ trans('cruds.educationInstituteInfo.title') }}</span>

                        </a>
                    </li>
                    @endcan
                    @can('account_info_access')
                    <li class="{{ request()->is("admin/account-infos") || request()->is("admin/account-infos/*") ? "active" : "" }}">
                        <a href="{{ route("admin.account-infos.index") }}">
                            <i class="fa-fw fas fa-university">

                            </i>
                            <span>{{ trans('cruds.accountInfo.title') }}</span>

                        </a>
                    </li>
                    @endcan
                    @can('document_access')
                    <li class="{{ request()->is("admin/documents") || request()->is("admin/documents/*") ? "active" : "" }}">
                        <a href="{{ route("admin.documents.index") }}">
                            <i class="fa-fw fas fa-file-alt">

                            </i>
                            <span>{{ trans('cruds.document.title') }}</span>

                        </a>
                    </li>
                    @endcan
                    @can('application_tracking_access')
                    <li class="{{ request()->is("admin/application-trackings") || request()->is("admin/application-trackings/*") ? "active" : "" }}">
                        <a href="{{ route("admin.application-trackings.index") }}">
                            <i class="fa-fw fas fa-cogs">

                            </i>
                            <span>{{ trans('cruds.applicationTracking.title') }}</span>

                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('recommendation_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa-fw fas fa-check">

                    </i>
                    <span>{{ trans('cruds.recommendation.title') }}</span>
                    <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    @can('selection_access')
                    <li class="{{ request()->is("admin/selections") || request()->is("admin/selections/*") ? "active" : "" }}">
                        <a href="{{ route("admin.selections.index") }}">
                            <i class="fa-fw fas fa-check">

                            </i>
                            <span>{{ trans('cruds.selection.title') }}</span>

                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('pmeat_approval_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa-fw fas fa-check-double">

                    </i>
                    <span>{{ trans('cruds.pmeatApproval.title') }}</span>
                    <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    @can('final_selection_criterion_access')
                    <li class="{{ request()->is("admin/primary-selection-criteria") || request()->is("admin/primary-selection-criteria/*") ? "active" : "" }}">
                        <a href="{{ route("admin.primary-selection-criteria.index") }}">
                            <i class="fa-fw fas fa-clipboard-check">

                            </i>
                            <span>{{ trans('cruds.primarySelectionCriterion.title') }}</span>

                        </a>
                    </li>
                    @endcan
                    @can('final_selection_access')
                    <li class="{{ request()->is("admin/primary-selections") || request()->is("admin/primary-selections/*") ? "active" : "" }}">
                        <a href="{{ route("admin.primary-selections.index") }}">
                            <i class="fa-fw fas fa-check-double">

                            </i>
                            <span>{{ trans('cruds.primarySelection.title') }}</span>

                        </a>
                    </li>
                    @endcan
                    @can('final_selection_criterion_access')
                    <li class="{{ request()->is("admin/final-selection-criteria") || request()->is("admin/final-selection-criteria/*") ? "active" : "" }}">
                        <a href="{{ route("admin.final-selection-criteria.index") }}">
                            <i class="fa-fw fas fa-clipboard-check">

                            </i>
                            <span>{{ trans('cruds.finalSelectionCriterion.title') }}</span>

                        </a>
                    </li>
                    @endcan
                    @can('final_selection_access')
                    <li class="{{ request()->is("admin/final-selections") || request()->is("admin/final-selections/*") ? "active" : "" }}">
                        <a href="{{ route("admin.final-selections.index") }}">
                            <i class="fa-fw fas fa-check-double">

                            </i>
                            <span>{{ trans('cruds.finalSelection.title') }}</span>

                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('circular_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa-fw far fa-newspaper">

                    </i>
                    <span>{{ trans('cruds.circularManagement.title') }}</span>
                    <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    @can('circular_access')
                    <li class="{{ request()->is("admin/circulars") || request()->is("admin/circulars/*") ? "active" : "" }}">
                        <a href="{{ route("admin.circulars.index") }}">
                            <i class="fa-fw far fa-newspaper">

                            </i>
                            <span>{{ trans('cruds.circular.title') }}</span>

                        </a>
                    </li>
                    @endcan
                    @can('policy_access')
                    <li class="{{ request()->is("admin/policies") || request()->is("admin/policies/*") ? "active" : "" }}">
                        <a href="{{ route("admin.policies.index") }}">
                            <i class="fa-fw fas fa-braille">

                            </i>
                            <span>{{ trans('cruds.policy.title') }}</span>

                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('fund_disbursement_mgt_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa-fw fas fa-hand-holding-usd">

                    </i>
                    <span>{{ trans('cruds.fundDisbursementMgt.title') }}</span>
                    <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    @can('disbursement_access')
                    <li class="{{ request()->is("admin/disbursements") || request()->is("admin/disbursements/*") ? "active" : "" }}">
                        <a href="{{ route("admin.disbursements.index") }}">
                            <i class="fa-fw fas fa-donate">

                            </i>
                            <span>{{ trans('cruds.disbursement.title') }}</span>

                        </a>
                    </li>
                    @endcan
                    @can('payroll_access')
                    <li class="{{ request()->is("admin/payrolls") || request()->is("admin/payrolls/*") ? "active" : "" }}">
                        <a href="{{ route("admin.payrolls.index") }}">
                            <i class="fa-fw fab fa-amazon-pay">

                            </i>
                            <span>{{ trans('cruds.payroll.title') }}</span>

                        </a>
                    </li>
                    @endcan
                    @can('payment_history_access')
                    <li class="{{ request()->is("admin/payment-histories") || request()->is("admin/payment-histories/*") ? "active" : "" }}">
                        <a href="{{ route("admin.payment-histories.index") }}">
                            <i class="fa-fw fas fa-donate">

                            </i>
                            <span>{{ trans('cruds.paymentHistory.title') }}</span>

                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('institute_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa-fw fas fa-school">

                    </i>
                    <span>{{ trans('cruds.instituteManagement.title') }}</span>
                    <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    @can('educational_institute_access')
                    <li class="{{ request()->is("admin/educational-institutes") || request()->is("admin/educational-institutes/*") ? "active" : "" }}">
                        <a href="{{ route("admin.educational-institutes.index") }}">
                            <i class="fa-fw fas fa-graduation-cap">

                            </i>
                            <span>{{ trans('cruds.educationalInstitute.title') }}</span>

                        </a>
                    </li>
                    @endcan
                    @can('institute_bank_account_access')
                    <li class="{{ request()->is("admin/institute-bank-accounts") || request()->is("admin/institute-bank-accounts/*") ? "active" : "" }}">
                        <a href="{{ route("admin.institute-bank-accounts.index") }}">
                            <i class="fa-fw fas fa-money-check-alt">

                            </i>
                            <span>{{ trans('cruds.instituteBankAccount.title') }}</span>

                        </a>
                    </li>
                    @endcan
                    @can('discipline_access')
                    <li class="{{ request()->is("admin/disciplines") || request()->is("admin/disciplines/*") ? "active" : "" }}">
                        <a href="{{ route("admin.disciplines.index") }}">
                            <i class="fa-fw fas fa-code-branch">

                            </i>
                            <span>{{ trans('cruds.discipline.title') }}</span>

                        </a>
                    </li>
                    @endcan
                    @can('institute_type_access')
                    <li class="{{ request()->is("admin/institute-types") || request()->is("admin/institute-types/*") ? "active" : "" }}">
                        <a href="{{ route("admin.institute-types.index") }}">
                            <i class="fa-fw fas fa-university">

                            </i>
                            <span>{{ trans('cruds.instituteType.title') }}</span>

                        </a>
                    </li>
                    @endcan
                    @can('academic_level_access')
                    <li class="{{ request()->is("admin/academic-levels") || request()->is("admin/academic-levels/*") ? "active" : "" }}">
                        <a href="{{ route("admin.academic-levels.index") }}">
                            <i class="fa-fw fas fa-shoe-prints">

                            </i>
                            <span>{{ trans('cruds.academicLevel.title') }}</span>

                        </a>
                    </li>
                    @endcan
                    @can('level_wise_class_access')
                    <li class="{{ request()->is("admin/level-wise-classes") || request()->is("admin/level-wise-classes/*") ? "active" : "" }}">
                        <a href="{{ route("admin.level-wise-classes.index") }}">
                            <i class="fa-fw fab fa-accusoft">

                            </i>
                            <span>{{ trans('cruds.levelWiseClass.title') }}</span>

                        </a>
                    </li>
                    @endcan
                    @can('academic_year_access')
                    <li class="{{ request()->is("admin/academic-years") || request()->is("admin/academic-years/*") ? "active" : "" }}">
                        <a href="{{ route("admin.academic-years.index") }}">
                            <i class="fa-fw fas fa-calendar-alt">

                            </i>
                            <span>{{ trans('cruds.academicYear.title') }}</span>

                        </a>
                    </li>
                    @endcan
                    @can('department_access')
                    <li class="{{ request()->is("admin/departments") || request()->is("admin/departments/*") ? "active" : "" }}">
                        <a href="{{ route("admin.departments.index") }}">
                            <i class="fa-fw fas fa-code-branch">

                            </i>
                            <span>{{ trans('cruds.department.title') }}</span>

                        </a>
                    </li>
                    @endcan
                    @can('exam_version_access')
                    <li class="{{ request()->is("admin/exam-versions") || request()->is("admin/exam-versions/*") ? "active" : "" }}">
                        <a href="{{ route("admin.exam-versions.index") }}">
                            <i class="fa-fw fas fa-grip-vertical">

                            </i>
                            <span>{{ trans('cruds.examVersion.title') }}</span>

                        </a>
                    </li>
                    @endcan
                    @can('institut_legal_status_access')
                    <li class="{{ request()->is("admin/institut-legal-statuses") || request()->is("admin/institut-legal-statuses/*") ? "active" : "" }}">
                        <a href="{{ route("admin.institut-legal-statuses.index") }}">
                            <i class="fa-fw fas fa-gavel">

                            </i>
                            <span>{{ trans('cruds.institutLegalStatus.title') }}</span>

                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('financial_institute_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa-fw fas fa-university">

                    </i>
                    <span>{{ trans('cruds.financialInstituteManagement.title') }}</span>
                    <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    @can('banking_service_provider_access')
                    <li class="{{ request()->is("admin/banking-service-providers") || request()->is("admin/banking-service-providers/*") ? "active" : "" }}">
                        <a href="{{ route("admin.banking-service-providers.index") }}">
                            <i class="fa-fw fas fa-cogs">

                            </i>
                            <span>{{ trans('cruds.bankingServiceProvider.title') }}</span>

                        </a>
                    </li>
                    @endcan
                    @can('bank_branch_access')
                    <li class="{{ request()->is("admin/bank-branches") || request()->is("admin/bank-branches/*") ? "active" : "" }}">
                        <a href="{{ route("admin.bank-branches.index") }}">
                            <i class="fa-fw fas fa-cogs">

                            </i>
                            <span>{{ trans('cruds.bankBranch.title') }}</span>

                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('setup_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa-fw fas fa-wrench">

                    </i>
                    <span>{{ trans('cruds.setup.title') }}</span>
                    <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    @can('ministry_division_access')
                    <li class="{{ request()->is("admin/ministry-divisions") || request()->is("admin/ministry-divisions/*") ? "active" : "" }}">
                        <a href="{{ route("admin.ministry-divisions.index") }}">
                            <i class="fa-fw far fa-building">

                            </i>
                            <span>{{ trans('cruds.ministryDivision.title') }}</span>

                        </a>
                    </li>
                    @endcan
                    @can('government_office_access')
                    <li class="{{ request()->is("admin/government-offices") || request()->is("admin/government-offices/*") ? "active" : "" }}">
                        <a href="{{ route("admin.government-offices.index") }}">
                            <i class="fa-fw fas fa-building">

                            </i>
                            <span>{{ trans('cruds.governmentOffice.title') }}</span>

                        </a>
                    </li>
                    @endcan
                    @can('division_access')
                    <li class="{{ request()->is("admin/divisions") || request()->is("admin/divisions/*") ? "active" : "" }}">
                        <a href="{{ route("admin.divisions.index") }}">
                            <i class="fa-fw fas fa-map-marked">

                            </i>
                            <span>{{ trans('cruds.division.title') }}</span>

                        </a>
                    </li>
                    @endcan
                    @can('district_access')
                    <li class="{{ request()->is("admin/districts") || request()->is("admin/districts/*") ? "active" : "" }}">
                        <a href="{{ route("admin.districts.index") }}">
                            <i class="fa-fw fas fa-map-marker">

                            </i>
                            <span>{{ trans('cruds.district.title') }}</span>

                        </a>
                    </li>
                    @endcan
                    @can('thana_access')
                    <li class="{{ request()->is("admin/thanas") || request()->is("admin/thanas/*") ? "active" : "" }}">
                        <a href="{{ route("admin.thanas.index") }}">
                            <i class="fa-fw fas fa-map-marker-alt">

                            </i>
                            <span>{{ trans('cruds.thana.title') }}</span>

                        </a>
                    </li>
                    @endcan
                    @can('upazila_access')
                    <li class="{{ request()->is("admin/upazilas") || request()->is("admin/upazilas/*") ? "active" : "" }}">
                        <a href="{{ route("admin.upazilas.index") }}">
                            <i class="fa-fw fas fa-building">

                            </i>
                            <span>{{ trans('cruds.upazila.title') }}</span>

                        </a>
                    </li>
                    @endcan
                    @can('union_access')
                    <li class="{{ request()->is("admin/unions") || request()->is("admin/unions/*") ? "active" : "" }}">
                        <a href="{{ route("admin.unions.index") }}">
                            <i class="fa-fw far fa-building">

                            </i>
                            <span>{{ trans('cruds.union.title') }}</span>

                        </a>
                    </li>
                    @endcan
                    @can('family_status_access')
                    <li class="{{ request()->is("admin/family-statuses") || request()->is("admin/family-statuses/*") ? "active" : "" }}">
                        <a href="{{ route("admin.family-statuses.index") }}">
                            <i class="fa-fw fas fa-users">

                            </i>
                            <span>{{ trans('cruds.familyStatus.title') }}</span>

                        </a>
                    </li>
                    @endcan
                    @can('occupation_access')
                    <li class="{{ request()->is("admin/occupations") || request()->is("admin/occupations/*") ? "active" : "" }}">
                        <a href="{{ route("admin.occupations.index") }}">
                            <i class="fa-fw fas fa-user-md">

                            </i>
                            <span>{{ trans('cruds.occupation.title') }}</span>

                        </a>
                    </li>
                    @endcan
                    @can('banking_type_access')
                    <li class="{{ request()->is("admin/banking-types") || request()->is("admin/banking-types/*") ? "active" : "" }}">
                        <a href="{{ route("admin.banking-types.index") }}">
                            <i class="fa-fw fas fa-university">

                            </i>
                            <span>{{ trans('cruds.bankingType.title') }}</span>

                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('alert_message_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa-fw fas fa-bell">

                    </i>
                    <span>{{ trans('cruds.alertMessage.title') }}</span>
                    <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    @can('user_alert_access')
                    <li class="{{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "active" : "" }}">
                        <a href="{{ route("admin.user-alerts.index") }}">
                            <i class="fa-fw fas fa-bell">

                            </i>
                            <span>{{ trans('cruds.userAlert.title') }}</span>

                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('employee_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa-fw fas fa-sliders-h">

                    </i>
                    <span>{{ trans('cruds.employeeManagement.title') }}</span>
                    <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    @can('education_access')
                    <li class="{{ request()->is("admin/education") || request()->is("admin/education/*") ? "active" : "" }}">
                        <a href="{{ route("admin.education.index") }}">
                            <i class="fa-fw fas fa-graduation-cap">

                            </i>
                            <span>{{ trans('cruds.education.title') }}</span>

                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            <li class="{{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "active" : "" }}">
                <a href="{{ route("admin.systemCalendar") }}">
                    <i class="fas fa-fw fa-calendar">

                    </i>
                    <span>{{ trans('global.systemCalendar') }}</span>
                </a>
            </li>
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
            <li class="{{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                <a href="{{ route('profile.password.edit') }}">
                    <i class="fa-fw fas fa-key">
                    </i>
                    <span> {{ trans('global.change_password') }} </span>
                </a>
            </li>
            @endcan
            @endif
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    <span>{{ trans('global.logout') }} </span>
                </a>
            </li>
        </ul>
    </section>
</aside>