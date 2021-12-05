<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\SendCode;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    //protected $redirectTo = '/verify';
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        return $this->registered($request, $user) ?: redirect('/verify?phone=' . $request->user_contact);
    }



    /**
     * Get a validator for an incoming registration request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'              => ['required', 'string', 'max:255'],
            'user_name'         => ['required', 'string', 'max:255'],
            'brid'              => ['required', 'string', 'min:17', 'max:17',  'unique:users'],
            'dob'               => ['required', 'date'],
            'division_id'       => ['required', 'integer'],
            'district_id'       => ['required', 'integer'],
            'upazila_id'        => ['required', 'integer'],
            'union_id'          => ['required', 'integer'],
            'email'             => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'user_contact'      => ['required', 'regex:  /^(?:\+88|88)?(01[3-9]\d{8})$/'],
            'password'          => ['required', 'string', 'min:8', 'confirmed'],
            'captcha'           => ['required', 'captcha'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return \App\User
     */
    protected function create(array $data)
    {
        $UserName = $data['user_name'];
        // return User::create([
        $user =  User::create([
            'name'              => $data['name'],
            'user_name'         => '1',
            'brid'              => $data['brid'],
            'dob'               => $data['dob'],
            'division_id'       => $data['division_id'],
            'district_id'       => $data['district_id'],
            'upazila_id'        => $data['upazila_id'],
            'union_id'          => $data['union_id'],
            'email'             => $data['email'],
            'user_contact'      => $data['user_contact'],
            'active'            => 0,
            'password'          => Hash::make($data['password']),
        ]);

        if ($user) {
            $user->code = SendCode::sendCode($user->brid, $user->user_contact);
            $user->code_sent_count = 1;
            $user->save();
        }
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }
}
