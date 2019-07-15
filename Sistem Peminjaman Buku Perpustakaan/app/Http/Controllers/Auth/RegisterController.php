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
    protected $redirectTo = '/admin';

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
            'tempat_lahir' => ['required', 'max:100', 'string'],
            'tanggal_lahir' => ['required', 'date'],
            'no_telp' => ['required', 'numeric', 'digits_between:10,15', 'unique:users,no_telp'],
            'alamat' => ['required', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required','unique:users,username'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $ids = User::max('id');
        $ids == null ? $ids = 0 : $ids;
        $ids = (int) substr($ids, 3, 4);
        $ids++;
        $id = "AGT" . sprintf("%04s", $ids);

        return User::create([
            'id'  => $id,
            'name' => $data['name'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'no_telp' =>  $data['no_telp'],
            'alamat' => $data['alamat'],
            'status' => '1',
            'role'  => 'anggota',
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'deleted' => '0',
        ]);
    }
}
