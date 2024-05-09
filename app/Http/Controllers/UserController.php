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

    public function insert(Request $request){
        $platinum = new Platinum();
        $platinum ->P_IC = input('ic');
        $platinum ->P_Name = input('name');
        $platinum ->P_Gender = input('gender');
        $platinum ->P_Religion = input('religion');
        $platinum ->P_Race = input('race');
        $platinum ->P_Citizenship = input('citizenship');
        $platinum ->P_Address = input('address');
        $platinum ->P_City = input('city');
        $platinum ->P_State = input('state');
        $platinum ->P_Country = input('country');
        $platinum ->P_Zip = input('zip');
        $platinum ->P_PhoneNumber = input('phoneNum');
        $platinum ->P_Email = input('email');
        $platinum ->P_Facebook = input('facebook');
        $platinum ->P_TshirtSize = input('tshirtSize');
        $platinum ->P_DateApply = input('dateApply');
        $platinum ->P_Program = input('program');
        $platinum ->P_Batch = input('batch');
        $platinum ->P_Status = input('status');
        $platinum ->P_Title = input('title');
        //$platinum ->PE_Id = input('ic');
        //$platinum ->PR_Id = input('ic');
        $platinum->save();

        return redirect('/register')->with('status',"User Registered Successfully !");
    }

}
