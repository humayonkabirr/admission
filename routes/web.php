<?php

use App\Http\Controllers\Auth\RegisterController;


Route::view('/', 'welcome');
Auth::routes();

Route::view('/check', 'frontend.application_document');



Route::get('/reloadCaptcha', [RegisterController::class, 'reloadCaptcha'])->name('reloadCaptcha');

Route::get('findDivName', 'DependableValController@searchDivName')->name('findDivName');
Route::get('findDistName/{id}', 'DependableValController@searchDistName')->name('findDistName');
Route::get('findUpazilasName/{id}', 'DependableValController@searchUpazilaName')->name('findUpazilasName');
Route::get('findUnionsName/{id}', 'DependableValController@searchUnionName')->name('findUnionsName');
Route::get('findUnionsNameWithOutPor/{id}', 'DependableValController@findUnionsNameWithOutPor')->name('findUnionsNameWithOutPor');
Route::get('findCityCorporation/{id}', 'DependableValController@findCityCorporation')->name('findCityCorporation');
Route::get('findThanaName/{id}', 'DependableValController@findThanaName')->name('findThanaName');
Route::get('findThanaNameWithOutCityCor/{id}', 'DependableValController@findThanaNameWithOutCityCor')->name('findThanaNameWithOutCityCor');


Route::get('/verify', 'VerifyController@getVerify')->name('getverify');

Route::post('/verify', 'VerifyController@postVerify')->name('verify');
Route::post('/RequestForResendCode', 'VerifyController@RequestForResendCode')->name('RequestForResendCode');
Route::get('/resendVerify', 'VerifyController@resendVerify')->name('resendVerify');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::post('user-alerts/parse-csv-import', 'UserAlertsController@parseCsvImport')->name('user-alerts.parseCsvImport');
    Route::post('user-alerts/process-csv-import', 'UserAlertsController@processCsvImport')->name('user-alerts.processCsvImport');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController');

    // Division
    Route::delete('divisions/destroy', 'DivisionController@massDestroy')->name('divisions.massDestroy');
    Route::post('divisions/parse-csv-import', 'DivisionController@parseCsvImport')->name('divisions.parseCsvImport');
    Route::post('divisions/process-csv-import', 'DivisionController@processCsvImport')->name('divisions.processCsvImport');
    Route::resource('divisions', 'DivisionController');

    // District
    Route::get('get-districts/{id}', function($id){
      return json_encode(App\Models\District::where('division_name_id', $id)->get());
    });
    Route::delete('districts/destroy', 'DistrictController@massDestroy')->name('districts.massDestroy');
    Route::post('districts/parse-csv-import', 'DistrictController@parseCsvImport')->name('districts.parseCsvImport');
    Route::post('districts/process-csv-import', 'DistrictController@processCsvImport')->name('districts.processCsvImport');
    Route::resource('districts', 'DistrictController');

    // Thana
    Route::get('get-upazilas/{id}', function($id){
      return json_encode(App\Models\Upazila::where('district_id', $id)->get());
    });
    Route::delete('thanas/destroy', 'ThanaController@massDestroy')->name('thanas.massDestroy');
    Route::post('thanas/parse-csv-import', 'ThanaController@parseCsvImport')->name('thanas.parseCsvImport');
    Route::post('thanas/process-csv-import', 'ThanaController@processCsvImport')->name('thanas.processCsvImport');
    Route::resource('thanas', 'ThanaController');

    // Education
    Route::delete('education/destroy', 'EducationController@massDestroy')->name('education.massDestroy');
    Route::post('education/parse-csv-import', 'EducationController@parseCsvImport')->name('education.parseCsvImport');
    Route::post('education/process-csv-import', 'EducationController@processCsvImport')->name('education.processCsvImport');
    Route::resource('education', 'EducationController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Category
    Route::delete('user-categories/destroy', 'UserCategoryController@massDestroy')->name('user-categories.massDestroy');
    Route::post('user-categories/media', 'UserCategoryController@storeMedia')->name('user-categories.storeMedia');
    Route::post('user-categories/ckmedia', 'UserCategoryController@storeCKEditorImages')->name('user-categories.storeCKEditorImages');
    Route::post('user-categories/parse-csv-import', 'UserCategoryController@parseCsvImport')->name('user-categories.parseCsvImport');
    Route::post('user-categories/process-csv-import', 'UserCategoryController@processCsvImport')->name('user-categories.processCsvImport');
    Route::resource('user-categories', 'UserCategoryController');

    // Circular
    Route::delete('circulars/destroy', 'CircularController@massDestroy')->name('circulars.massDestroy');
    Route::post('circulars/media', 'CircularController@storeMedia')->name('circulars.storeMedia');
    Route::post('circulars/ckmedia', 'CircularController@storeCKEditorImages')->name('circulars.storeCKEditorImages');
    Route::resource('circulars', 'CircularController');

    // Route::get('admin/profile', 'UserController@getProfile');
    // Route::post('admin/profile', 'UserController@postProfileUpdate');

    // Academic Year
    Route::delete('academic-years/destroy', 'AcademicYearController@massDestroy')->name('academic-years.massDestroy');
    Route::resource('academic-years', 'AcademicYearController');

    // Academic Level
    Route::delete('academic-levels/destroy', 'AcademicLevelController@massDestroy')->name('academic-levels.massDestroy');
    Route::resource('academic-levels', 'AcademicLevelController');

    // Government Office
    Route::delete('government-offices/destroy', 'GovernmentOfficeController@massDestroy')->name('government-offices.massDestroy');
    Route::post('government-offices/parse-csv-import', 'GovernmentOfficeController@parseCsvImport')->name('government-offices.parseCsvImport');
    Route::post('government-offices/process-csv-import', 'GovernmentOfficeController@processCsvImport')->name('government-offices.processCsvImport');
    Route::resource('government-offices', 'GovernmentOfficeController');

    // Ministry Division
    Route::delete('ministry-divisions/destroy', 'MinistryDivisionController@massDestroy')->name('ministry-divisions.massDestroy');
    Route::post('ministry-divisions/parse-csv-import', 'MinistryDivisionController@parseCsvImport')->name('ministry-divisions.parseCsvImport');
    Route::post('ministry-divisions/process-csv-import', 'MinistryDivisionController@processCsvImport')->name('ministry-divisions.processCsvImport');
    Route::resource('ministry-divisions', 'MinistryDivisionController');

    // Level Wise Class
    Route::delete('level-wise-classes/destroy', 'LevelWiseClassController@massDestroy')->name('level-wise-classes.massDestroy');
    Route::resource('level-wise-classes', 'LevelWiseClassController');

    // Institute Type
    Route::delete('institute-types/destroy', 'InstituteTypeController@massDestroy')->name('institute-types.massDestroy');
    Route::resource('institute-types', 'InstituteTypeController');

    // Educational Institute
    Route::delete('educational-institutes/destroy', 'EducationalInstituteController@massDestroy')->name('educational-institutes.massDestroy');
    Route::post('educational-institutes/parse-csv-import', 'EducationalInstituteController@parseCsvImport')->name('educational-institutes.parseCsvImport');
    Route::post('educational-institutes/process-csv-import', 'EducationalInstituteController@processCsvImport')->name('educational-institutes.processCsvImport');
    Route::resource('educational-institutes', 'EducationalInstituteController');

    // Discipline
    Route::delete('disciplines/destroy', 'DisciplineController@massDestroy')->name('disciplines.massDestroy');
    Route::resource('disciplines', 'DisciplineController');

    // Department
    Route::delete('departments/destroy', 'DepartmentController@massDestroy')->name('departments.massDestroy');
    Route::post('departments/parse-csv-import', 'DepartmentController@parseCsvImport')->name('departments.parseCsvImport');
    Route::post('departments/process-csv-import', 'DepartmentController@processCsvImport')->name('departments.processCsvImport');
    Route::resource('departments', 'DepartmentController');

    // Exam Version
    Route::delete('exam-versions/destroy', 'ExamVersionController@massDestroy')->name('exam-versions.massDestroy');
    Route::resource('exam-versions', 'ExamVersionController');

    // Policy
    Route::delete('policies/destroy', 'PolicyController@massDestroy')->name('policies.massDestroy');
    Route::resource('policies', 'PolicyController');

    // Upazila
    Route::delete('upazilas/destroy', 'UpazilaController@massDestroy')->name('upazilas.massDestroy');
    Route::post('upazilas/parse-csv-import', 'UpazilaController@parseCsvImport')->name('upazilas.parseCsvImport');
    Route::post('upazilas/process-csv-import', 'UpazilaController@processCsvImport')->name('upazilas.processCsvImport');
    Route::resource('upazilas', 'UpazilaController');

    // Union
    Route::delete('unions/destroy', 'UnionController@massDestroy')->name('unions.massDestroy');
    Route::post('unions/parse-csv-import', 'UnionController@parseCsvImport')->name('unions.parseCsvImport');
    Route::post('unions/process-csv-import', 'UnionController@processCsvImport')->name('unions.processCsvImport');
    Route::resource('unions', 'UnionController');

    // General Info
    Route::delete('general-infos/destroy', 'GeneralInfoController@massDestroy')->name('general-infos.massDestroy');
    Route::post('general-infos/parse-csv-import', 'GeneralInfoController@parseCsvImport')->name('general-infos.parseCsvImport');
    Route::post('general-infos/process-csv-import', 'GeneralInfoController@processCsvImport')->name('general-infos.processCsvImport');
    Route::resource('general-infos', 'GeneralInfoController');

    // Family Status
    Route::delete('family-statuses/destroy', 'FamilyStatusController@massDestroy')->name('family-statuses.massDestroy');
    Route::post('family-statuses/parse-csv-import', 'FamilyStatusController@parseCsvImport')->name('family-statuses.parseCsvImport');
    Route::post('family-statuses/process-csv-import', 'FamilyStatusController@processCsvImport')->name('family-statuses.processCsvImport');
    Route::resource('family-statuses', 'FamilyStatusController');

    // Occupation
    Route::delete('occupations/destroy', 'OccupationController@massDestroy')->name('occupations.massDestroy');
    Route::post('occupations/parse-csv-import', 'OccupationController@parseCsvImport')->name('occupations.parseCsvImport');
    Route::post('occupations/process-csv-import', 'OccupationController@processCsvImport')->name('occupations.processCsvImport');
    Route::resource('occupations', 'OccupationController');

    // Documents
    Route::delete('documents/destroy', 'DocumentsController@massDestroy')->name('documents.massDestroy');
    Route::post('documents/media', 'DocumentsController@storeMedia')->name('documents.storeMedia');
    Route::post('documents/ckmedia', 'DocumentsController@storeCKEditorImages')->name('documents.storeCKEditorImages');
    Route::post('documents/parse-csv-import', 'DocumentsController@parseCsvImport')->name('documents.parseCsvImport');
    Route::post('documents/process-csv-import', 'DocumentsController@processCsvImport')->name('documents.processCsvImport');
    Route::resource('documents', 'DocumentsController');

    // Account Info
    Route::delete('account-infos/destroy', 'AccountInfoController@massDestroy')->name('account-infos.massDestroy');
    Route::post('account-infos/parse-csv-import', 'AccountInfoController@parseCsvImport')->name('account-infos.parseCsvImport');
    Route::post('account-infos/process-csv-import', 'AccountInfoController@processCsvImport')->name('account-infos.processCsvImport');
    Route::resource('account-infos', 'AccountInfoController');

    // Selection
    Route::delete('selections/destroy', 'SelectionController@massDestroy')->name('selections.massDestroy');
    Route::resource('selections', 'SelectionController');

    // Disbursement
    Route::delete('disbursements/destroy', 'DisbursementController@massDestroy')->name('disbursements.massDestroy');
    Route::resource('disbursements', 'DisbursementController');

    // Institut Legal Status
    Route::delete('institut-legal-statuses/destroy', 'InstitutLegalStatusController@massDestroy')->name('institut-legal-statuses.massDestroy');
    Route::post('institut-legal-statuses/parse-csv-import', 'InstitutLegalStatusController@parseCsvImport')->name('institut-legal-statuses.parseCsvImport');
    Route::post('institut-legal-statuses/process-csv-import', 'InstitutLegalStatusController@processCsvImport')->name('institut-legal-statuses.processCsvImport');
    Route::resource('institut-legal-statuses', 'InstitutLegalStatusController');

    // Institute Bank Account
    Route::delete('institute-bank-accounts/destroy', 'InstituteBankAccountController@massDestroy')->name('institute-bank-accounts.massDestroy');
    Route::resource('institute-bank-accounts', 'InstituteBankAccountController');

    // Banking Type
    Route::delete('banking-types/destroy', 'BankingTypeController@massDestroy')->name('banking-types.massDestroy');
    Route::post('banking-types/parse-csv-import', 'BankingTypeController@parseCsvImport')->name('banking-types.parseCsvImport');
    Route::post('banking-types/process-csv-import', 'BankingTypeController@processCsvImport')->name('banking-types.processCsvImport');
    Route::resource('banking-types', 'BankingTypeController');

    // Primary Selection
    Route::delete('primary-selections/destroy', 'PrimarySelectionController@massDestroy')->name('primary-selections.massDestroy');
    Route::get('primary-selections/app-number-id/{id}', 'PrimarySelectionController@app_number')->name('primary-selections.app_number');
    Route::post('primary-selections/check/{id}', 'PrimarySelectionController@get_result')->name('primary-selections.get_result');
    Route::resource('primary-selections', 'PrimarySelectionController');

    // Primary Selection Criteria
    Route::delete('primary-selection-criteria/destroy', 'PrimarySelectionCriteriaController@massDestroy')->name('primary-selection-criteria.massDestroy');
    Route::post('primary-selection-criteria/parse-csv-import', 'PrimarySelectionCriteriaController@parseCsvImport')->name('primary-selection-criteria.parseCsvImport');
    Route::post('primary-selection-criteria/process-csv-import', 'PrimarySelectionCriteriaController@processCsvImport')->name('primary-selection-criteria.processCsvImport');
    Route::resource('primary-selection-criteria', 'PrimarySelectionCriteriaController');

    // Final Selection
    Route::delete('final-selections/destroy', 'FinalSelectionController@massDestroy')->name('final-selections.massDestroy');
    Route::resource('final-selections', 'FinalSelectionController');

    // Final Selection Criteria
    Route::delete('final-selection-criteria/destroy', 'FinalSelectionCriteriaController@massDestroy')->name('final-selection-criteria.massDestroy');
    Route::post('final-selection-criteria/parse-csv-import', 'FinalSelectionCriteriaController@parseCsvImport')->name('final-selection-criteria.parseCsvImport');
    Route::post('final-selection-criteria/process-csv-import', 'FinalSelectionCriteriaController@processCsvImport')->name('final-selection-criteria.processCsvImport');
    Route::resource('final-selection-criteria', 'FinalSelectionCriteriaController');

    // Family Info
    Route::delete('family-infos/destroy', 'FamilyInfoController@massDestroy')->name('family-infos.massDestroy');
    Route::post('family-infos/parse-csv-import', 'FamilyInfoController@parseCsvImport')->name('family-infos.parseCsvImport');
    Route::post('family-infos/process-csv-import', 'FamilyInfoController@processCsvImport')->name('family-infos.processCsvImport');
    Route::resource('family-infos', 'FamilyInfoController');

    // Education Institute Info
    Route::delete('education-institute-infos/destroy', 'EducationInstituteInfoController@massDestroy')->name('education-institute-infos.massDestroy');
    Route::resource('education-institute-infos', 'EducationInstituteInfoController');

    // Payroll
    Route::delete('payrolls/destroy', 'PayrollController@massDestroy')->name('payrolls.massDestroy');
    Route::post('payrolls/parse-csv-import', 'PayrollController@parseCsvImport')->name('payrolls.parseCsvImport');
    Route::post('payrolls/process-csv-import', 'PayrollController@processCsvImport')->name('payrolls.processCsvImport');
    Route::resource('payrolls', 'PayrollController');

    // Payment History
    Route::delete('payment-histories/destroy', 'PaymentHistoryController@massDestroy')->name('payment-histories.massDestroy');
    Route::post('payment-histories/parse-csv-import', 'PaymentHistoryController@parseCsvImport')->name('payment-histories.parseCsvImport');
    Route::post('payment-histories/process-csv-import', 'PaymentHistoryController@processCsvImport')->name('payment-histories.processCsvImport');
    Route::resource('payment-histories', 'PaymentHistoryController');

    // Banking Service Provider
    Route::delete('banking-service-providers/destroy', 'BankingServiceProviderController@massDestroy')->name('banking-service-providers.massDestroy');
    Route::post('banking-service-providers/parse-csv-import', 'BankingServiceProviderController@parseCsvImport')->name('banking-service-providers.parseCsvImport');
    Route::post('banking-service-providers/process-csv-import', 'BankingServiceProviderController@processCsvImport')->name('banking-service-providers.processCsvImport');
    Route::resource('banking-service-providers', 'BankingServiceProviderController');

    // Bank Branch
    Route::delete('bank-branches/destroy', 'BankBranchController@massDestroy')->name('bank-branches.massDestroy');
    Route::post('bank-branches/media', 'BankBranchController@storeMedia')->name('bank-branches.storeMedia');
    Route::post('bank-branches/ckmedia', 'BankBranchController@storeCKEditorImages')->name('bank-branches.storeCKEditorImages');
    Route::post('bank-branches/parse-csv-import', 'BankBranchController@parseCsvImport')->name('bank-branches.parseCsvImport');
    Route::post('bank-branches/process-csv-import', 'BankBranchController@processCsvImport')->name('bank-branches.processCsvImport');
    Route::resource('bank-branches', 'BankBranchController');

    // Application Tracking
    Route::delete('application-trackings/destroy', 'ApplicationTrackingController@massDestroy')->name('application-trackings.massDestroy');
    Route::post('application-trackings/parse-csv-import', 'ApplicationTrackingController@parseCsvImport')->name('application-trackings.parseCsvImport');
    Route::post('application-trackings/process-csv-import', 'ApplicationTrackingController@processCsvImport')->name('application-trackings.processCsvImport');
    Route::resource('application-trackings', 'ApplicationTrackingController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
});


Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');



        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});


Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Application   :: FOR ONLY APPLICATION SUBMISSION
    Route::get('application/apply/{id}', 'ApplicationController@apply')->name('application.apply');
    Route::get('application/apply', 'ApplicationController@apply')->name('application.applynow');
    Route::resource('application', 'ApplicationController');
    Route::post('application/document', 'ApplicationController@document');
    Route::post('application/edit', 'ApplicationController@edit_application')->name('application.edit');
    Route::post('application/update', 'ApplicationController@update_application')->name('application.update');

    // Route::get('getState', 'ApplicationController@getState')->name('getState');

    //Route::get('getClass', 'ApplicationController@getClass')->name('getClass');
    //Route::get('getlastclass', 'ApplicationController@getlastclass')->name('getlastclass');




    //PDF Download
    Route::get('download_pdf/{id}', 'ApplicationController@pdf');

    Route::get('submit_document/{id}', 'ApplicationController@submit_document');



    // Dependable Location DIV-DIST-UPAZila Instittue Bank-Branch
    //Route::resource('dependableLocation', 'DependableLocationController');
    // Route::get('/findDistrictName', [DependableLocationController::class, 'findDistrictName'])->name('findDistrictName');
    Route::get('findDistrictName/{id}', 'DependableValueController@findDistrictName')->name('findDistrictName');
    Route::get('findUpazilaName/{id}', 'DependableValueController@findUpazilaName')->name('findUpazilaName');
    Route::get('findUnionName/{id}', 'DependableValueController@findUnionName')->name('findUnionName');
    Route::get('findLevelWiseClass/{id}', 'DependableValueController@findLevelWiseClass')->name('findLevelWiseClass');
    Route::get('getlastclass/{id}', 'DependableValueController@findLastClass')->name('getlastclass');

    Route::get('getBankName/{id}', 'DependableValueController@findBankName')->name('getBankName');
    Route::post('findBankBranchName', 'DependableValueController@findBankBranchName')->name('findBankBranchName');
    Route::post('findBankRoutingNumber', 'DependableValueController@findBankRoutingNumber')->name('findBankRoutingNumber');

    Route::post('findUpazilaWiseInstitute', 'DependableValueController@findUpazilaWiseInstitute')->name('findUpazilaWiseInstitute');

    Route::post('findCircularName', 'DependableValueController@findCircularName')->name('findCircularName');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::resource('user-alerts', 'UserAlertsController');

    // Division
    Route::delete('divisions/destroy', 'DivisionController@massDestroy')->name('divisions.massDestroy');
    Route::resource('divisions', 'DivisionController');

    // District
    Route::delete('districts/destroy', 'DistrictController@massDestroy')->name('districts.massDestroy');
    Route::resource('districts', 'DistrictController');

    // Thana
    Route::delete('thanas/destroy', 'ThanaController@massDestroy')->name('thanas.massDestroy');
    Route::resource('thanas', 'ThanaController');

    // Education
    Route::delete('education/destroy', 'EducationController@massDestroy')->name('education.massDestroy');
    Route::resource('education', 'EducationController');

    // User Category
    Route::delete('user-categories/destroy', 'UserCategoryController@massDestroy')->name('user-categories.massDestroy');
    Route::post('user-categories/media', 'UserCategoryController@storeMedia')->name('user-categories.storeMedia');
    Route::post('user-categories/ckmedia', 'UserCategoryController@storeCKEditorImages')->name('user-categories.storeCKEditorImages');
    Route::resource('user-categories', 'UserCategoryController');

    // Circular
    Route::delete('circulars/destroy', 'CircularController@massDestroy')->name('circulars.massDestroy');
    Route::post('circulars/media', 'CircularController@storeMedia')->name('circulars.storeMedia');
    Route::post('circulars/ckmedia', 'CircularController@storeCKEditorImages')->name('circulars.storeCKEditorImages');
    Route::resource('circulars', 'CircularController');

    // Academic Year
    Route::delete('academic-years/destroy', 'AcademicYearController@massDestroy')->name('academic-years.massDestroy');
    Route::resource('academic-years', 'AcademicYearController');

    // Academic Level
    Route::delete('academic-levels/destroy', 'AcademicLevelController@massDestroy')->name('academic-levels.massDestroy');
    Route::resource('academic-levels', 'AcademicLevelController');

    // Government Office
    Route::delete('government-offices/destroy', 'GovernmentOfficeController@massDestroy')->name('government-offices.massDestroy');
    Route::resource('government-offices', 'GovernmentOfficeController');

    // Ministry Division
    Route::delete('ministry-divisions/destroy', 'MinistryDivisionController@massDestroy')->name('ministry-divisions.massDestroy');
    Route::resource('ministry-divisions', 'MinistryDivisionController');

    // Level Wise Class
    Route::delete('level-wise-classes/destroy', 'LevelWiseClassController@massDestroy')->name('level-wise-classes.massDestroy');
    Route::resource('level-wise-classes', 'LevelWiseClassController');

    // Institute Type
    Route::delete('institute-types/destroy', 'InstituteTypeController@massDestroy')->name('institute-types.massDestroy');
    Route::resource('institute-types', 'InstituteTypeController');

    // Educational Institute
    Route::delete('educational-institutes/destroy', 'EducationalInstituteController@massDestroy')->name('educational-institutes.massDestroy');
    Route::resource('educational-institutes', 'EducationalInstituteController');

    // Discipline
    Route::delete('disciplines/destroy', 'DisciplineController@massDestroy')->name('disciplines.massDestroy');
    Route::resource('disciplines', 'DisciplineController');

    // Department
    Route::delete('departments/destroy', 'DepartmentController@massDestroy')->name('departments.massDestroy');
    Route::resource('departments', 'DepartmentController');

    // Exam Version
    Route::delete('exam-versions/destroy', 'ExamVersionController@massDestroy')->name('exam-versions.massDestroy');
    Route::resource('exam-versions', 'ExamVersionController');

    // Policy
    Route::delete('policies/destroy', 'PolicyController@massDestroy')->name('policies.massDestroy');
    Route::resource('policies', 'PolicyController');

    // Upazila
    Route::delete('upazilas/destroy', 'UpazilaController@massDestroy')->name('upazilas.massDestroy');
    Route::resource('upazilas', 'UpazilaController');

    // Union
    Route::delete('unions/destroy', 'UnionController@massDestroy')->name('unions.massDestroy');
    Route::resource('unions', 'UnionController');

    // General Info
    Route::delete('general-infos/destroy', 'GeneralInfoController@massDestroy')->name('general-infos.massDestroy');
    Route::resource('general-infos', 'GeneralInfoController');

    // Family Status
    Route::delete('family-statuses/destroy', 'FamilyStatusController@massDestroy')->name('family-statuses.massDestroy');
    Route::resource('family-statuses', 'FamilyStatusController');

    // Occupation
    Route::delete('occupations/destroy', 'OccupationController@massDestroy')->name('occupations.massDestroy');
    Route::resource('occupations', 'OccupationController');

    // Documents
    Route::delete('documents/destroy', 'DocumentsController@massDestroy')->name('documents.massDestroy');
    Route::post('documents/media', 'DocumentsController@storeMedia')->name('documents.storeMedia');
    Route::post('documents/ckmedia', 'DocumentsController@storeCKEditorImages')->name('documents.storeCKEditorImages');
    Route::resource('documents', 'DocumentsController');

    // Account Info
    Route::delete('account-infos/destroy', 'AccountInfoController@massDestroy')->name('account-infos.massDestroy');
    Route::resource('account-infos', 'AccountInfoController');

    // Selection
    Route::delete('selections/destroy', 'SelectionController@massDestroy')->name('selections.massDestroy');
    Route::resource('selections', 'SelectionController');

    // Disbursement
    Route::delete('disbursements/destroy', 'DisbursementController@massDestroy')->name('disbursements.massDestroy');
    Route::resource('disbursements', 'DisbursementController');

    // Institut Legal Status
    Route::delete('institut-legal-statuses/destroy', 'InstitutLegalStatusController@massDestroy')->name('institut-legal-statuses.massDestroy');
    Route::resource('institut-legal-statuses', 'InstitutLegalStatusController');

    // Institute Bank Account
    Route::delete('institute-bank-accounts/destroy', 'InstituteBankAccountController@massDestroy')->name('institute-bank-accounts.massDestroy');
    Route::resource('institute-bank-accounts', 'InstituteBankAccountController');

    // Banking Type
    Route::delete('banking-types/destroy', 'BankingTypeController@massDestroy')->name('banking-types.massDestroy');
    Route::resource('banking-types', 'BankingTypeController');

    // Final Selection
    Route::delete('final-selections/destroy', 'FinalSelectionController@massDestroy')->name('final-selections.massDestroy');
    Route::resource('final-selections', 'FinalSelectionController');

    // Final Selection Criteria
    Route::delete('final-selection-criteria/destroy', 'FinalSelectionCriteriaController@massDestroy')->name('final-selection-criteria.massDestroy');
    Route::resource('final-selection-criteria', 'FinalSelectionCriteriaController');

    // Family Info
    Route::delete('family-infos/destroy', 'FamilyInfoController@massDestroy')->name('family-infos.massDestroy');
    Route::resource('family-infos', 'FamilyInfoController');

    // Education Institute Info
    Route::delete('education-institute-infos/destroy', 'EducationInstituteInfoController@massDestroy')->name('education-institute-infos.massDestroy');
    Route::resource('education-institute-infos', 'EducationInstituteInfoController');

    // Payroll
    Route::delete('payrolls/destroy', 'PayrollController@massDestroy')->name('payrolls.massDestroy');
    Route::resource('payrolls', 'PayrollController');

    // Payment History
    Route::delete('payment-histories/destroy', 'PaymentHistoryController@massDestroy')->name('payment-histories.massDestroy');
    Route::resource('payment-histories', 'PaymentHistoryController');

    // Banking Service Provider
    Route::delete('banking-service-providers/destroy', 'BankingServiceProviderController@massDestroy')->name('banking-service-providers.massDestroy');
    Route::resource('banking-service-providers', 'BankingServiceProviderController');

    // Bank Branch
    Route::delete('bank-branches/destroy', 'BankBranchController@massDestroy')->name('bank-branches.massDestroy');
    Route::post('bank-branches/media', 'BankBranchController@storeMedia')->name('bank-branches.storeMedia');
    Route::post('bank-branches/ckmedia', 'BankBranchController@storeCKEditorImages')->name('bank-branches.storeCKEditorImages');
    Route::resource('bank-branches', 'BankBranchController');

    // Application Tracking
    Route::delete('application-trackings/destroy', 'ApplicationTrackingController@massDestroy')->name('application-trackings.massDestroy');
    Route::resource('application-trackings', 'ApplicationTrackingController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::get('frontend/profile/edit', 'ProfileController@edit')->name('profile.edit');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});
