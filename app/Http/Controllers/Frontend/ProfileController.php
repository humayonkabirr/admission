<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Image;

class ProfileController extends Controller
{
    public function index()
    {

        $users = auth()->user();
        //dd($users);

        return view('frontend.profile.show')->with('user', $users);
    }

    public function edit()
    {
        $users = auth()->user();
        return view('frontend.profile.edit')->with('user', $users);
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = auth()->user();
        $UserObj = User::where('id', $user->id)->first();

        if ($request->hasfile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = $user->id . 'photo' . time() . '.' . $extension;
            $destination = public_path('images/' . $filename);
            //$destination = url('uploads/profile/' . $filename);
            Image::make($file)->resize(600, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destination);
            $request->photo = $filename;
        }



        if ($request->hasfile('sign')) {
            $file = $request->file('sign');
            $extension = $file->getClientOriginalExtension();
            $filename = $user->id . 'sign' . time()  . '.' . $extension;
            $destination = public_path('images/' . $filename);
            Image::make($file)->resize(600, 200)
                ->save($destination);
            $request->sign = $filename;
        }


        $UserObj->photo = $request->photo;
        $UserObj->sign = $request->sign;
        $UserObj->name = $request->name;
        $UserObj->email = $request->email;

        //dd($UserObj);
        $UserObj->update();



        // $user->update($request->all());
        //  $user->update($request->all());

        return redirect()->route('frontend.profile.index')->with('message', __('global.update_profile_success'));
    }

    public function destroy()
    {
        $user = auth()->user();

        $user->update([
            'email' => time() . '_' . $user->email,
        ]);

        $user->delete();

        return redirect()->route('login')->with('message', __('global.delete_account_success'));
    }

    public function password(UpdatePasswordRequest $request)
    {
        auth()->user()->update($request->validated());

        return redirect()->route('frontend.profile.index')->with('message', __('global.change_password_success'));
    }
}
