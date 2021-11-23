<?php

namespace App\Http\Controllers\Admin;

use App\Models\PrimarySelectionCriteria;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyFinalSelectionCriterionRequest;
use App\Http\Requests\StorePrimarySelectionCriterionRequest;
use App\Http\Requests\UpdateFinalSelectionCriterionRequest;
use App\Models\Circular;
use App\Models\District;
use App\Models\Division;
use App\Models\FinalSelectionCriterion;
use App\Models\Upazila;
use App\Models\FamilyStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PrimarySelectionCriteriaController extends Controller
{
  use CsvImportTrait;

  public function index(Request $request)
  {
      abort_if(Gate::denies('final_selection_criterion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

      $PrimarySelectionCriterions = PrimarySelectionCriteria::OrderBy('id', 'desc')->get();


      return view('admin.primarySelectionCriteria.index', compact('PrimarySelectionCriterions'));
  }

  public function create()
  {
      abort_if(Gate::denies('final_selection_criterion_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

      $cirulars = Circular::where('circular_status', '1')->get()->pluck('cirucular_name', 'id')->prepend(trans('global.pleaseSelect'), '');

      $divisions = Division::all()->pluck('division_name', 'id')->prepend(trans('global.pleaseSelect'), '');

      $family_statuses        = FamilyStatus::all();

      return view('admin.primarySelectionCriteria.create', compact('cirulars', 'divisions', 'family_statuses'));
  }

  public function store(StorePrimarySelectionCriterionRequest $request)
  {
      $PrimarySelectionCriterion = PrimarySelectionCriteria::create($request->all());
      return redirect()->route('admin.primary-selection-criteria.index');
  }

  public function edit(FinalSelectionCriterion $finalSelectionCriterion)
  {
      abort_if(Gate::denies('final_selection_criterion_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

      $cirulars = Circular::all()->pluck('cirucular_name', 'id')->prepend(trans('global.pleaseSelect'), '');

      $divisions = Division::all()->pluck('division_name', 'id')->prepend(trans('global.pleaseSelect'), '');

      $districts = District::all()->pluck('district_name', 'id')->prepend(trans('global.pleaseSelect'), '');

      $upazilas = Upazila::all()->pluck('upazila_name', 'id')->prepend(trans('global.pleaseSelect'), '');

      $finalSelectionCriterion->load('cirular', 'division', 'district', 'upazila');

      return view('admin.primarySelectionCriteria.edit', compact('cirulars', 'divisions', 'districts', 'upazilas', 'finalSelectionCriterion'));
  }

  public function update(UpdateFinalSelectionCriterionRequest $request, FinalSelectionCriterion $finalSelectionCriterion)
  {
      $finalSelectionCriterion->update($request->all());

      return redirect()->route('admin.primary-selection-criteria.index');
  }

  public function show(FinalSelectionCriterion $finalSelectionCriterion)
  {
      abort_if(Gate::denies('final_selection_criterion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

      $finalSelectionCriterion->load('cirular', 'division', 'district', 'upazila');

      return view('admin.finalSelectionCriteria.show', compact('finalSelectionCriterion'));
  }

  public function destroy(FinalSelectionCriterion $finalSelectionCriterion)
  {
      abort_if(Gate::denies('primary_selection_criterion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

      $finalSelectionCriterion->delete();

      return back();
  }

  public function massDestroy(MassDestroyFinalSelectionCriterionRequest $request)
  {
      FinalSelectionCriterion::whereIn('id', request('ids'))->delete();

      return response(null, Response::HTTP_NO_CONTENT);
  }
}