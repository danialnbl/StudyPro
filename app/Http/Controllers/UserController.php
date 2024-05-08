<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function loginView()
    {
    return view('Login.LoginView'); // 
    }

    public function ResetPasswordView()
    {
    return view('Login.ResetPasswordView'); // 
    }

    public function newRegisterView()
    {
        return view('manageRegistration.newRegisterView');
    }
    public function VerifyAccountView()
    {
        return view('Login.VerifyAccountView');
    }

}
