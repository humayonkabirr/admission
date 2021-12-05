<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFinalSelectionRequest;
use App\Http\Requests\StoreFinalSelectionRequest;
use App\Http\Requests\UpdateFinalSelectionRequest;
use App\Models\AcademicLevel;
use App\Models\Circular;
use App\Models\District;
use App\Models\Division;
use App\Models\EducationalInstitute;
use App\Models\FinalSelection;
use App\Models\FinalSelectionCriterion;
use App\Models\GeneralInfo;
use App\Models\LevelWiseClass;
use App\Models\Selection;
use App\Models\Upazila;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class FinalSelectionController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('final_selection_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cirulars = Circular::where('circular_status', '1')->get();
        $FinalSelectionCriterias = FinalSelectionCriterion::all()->pluck('final_criteria_name', 'id');
        $FinalSelection = FinalSelection::get();

        return view('admin.finalSelections.index', compact('cirulars', 'FinalSelection', 'FinalSelectionCriterias'));
    }

    public function create()
    {
        abort_if(Gate::denies('final_selection_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $academic_levels = AcademicLevel::all()->pluck('level_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $admission_classes = LevelWiseClass::all()->pluck('class_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $education_institutes = EducationalInstitute::all()->pluck('institution_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $eiins = Selection::all()->pluck('eiin', 'id')->prepend(trans('global.pleaseSelect'), '');

        $divisions = Division::all()->pluck('division_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $districts = District::all()->pluck('district_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $upazilas = Upazila::all()->pluck('upazila_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.finalSelections.create', compact('academic_levels', 'admission_classes', 'education_institutes', 'eiins', 'divisions', 'districts', 'upazilas'));
    }

    public function store(StoreFinalSelectionRequest $request)
    {
        $finalSelection = FinalSelectionCriterion::create($request->all());

        return redirect()->route('admin.final-selections.index');
    }

    public function edit(FinalSelection $finalSelection)
    {
        abort_if(Gate::denies('final_selection_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $academic_levels = AcademicLevel::all()->pluck('level_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $admission_classes = LevelWiseClass::all()->pluck('class_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $education_institutes = EducationalInstitute::all()->pluck('institution_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $eiins = Selection::all()->pluck('eiin', 'id')->prepend(trans('global.pleaseSelect'), '');

        $divisions = Division::all()->pluck('division_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $districts = District::all()->pluck('district_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $upazilas = Upazila::all()->pluck('upazila_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $finalSelection->load('academic_level', 'admission_class', 'education_institute', 'eiin', 'division', 'district', 'upazila');

        return view('admin.finalSelections.edit', compact('academic_levels', 'admission_classes', 'education_institutes', 'eiins', 'divisions', 'districts', 'upazilas', 'finalSelection'));
    }

    public function update(UpdateFinalSelectionRequest $request, FinalSelection $finalSelection)
    {
        $finalSelection->update($request->all());

        return redirect()->route('admin.final-selections.index');
    }

    public function show(FinalSelection $finalSelection)
    {
        abort_if(Gate::denies('final_selection_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $finalSelection->load('academic_level', 'admission_class', 'education_institute', 'eiin', 'division', 'district', 'upazila');

        return view('admin.finalSelections.show', compact('finalSelection'));
    }

    public function destroy(FinalSelection $finalSelection)
    {
        abort_if(Gate::denies('final_selection_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $finalSelection->delete();

        return back();
    }

    public function massDestroy(MassDestroyFinalSelectionRequest $request)
    {
        FinalSelection::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function app_number($id)
    {
        $result = GeneralInfo::where('application_no', 'like', '%' . $id . '%')->get();
        return json_encode($result);
    }

    public function get_result(Request $request, $id)
    {

        $cid = $request->circular_id;
        $gpa = $request->last_gpa;
        $division = $request->division_id;
        $district = $request->district_id;
        $upazila = $request->upazila_id;
        $familyStatus = $request->family_status_id;
        $family_member = $request->family_member_id;

        if (!empty($cid) && empty($division) && empty($gpa)  && empty($familyStatus) && empty($family_member)) {
            $results = DB::table('general_infos')
                ->join('education_institute_infos', 'general_infos.id', '=', 'education_institute_infos.application_number_id')
                ->select('*')->where('circular_id', $cid)->get();
        } elseif (!empty($cid) && !empty($upazila) && empty($gpa)  && empty($familyStatus) && empty($family_member)) {
            $results = DB::table('general_infos')
                ->join('education_institute_infos', 'general_infos.id', '=', 'education_institute_infos.application_number_id')
                ->select('*')->where('circular_id', $cid)->where('upazila_id', $upazila)->get();
        } elseif (!empty($cid) && !empty($district) && empty($gpa)  && empty($familyStatus) && empty($family_member)) {
            $results = DB::table('general_infos')
                ->join('education_institute_infos', 'general_infos.id', '=', 'education_institute_infos.application_number_id')
                ->select('*')->where('circular_id', $cid)->where('district_id', $district)->get();
        } elseif (!empty($cid) && !empty($division) && empty($gpa)  && empty($familyStatus) && empty($family_member)) {
            $results = DB::table('general_infos')
                ->join('education_institute_infos', 'general_infos.id', '=', 'education_institute_infos.application_number_id')
                ->select('*')->where('circular_id', $cid)->where('division_id', $division)->get();
        } elseif (!empty($cid) && !empty($upazila) && !empty($gpa)  && empty($familyStatus) && empty($family_member)) {
            $results = DB::table('general_infos')
                ->join('education_institute_infos', 'general_infos.id', '=', 'education_institute_infos.application_number_id')
                ->select('*')->where('circular_id', $cid)->where('upazila_id', $upazila)->where('last_gpa', '>=', $gpa)->get();
        } elseif (!empty($cid) && !empty($district)  && !empty($gpa)  && empty($familyStatus) && empty($family_member)) {
            $results = DB::table('general_infos')
                ->join('education_institute_infos', 'general_infos.id', '=', 'education_institute_infos.application_number_id')
                ->select('*')->where('circular_id', $cid)->where('district_id', $district)->where('last_gpa', '>=', $gpa)->get();
        } elseif (!empty($cid) && !empty($division) && !empty($gpa)  && empty($familyStatus) && empty($family_member)) {
            $results = DB::table('general_infos')
                ->join('education_institute_infos', 'general_infos.id', '=', 'education_institute_infos.application_number_id')
                ->select('*')->where('circular_id', $cid)->where('division_id', $division)->where('last_gpa', '>=', $gpa)->get();
        } elseif (!empty($cid) && !empty($gpa)  && empty($familyStatus) && empty($family_member)) {
            $results = DB::table('general_infos')
                ->join('education_institute_infos', 'general_infos.id', '=', 'education_institute_infos.application_number_id')
                ->select('*')->where('circular_id', $cid)->where('last_gpa', '>=', $gpa)->get();
        } elseif (!empty($cid) && empty($gpa)  && empty($familyStatus) && !empty($family_member)) {
            $results = DB::table('general_infos')
                ->join('family_infos', 'general_infos.id', '=', 'family_infos.application_number_id')
                ->select('*')->where('circular_id', $cid)->where('familystatus_id', $familyStatus)->get();
        } elseif (!empty($cid) && empty($gpa)  && !empty($familyStatus) && empty($family_member)) {
            $results = DB::table('general_infos')
                ->join('family_infos', 'general_infos.id', '=', 'family_infos.application_number_id')
                ->select('*')->where('circular_id', $cid)->where('family_member', $family_member)->get();
        }

        // $results = DB::table('general_infos')
        //             ->join('family_infos', 'general_infos.id', '=', 'family_infos.application_number_id')
        //             ->select('*')->get();
        // dd($results);

        if ($id == "0") {
            $finalSelection = FinalSelectionCriterion::create($request->all());
            foreach ($results as $key => $value) {
                $finalSelection = new FinalSelection;
                $finalSelection->app_number = $value->application_number_id;
                // dd($value->app_number->id ?? "");
                $finalSelection->student_name = $value->name ?? "";
                $finalSelection->user_id_no = $value->user_id_no ?? "";
                $finalSelection->father_name = $value->father_name ?? "";
                $finalSelection->father_nid = $value->father_nid ?? "";
                $finalSelection->mother_name = $value->mother_name;
                $finalSelection->mother_nid = $value->mother_nid ?? "";
                $finalSelection->academic_level_id = $value->id;
                $finalSelection->admission_class_id = $value->id;
                $finalSelection->eiin_id = $value->id;
                $finalSelection->division_id = $value->division_id;
                $finalSelection->district_id = $value->district_id;
                $finalSelection->upazila_id = $value->upazila_id;
                $finalSelection->brid = $value->brid;
                $finalSelection->save();
            }
            return redirect()->route('admin.final-selections.index');
        }
        return json_encode($results);
    }
}
