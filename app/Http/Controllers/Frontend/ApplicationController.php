<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\BanglaToEnglishConverterTrait;
use App\Models\AcademicLevel;
use App\Models\ApplicationTracking;
use App\Models\BankingServiceProvider;
use App\Models\BankingType;
use App\Models\District;
use App\Models\Division;
use App\Models\FamilyStatus;
use App\Models\FinancialInstitute;
use App\Models\GeneralInfo;
use App\Models\LevelWiseClass;
use App\Models\Occupation;
use App\Models\Circular;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\http\Requests\StoreApplicationInfoRequest;
use App\Models\AccountInfo;
use App\Models\EducationInstituteInfo;
use App\Models\FamilyInfo;
use App\Models\User;
use App\Models\Document;
use App\Models\Bank_Account_Type;
use App\Models\AccountOwner;
use App\Models\McuType;
use Exception;
use PDF;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ApplicationController extends Controller
{
    use BanglaToEnglishConverterTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApplicationInfoRequest $request)
    {
        
        $user_id_no = auth()->user()->id;

        $ay = $request->academic_year;
        $cirID = str_pad($request->circular_id, 2, "0", STR_PAD_LEFT);
        $grantsType = $request->grants_name_id;
        $divID = $request->division_id;
        $distID = str_pad($request->districts_id, 2, "0", STR_PAD_LEFT);
        $upaID = str_pad($request->upazila_id, 3, "0", STR_PAD_LEFT);
        $eiinNO = str_pad($request->eiin_id, 6, "0", STR_PAD_LEFT);
        $todayRand =  date("ymdHis") . mt_rand(1, 100);


        $today = date("Y-m-d");
        $dob = $request->dob;

        $date1 = date_create($today);
        $date2 = date_create($dob);


        $interval = date_diff($date1, $date2);

        $age = $interval->format("%Y");


        // 1= Admissin 2= Medical
        $appNo = $ay . $cirID . $grantsType . $divID . $distID . $upaID . $eiinNO . $todayRand;
        //20 01 1 02 01 001 105691 210806 13 08 33 35

        //return $appNo;

        $generalInfo =  new GeneralInfo([
            'user_id_no' => $user_id_no,
            'application_no' => $appNo,
            'grants_name' => 'a',
            'brid' => $request->brid,
            'nid' => $request->nid,
            'name' => $request->stu_name,
            'father_name' => $request->father_name,
            'father_nid' => $request->father_nid,
            'mother_name' => $request->mother_name,
            'mother_nid' => $request->mother_nid,
            'dob' => $date2,
            'age' => $age,
            'village' => $request->village_id,
            'circular_id' => $request->circular_id,
            'division_id' => $request->division_id,
            'district_id' => $request->districts_id,
            'upazila_id' => $request->upazila_id,
            'union_id' => $request->union_id,


        ]);

        $familyInfo = new FamilyInfo([
            'user_id_no' => $user_id_no,
            'guardian_education' =>  $request->guardian_education,
            'guardian_land' =>  $request->guardian_land,
            'guardian_annual_income' =>  $request->guardian_annual_income,
            'family_member' =>  $request->family_member,
            'guardian_occupation_id' =>  $request->guardian_occupation_id,
            'familystatus_id' => $request->familystatus_id,

        ]);



        // return $request->class_name_id.$request->last_study_class_id;

        $educationInstituteInfo = new EducationInstituteInfo([
            'user_id_no' => $user_id_no,
            'institute_division' => $request->institute_division,
            'institute_district' => $request->institute_district,
            'institute_upazila' => $request->institute_upazila,
            'education_level_id' => $request->education_level_id,
            'class_name_id' => $request->class_name_id,
            'institute_name_id' => $request->institute_name_id,
            'eiin_id  ' => $request->eiin_id,
            'last_study_class_id' => $request->last_study_class_id,
            'last_gpa' => $request->last_gpa,
            'last_gpa_total' => $request->last_gpa_total
        ]);



        $accountInfo = new AccountInfo([
            'user' =>  $user_id_no,
            'student_name' =>  $request->stu_name,
            'routing_no' => $request->routing_no_id,
            'bank_account_owner' => $request->bank_account_owner,
            'acc_name' => $request->acc_name,
            'acc_no' => $request->acc_no,
            'account_type' => $request->account_type,
            'account_holder_nid' => $request->account_holder_nid,
            'eiin' => $request->eiin,
            //'banking_type_id' => $request->banking_type_id,
            'bank_name_id' => $request->bank_name_id,
            'district_id' => $request->district_id,
            'bank_branch_id' => $request->bank_branch_id
        ]);

        $generalInfo->save();

        $generalInfo->applicationNumberFamilyInfos()->save($familyInfo);


        $generalInfo->applicationNumberEducationInstituteInfos()->save($educationInstituteInfo);

        $generalInfo->appNumberAccountInfos()->save($accountInfo);


        $insertedAppID = $generalInfo->application_no;

        $applicationTracking = new ApplicationTracking([
            'application_no' => $insertedAppID,
            'cirID' => $request->circular_id,
            'is_completed' => 1,
            'user_id_no_id' => $user_id_no,
            'cirID' => $cirID,
        ]);

        $applicationTracking->save();

        //return redirect()->back()->with('message', 'Application Submitted Successfully');

        $general_info = GeneralInfo::where('application_no', $appNo)->first();
        $family_info = FamilyInfo::where('application_number_id', $general_info->id)->first();
        $educationInstitute_info = EducationInstituteInfo::where('application_number_id', $general_info->id)->first();
        $accountinfo = AccountInfo::where('app_number_id', $general_info->id)->first();

        //developing in progress.............
        return view('frontend.application.application_document')
            ->with('general_info', $general_info)
            ->with('family_info', $family_info)
            ->with('educationInstitute_info', $educationInstitute_info)
            ->with('accountinfo', $accountinfo)
            ->with('user_id', $user_id_no)
            ->with('message', 'Application Submitted Successfully');
    }


    //developing in progress.........
    public function document(Request $req)
    {
        //return $req;
        $item = new Document();
        $item->userid = $req->input('user_id');
        $item->app_number_id = $req->input('app_number_id');


        /*$this->validate($req, [
	    	'profile' => 'mimes:jpg,png,jpeg,gif,svg',
            'sign' => 'mimes:jpg,png,jpeg,gif,svg',
            'brid' => 'mimes:jpg,png,jpeg,gif,svg',
            'father_nid' => 'mimes:jpg,png,jpeg,gif,svg',
            'testimonial' => 'mimes:jpg,png,jpeg,gif,svg',
		]);*/


        if ($req->hasfile('profile')) {
            $destination = 'uploads/profile/' . $item->profile;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $req->file('profile');

            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            Image::make($file)->resize(600, 600)
                ->save('uploads/profile/' . $filename, 100);

            $item->profile = $filename;
        }

        if ($req->hasfile('sign')) {
            $destination = 'uploads/sign/' . $item->signature;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $req->file('sign');

            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            Image::make($file)->resize(600, 200)
                ->save('uploads/sign/' . $filename, 100);

            $item->signature = $filename;
        }

        if ($req->hasfile('brid')) {
            $destination = 'uploads/brid/' . $item->brid;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $req->file('brid');

            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            Image::make($file)->resize(600, 600)
                ->save('uploads/brid/' . $filename, 100);

            $item->brid = $filename;
        }

        if ($req->hasfile('father_nid')) {
            $destination = 'uploads/father_nid/' . $item->father_nid;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $req->file('father_nid');

            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            Image::make($file)->resize(600, 600)
                ->save('uploads/father_nid/' . $filename, 100);

            $item->father_nid = $filename;
        }

        if ($req->hasfile('testimonial')) {
            $destination = 'uploads/testimonial/' . $item->brid;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $req->file('testimonial');

            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            Image::make($file)->resize(600, 600)
                ->save('uploads/testimonial/' . $filename, 100);

            $item->testimonial = $filename;
        }

        $item->save();

        $general_info = GeneralInfo::where('id', $item->app_number_id)->first();
        $family_info = FamilyInfo::where('application_number_id', $general_info->id)->first();
        $educationInstitute_info = EducationInstituteInfo::where('application_number_id', $general_info->id)->first();
        $accountinfo = AccountInfo::where('app_number_id', $general_info->id)->first();
        $document = Document::where('app_number_id', $general_info->id)->first();



        $data = [
            'general_info' => $general_info,
            'family_info' => $family_info,
            'educationInstitute_info' => $educationInstitute_info,
            'accountinfo' => $accountinfo,
            'document' => $document,
            'app_id' => $item->app_number_id,
        ];

        $app_tracking = ApplicationTracking::where('application_no', $general_info->application_no)->first();
        $app_tracking->is_submitted = '1';
        $app_tracking->update();


        return view('frontend.application.application_success', $data);
    }

    function pdf($id)
    {

        $general_info = GeneralInfo::where('id', $id)->first();

        $file_name = $general_info->application_no . '.pdf';

        $pdf = new \Mpdf\Mpdf([
            'default_font' => 'nikosh',
        ]);

        $pdf->WriteHTML($this->pdf_html($id));


        $pdf->Output("uploads/applicants_copy/" . $file_name, 'F');
        $pdf->Output($file_name, 'D');
    }

    function pdf_html($id)
    {
        $user_id_no = auth()->user()->id;

     
        $user = User::where('id', $user_id_no);
        $general_info = GeneralInfo::where('id', $id)->first();
        $family_info = FamilyInfo::where('application_number_id', $general_info->id)->first();
        $educationInstitute_info = EducationInstituteInfo::where('application_number_id', $general_info->id)->first();
        $accountinfo = AccountInfo::where('app_number_id', $general_info->id)->first();
        $document = Document::where('app_number_id', $general_info->id)->first();


        $data = [
            'foo' => 'bar',
            'user' => $user,
            'general_info' => $general_info,
            'family_info' => $family_info,
            'educationInstitute_info' => $educationInstitute_info,
            'accountinfo' => $accountinfo,
            'document' => $document,
        ];

        return view('pdf.document', $data);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Fire When A Applicant hits on Apply Button.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function apply(Request $request)
    {


        try {
            $circulars = Circular::where('circular_status', 1)->get();
            foreach ($circulars as $key => $value) {
                $circular_type = $value->circular_type;
            }
            // dd($circular_type);

            $today = Carbon::now();
            $application_deadline = date_create($circulars[0]->application_deadline);

            $interval = $today->diff($application_deadline);
            $daysDiff =  $interval->format("%r%a");

            $user_id_no = auth()->user()->id;
            $guardian_occupations = Occupation::all();

            $familystatuses = FamilyStatus::all();

            $divisions = Division::all();
            $districts = District::all();
            $mcu_types = McuType::all();

            $education_levels = AcademicLevel::all();

            $class_names  = LevelWiseClass::all();
            $banking_types  = BankingType::all();
            $bank_account_types  = Bank_Account_Type::all();
            $acc_owner  = AccountOwner::all();
            $bank_names = BankingServiceProvider::all();

            try {
                $userData = User::findOrFail($user_id_no);
            } catch (Exception $e) {
                echo $e;
            }
            try {
                // dd($user_id_no);

                $generalInfoDataCheck = GeneralInfo::findOrFail($user_id_no);
                dd($generalInfoDataCheck);
                //$generalInfoDataCheck = '';
            } catch (\Throwable $th) {
                // echo 'No generalInfoDataCheck ';
            }
            if (!empty($generalInfoDataCheck)) {
                echo 'Already Appliaction Data Exists';
            } else {
                // dd($daysDiff);
                //return view('student.application')->with('circulars', $circularData);
                if ($daysDiff > 0) {
                    $appNo = ApplicationTracking::where('user_id_no_id', auth()->user()->id)->where('cirID', $circulars[0]->id)->first();

                    if ($appNo && $appNo->is_submitted == 1) {
                        echo 'Already Appliaction Data Exists';
                    } elseif ($appNo && $appNo->is_completed == 1) {
                        $general_info = GeneralInfo::where('application_no', $appNo->application_no)->first();

                        $family_info = FamilyInfo::where('application_number_id', $general_info->id)->first();
                        $educationInstitute_info = EducationInstituteInfo::where('application_number_id', $general_info->id)->first();
                        $accountinfo = AccountInfo::where('app_number_id', $general_info->id)->first();

                        //developing in progress.............
                        return view('frontend.application.application_document')
                            ->with('general_info', $general_info)
                            ->with('family_info', $family_info)
                            ->with('educationInstitute_info', $educationInstitute_info)
                            ->with('accountinfo', $accountinfo)
                            ->with('user_id', $user_id_no)
                            ->with('message', 'Application Submitted Successfully');
                    } else {
                        return view('frontend.application.application', compact(
                            'circulars',
                            'divisions',
                            'user_id_no',
                            'familystatuses',
                            'guardian_occupations',
                            'education_levels',
                            'class_names',
                            'acc_owner',
                            'bank_names',
                            'banking_types',
                            'districts',
                            'mcu_types',
                            'circular_type',
                            'userData',
                            'bank_account_types'
                        ));
                    }
                } else
                    echo "Application Deadline Expired";
            }
        } catch (\Throwable $th) {
            echo "divisions or Circular Error! No Resources";
            // redirect()->to('500');
        }
    }

    public function submit_document($id)
    {

        $user_id_no = auth()->user()->id;
        $general_info = GeneralInfo::where('application_no', $id)->first();

        $family_info = FamilyInfo::where('application_number_id', $general_info->id)->first();
        $educationInstitute_info = EducationInstituteInfo::where('application_number_id', $general_info->id)->first();
        $accountinfo = AccountInfo::where('app_number_id', $general_info->id)->first();

        //developing in progress.............
        return view('frontend.application.application_document')
            ->with('general_info', $general_info)
            ->with('family_info', $family_info)
            ->with('educationInstitute_info', $educationInstitute_info)
            ->with('accountinfo', $accountinfo)
            ->with('user_id', $user_id_no)
            ->with('message', 'Application Submitted Successfully');
    }

    public function edit_application(Request $request)
    {

        $user_id_no = auth()->user()->id;

        $userData = User::findOrFail($user_id_no);
        $g_info = GeneralInfo::where('application_no', $request->input('app_id'))->first();
        $family_info = FamilyInfo::where('application_number_id', $g_info->id)->first();
        $educationInstitute_info = EducationInstituteInfo::where('application_number_id', $g_info->id)->first();
        $accountinfo = AccountInfo::where('app_number_id', $g_info->id)->first();
        $circulars = Circular::where('circular_status', 1)->get();
        foreach ($circulars as $key => $value) {
            $circular_type = $value->circular_type;
        }
        // dd($circular_type);

        $today = Carbon::now();
        $application_deadline = date_create($circulars[0]->application_deadline);

        $interval = $today->diff($application_deadline);
        $daysDiff =  $interval->format("%r%a");


        $guardian_occupations = Occupation::all();

        $familystatuses = FamilyStatus::all();

        $divisions = Division::all();
        $districts = District::all();

        $education_levels = AcademicLevel::all();

        $class_names  = LevelWiseClass::all();
        $banking_types  = BankingType::all();
        $bank_account_types  = Bank_Account_Type::all();
        $acc_owner  = AccountOwner::all();
        $bank_names = BankingServiceProvider::all();


        return view('frontend.edit_application', compact(
            'circulars',
            'divisions',
            'user_id_no',
            'familystatuses',
            'guardian_occupations',
            'education_levels',
            'class_names',
            'acc_owner',
            'bank_names',
            'banking_types',
            'districts',
            'circular_type',
            'userData',
            'bank_account_types',
            'g_info',
            'family_info',
            'educationInstitute_info',
            'accountinfo',
        ));
    }

    public function update_application(Request $req)
    {
        //return $req;
        $g_info = GeneralInfo::where('application_no', $req->input('app_id'))->first();

        $g_info->brid = $req->input('brid');
        $g_info->nid = $req->input('nid');
        $g_info->name = $req->input('stu_name');
        $g_info->father_name = $req->input('father_name');
        $g_info->father_nid = $req->input('father_nid');
        $g_info->mother_name = $req->input('mother_name');
        $g_info->mother_nid = $req->input('mother_nid');
        $g_info->dob = $req->input('dob');
        $g_info->division_id = $req->input('division_id');
        $g_info->district_id = $req->input('districts_id');
        $g_info->upazila_id = $req->input('upazila_id');
        $g_info->union_id = $req->input('union_id');
        $g_info->village = $req->input('village_id');

        $g_info->update();

        $f_info = FamilyInfo::where('application_number_id', $g_info->id)->first();

        $f_info->familystatus_id = $req->input('familystatus_id');
        $f_info->guardian_occupation_id = $req->input('guardian_occupation_id');
        $f_info->guardian_education = $req->input('guardian_education');
        $f_info->guardian_land = $req->input('guardian_land');
        $f_info->guardian_annual_income = $req->input('guardian_annual_income');
        $f_info->family_member = $req->input('family_member');

        $f_info->update();


        $e_info = EducationInstituteInfo::where('application_number_id', $g_info->id)->first();

        $e_info->institute_division = $req->input('institute_division');
        $e_info->institute_district = $req->input('institute_district');
        $e_info->institute_division = $req->input('institute_division');
        $e_info->institute_upazila = $req->input('institute_upazila');
        $e_info->education_level_id = $req->input('education_level_id');
        $e_info->class_name_id = $req->input('class_name_id');
        $e_info->institute_name_id = $req->input('institute_name_id');
        //$e_info->eiin_id = $req->input('eiin_id');
        $e_info->last_study_class_id = $req->input('last_study_class_id');
        $e_info->last_gpa_total = $req->input('last_gpa_total');
        $e_info->last_gpa = $req->input('last_gpa');
        $e_info->update();

        $b_info = AccountInfo::where('app_number_id', $g_info->id)->first();

        $b_info->account_type = $req->input('account_type');
        $b_info->bank_account_owner = $req->input('bank_account_owner');
        $b_info->bank_name_id = $req->input('bank_name_id');
        $b_info->acc_name = $req->input('acc_name');
        $b_info->acc_no = $req->input('acc_no');
        $b_info->account_holder_nid = $req->input('account_holder_nid');
        $b_info->routing_no = $req->input('routing_no_id');
        $b_info->acc_no = $req->input('acc_no');
        $b_info->eiin = $req->input('eiin');

        $b_info->update();

        $general_info = GeneralInfo::where('application_no', $req->input('app_id'))->first();
        $family_info = FamilyInfo::where('application_number_id', $general_info->id)->first();
        $educationInstitute_info = EducationInstituteInfo::where('application_number_id', $general_info->id)->first();
        $accountinfo = AccountInfo::where('app_number_id', $general_info->id)->first();

        $user_id_no = auth()->user()->id;

        //developing in progress.............
        return view('frontend.application.application_document')
            ->with('general_info', $general_info)
            ->with('family_info', $family_info)
            ->with('educationInstitute_info', $educationInstitute_info)
            ->with('accountinfo', $accountinfo)
            ->with('user_id', $user_id_no)
            ->with('status', 'Application Info Updated Successfully');
    }
}
