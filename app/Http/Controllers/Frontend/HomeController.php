<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Circular;
use App\Models\ApplicationTracking;
use App\Models\User;
use Exception;
use Gate;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    public function index()
    {
        //abort_if(Gate::denies('circular_access') && Gate::denies('circular_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $apply_list = ApplicationTracking::where('user_id_no_id', auth()->user()->id)->latest()->get();
        // $circular = '';

        $circular = Circular::where('circular_status', 1)->get();


        $user = Auth::user();

        $userData = User::where('id', $user->id);


        return view('frontend.home')->with('circular', $circular)->with('apply_list', $apply_list);
    }
}
