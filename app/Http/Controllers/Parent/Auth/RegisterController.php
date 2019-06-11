<?php

namespace App\Http\Controllers\Parent\Auth;

use App\Models\ParentUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    

    use RegistersUsers;


    protected $redirectTo = '/home';

    
    public function __construct()
    {
        $this->middleware('guest');
    }

    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255', 'unique:parents'],
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'in:m,f'],
            'age' => ['required', 'numeric', 'min:18', 'max:99'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:parents'],
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
        return ParentUser::create([
            'name' => $data['name'],
            'username' => strtolower($data['username']),
            'email' => $data['email'],
            'gender' => $data['gender'],
            'age' => $data['age'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegistrationForm()
    {
        return view('parent.auth.register');
    }

    protected function guard()
    {
        return Auth::guard('parent');
    }
}