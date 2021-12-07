<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Models\CityCorporation;
use App\Models\Union;
use App\Models\Upazila;
use Illuminate\Http\Request;

class DependableValController extends Controller
{


    public function searchDivName()
    {
        $data = Division::select('division_name', 'id')->get();
        return response()->json($data); //then sent this data to ajax success
    }

    public function searchDistName(Request $request)
    {

        $id = preg_replace('/[^a-z\d ]/i', '', $request->id);


        if (is_numeric($id) && $id != '')
            $data = District::select('district_name', 'id')->where('division_name_id',  $request->id)->get();
        else
            $data = '';


        return response()->json($data); //then sent this data to ajax success
    }

    public function findCityCorporation(Request $request)
    {
        $id = preg_replace('/[^a-z\d ]/i', '', $request->id);


        if (is_numeric($id) && $id != '')
            $data = CityCorporation::select('city_corp_name', 'id')->where('district_id',  $request->id)->get();
        else
            $data = '';

        return response()->json($data); //then sent this data to ajax success
    }

    public function findThanaName(Request $request)
    {
        $id = preg_replace('/[^a-z\d ]/i', '', $request->id);


        if (is_numeric($id) && $id != '')
            $data = Upazila::select('upazila_name', 'id')->where('city_corp_id',  $request->id)->get();
        else
            $data = '';

        return response()->json($data); //then sent this data to ajax success
    }

    public function findThanaNameWithOutCityCor(Request $request)
    {
        $id = preg_replace('/[^a-z\d ]/i', '', $request->id);


        if (is_numeric($id) && $id != '')
            $data = Upazila::select('upazila_name', 'id') ->where('district_id', $request->id) ->whereNull('city_corp_id',)->get();
        else
            $data = '';

        return response()->json($data); //then sent this data to ajax success
    }

    public function searchUpazilaName(Request $request)
    {
        $id = preg_replace('/[^a-z\d ]/i', '', $request->id);

        if (is_numeric($id) && $id != '')
            $data = Upazila::select('upazila_name', 'id')->where('district_id', $request->id)->take(100)->get();
        else
            $data = '';
        return response()->json($data); //then sent this data to ajax success
    }

    public function searchUnionName(Request $request)
    {
        $id = preg_replace('/[^a-z\d ]/i', '', $request->id);

        if (is_numeric($id) && $id != '')

            $data = Union::select('union_name', 'id')->where('upazila_id', $request->id)->where('is_ward', 0)->take(100)->get();
        else
            $data = '';

        return response()->json($data); //then sent this data to ajax success
    }

    public function findUnionsNameWithOutPor(Request $request)
    {
        $id = preg_replace('/[^a-z\d ]/i', '', $request->id);

        if (is_numeric($id) && $id != '')

            $data = Union::select('union_name', 'id')->where('upazila_id', $request->id)->where('is_ward', 1)->take(100)->get();
        else
            $data = '';

        return response()->json($data); //then sent this data to ajax success
    }
}
