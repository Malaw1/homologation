<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'adresse' => ['required', 'string'],
            'pays'  =>  ['required', 'string'],
            'region' => ['required', 'string'],
            'telephone' => ['required', 'string'],
            'zip'   =>  ['required', 'string'],
            'first_name'   =>  ['string'],
            'last_name'   =>  ['string'],
            'phone_user'   =>  ['string'],
            'mail_user'   =>  ['string', 'email', 'max:255', 'unique:users'],
            'role' => 'required|in:admin,labo,agence,superadmin,pharmacien', //validate role input
        ]);

        // dd("Validated..!");
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // dd("Validated");
        if($data['role'] == 'labo'){
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'telephone' => $data['telephone'],
                'adresse' => $data['adresse'],
                'pays' => $data['pays'],
                'region' => $data['region'],
                'zip' => $data['zip'],
                'password' => Hash::make($data['password']),
                'role' => $data['role']
            ]);
        }elseif($data['role'] == 'agence'){
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'telephone' => $data['telephone'],
                'adresse' => $data['adresse'],
                'pays' => $data['pays'],
                'region' => $data['region'],
                'zip' => $data['zip'],
                'password' => Hash::make($data['password']),
                'role' => $data['role'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'mail_user' => $data['mail_user'],
                'phone_user' => $data['phone_user'],
            ]);
        }else{
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'telephone' => $data['telephone'],
                'adresse' => $data['adresse'],
                'password' => Hash::make($data['password']),
                'role' => $data['role']
            ]);
        }

    }
}
