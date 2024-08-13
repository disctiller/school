<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Estudiante;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            'numero_documento' => ['required', 'string', 'max:100'],
            'nombre1' => ['required', 'string', 'max:100'],
            'nombre2' => ['required', 'string', 'max:100'],
            'apellido1' => ['required', 'string', 'max:100'],
            'apellido2' => ['required', 'string', 'max:100'],
            'rol_id' => ['required', 'integer', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {   
        $user = User::create([
            'numero_documento' => $data['numero_documento'],
            'nombre1' => $data['nombre1'],
            'nombre2' => $data['nombre2'],
            'apellido1' => $data['apellido1'],
            'apellido2' => $data['apellido2'],
            'rol_id' => $data['rol_id'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        if($data['rol_id'] == "4"){
            $estudiante = new Estudiante;
            $estudiante->user_id = $user->id;
            $estudiante->estado = 1;
            $estudiante->save();
        }
        
        return $user;
    }
}
