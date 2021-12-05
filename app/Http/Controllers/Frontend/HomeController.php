<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Circular;
use App\Models\ApplicationTracking;
use Exception;
use Gate;
use Symfony\Component\HttpFoundation\Response;
// class HomeController
// {
//     public function index()
//     {
//         return view('frontend.home');
//     }
// }

class HomeController
{
    public function index()
    {
        $apply_list = ApplicationTracking::where('user_id_no_id',auth()->user()->id)->latest()->get();
        
        //return $apply_list;
        $circular = '';
        /*abort_if(Gate::denies('circular_access') && Gate::denies('circular_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            $circular = Circular::orderBy('created_at')->first();
        } catch (Exception $e) {
        }*/
        return view('frontend.home')->with('circular',$circular)->with('apply_list',$apply_list);
    }
}
