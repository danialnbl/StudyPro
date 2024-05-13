<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //Login
    public function loginView()
    {
    return view('Login.LoginView'); // 
    }

    public function ResetPasswordView()
    {
    return view('Login.ResetPasswordView'); // 
    }

    public function login(Request $request) //ni nak masuk kan info dalam database
    {
        // Validate form data
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        // Attempt to authenticate user
        $user = LoginAccount::where('LA_Username', $validatedData['username'])
                            ->where('LA_Password', $validatedData['password'])
                            ->where('role', $validatedData['role'])
                            ->first();

        if ($user) {
            // User authenticated successfully
            // You can add your authentication logic here, such as setting session variables
            return redirect()->route('dashboard'); // Redirect to dashboard or any other route
        } else {
            // Authentication failed
            return back()->with('error', 'Invalid credentials'); // Redirect back with error message
        }
    }

    //Registration
    public function newRegisterView()
    {
        return view('manageRegistration.newRegisterView');
    }

    public function register(Request $request)
    {
        // Validate the registration form data
        $validatedData = $request->validate([
            // Add validation rules for registration fields
        ]);

        // Create a new user (unverified by default)
        $user = User::create([
            // Assign form fields to the User model attributes
        ]);

        // Send verification email
        Mail::to($user->email)->send(new VerificationNotification($user));

        // Redirect to verification page
        return redirect()->route('verify')->with('success', 'Please verify your email.');
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

        return redirect('/register')->with('status',"Success Registration!");
    }

    //Verification -login

    public function VerifyAccountView()
    {
        return view('Login.VerifyAccountView');
    }

    public function verificationView()
    {
        return view('VerifyAccountView');
    }

    public function verify(Request $request)
    {
        // Verify user based on token or other verification method
        // Update user status to "verified"
        // Redirect user to login page with a success message
    }

    public function platinumList(){
        return view('manageRegistration.platinumList');
    }

}
