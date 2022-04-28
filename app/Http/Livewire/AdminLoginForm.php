<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class AdminLoginForm extends Component
{

    public $email, $password;

    public function loginHandler()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ], [
            'email.required' => 'Email is required',
            'email.email' => 'Email is not valid',
            'email.exists' => 'Email is not exists',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters',
            ]);

            $credentials = [
                'email' => $this->email,
                'password' => $this->password,
            ];

            if (auth()->guard('web')->attempt($credentials)) {
                $checkUser = User::where('email', $this->email)->first();
                if($checkUser->blocked == 1){
                    Auth::guard('web')->logout();
                    return redirect()->route('admin.login')->with('fail', __('Your account is blocked'));
                }else{
                    return redirect()->route('admin.home');
                }
            } else {
                session()->flash('fail', __('Email or password is not correct'));
            }
    }

    public function render()
    {
        return view('livewire.admin-login-form');
    }
}
