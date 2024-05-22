<?php

namespace App\Http\Controllers;

use App\Models\LoginAccount;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Platinum;
use App\Models\Staff;
use App\Models\PlatinumEducation;
use App\Models\PlatinumReferral;
use App\Models\Mentor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    //dashboard
    public function PlatDashboard(){
        return view('dashboard.platinumDashboard');
    }
    public function StaffDashboard(){
        return view('dashboard.staffDashboard');
    }
    public function MentorDashboard(){
        return view('dashboard.mentorDashboard');
    }
    //Login
    public function loginView()
    {
        return view('Login.LoginView'); //
    }

    public function ResetPasswordView()
    {
        return view('Login.ResetPasswordView'); //
    }

    public function authenticate(Request $request)
    {
        $credentials = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $loginResult = Auth::attempt($credentials);
        if ($loginResult) {
            if (Auth::user()->LA_Role == 0){
                return to_route('PlatDashboard');
            }elseif (Auth::user()->LA_Role == 1){
                return to_route('StaffDashboard');
            }elseif (Auth::user()->LA_Role == 2){
                return to_route('MentorDashboard');
            }else{
                return redirect()->route("login")->with("error", "Something wrong with role!");
            }
        }else{
            return redirect()->route("login")->with("error", "Wrong email or password!");
        }
    }

 // Registration
    public function PlatinumRegistration()
    {
        return view('manageRegistration.PlatinumRegistration');
    }
    public function StaffRegistration()
    {
        return view('manageRegistration.StaffRegistration');
    }
    public function MentorRegistration()
    {
        return view('manageRegistration.MentorRegistration');
    }

    public function PlatinumRegisterPost(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            "P_Name" => "required",
            "P_IC" => "required",
            "P_Gender" => "required",
            "P_Religion" => "required",
            "P_Race" => "required",
            "P_Citizenship" => "required",
            "P_Address" => "required",
            "P_City" => "required",
            "P_State" => "required",
            "P_Country" => "required",
            "P_Zip" => "required",
            "P_PhoneNumber" => "required",
            "P_Email" => "required|email",
            "P_Facebook" => "required",
            "P_TshirtSize" => "required",
            "P_DateApply" => "required|date",
            "P_Program" => "required",
            "P_Batch" => "required|integer",
            "P_Status" => "required",
            "P_Title" => "required",
            "PE_EduInstitute" => "required",
            "PE_Sponsorship" => "required",
            "PE_ProgramFee" => "required|numeric",
            "PE_EduLevel" => "required",
            "PE_Occupation" => "required",
            "referral" => "required|string",
            "PR_Name" => "required_if:referral,yes",
            "PR_Batch" => "required_if:referral,yes"
        ]);

            // Create a new PlatinumEducation instance and populate it with data
            $userEdu = new PlatinumEducation();
            $userEdu->PE_EduInstitute = $validatedData['PE_EduInstitute'];
            $userEdu->PE_Sponsorship = $validatedData['PE_Sponsorship'];
            $userEdu->PE_ProgramFee = $validatedData['PE_ProgramFee'];
            $userEdu->PE_EduLevel = $validatedData['PE_EduLevel'];
            $userEdu->PE_Occupation = $validatedData['PE_Occupation'];
            $userEdu->save();

            if ($request->referral === 'yes') {
                $userRef = new PlatinumReferral();
                $userRef->PR_Name = $validatedData['PR_Name'];
                $userRef->PR_Batch = $validatedData['PR_Batch'];
                $userRef->save();
            }

            // Create a new Platinum instance and populate it with data
            $user = new Platinum();
            $user->P_IC = $validatedData['P_IC'];
            $user->P_Name = $validatedData['P_Name'];
            $user->P_Gender = $validatedData['P_Gender'];
            $user->P_Religion = $validatedData['P_Religion'];
            $user->P_Race = $validatedData['P_Race'];
            $user->P_Citizenship = $validatedData['P_Citizenship'];
            $user->P_Address = $validatedData['P_Address'];
            $user->P_City = $validatedData['P_City'];
            $user->P_State = $validatedData['P_State'];
            $user->P_Country = $validatedData['P_Country'];
            $user->P_Zip = $validatedData['P_Zip'];
            $user->P_PhoneNumber = $validatedData['P_PhoneNumber'];
            $user->P_Email = $validatedData['P_Email'];
            $user->P_Facebook = $validatedData['P_Facebook'];
            $user->P_TshirtSize = $validatedData['P_TshirtSize'];
            $user->P_DateApply = $validatedData['P_DateApply'];
            $user->P_Program = $validatedData['P_Program'];
            $user->P_Batch = $validatedData['P_Batch'];
            $user->P_Status = $validatedData['P_Status'];
            $user->P_Title = $validatedData['P_Title'];
            // Set the PE_Id field with the ID of the PlatinumEducation instance
            $user->PE_Id = $userEdu->id;
            // Set the PR_Id field with the ID of the PlatinumReferal instance
            $user->PR_Id = $userRef->id;

            $user->save();

            $newUser = new User;
            $newUser->name = $validatedData['P_Name'];
            $newUser->LA_Username = $validatedData['P_Email'];
            $newUser->email = $validatedData['P_Email'];
            $newUser->password = Hash::make($validatedData['P_IC']);
            $newUser->P_IC = $validatedData['P_IC'];
            $newUser->LA_Role = 0;

            if ($newUser->save()) {
                // Redirect with success message
                return redirect()->route("register")->with("success", "Success Registration!");
            }
            // Redirect with error message
            return redirect()->route("register")->with("error", "Failed to register!");
    }

    public function StaffRegisterPost(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            "S_Name" => "required",
            "S_IC" => "required",
            "S_PhoneNumber" => "required",
            "S_Email" => "required|email",
            "S_StaffID" => "required",
        ]);

        $newStaff = new Staff;
        $newStaff->S_IC = $validatedData['S_IC'];
        $newStaff->S_Name = $validatedData['S_Name'];
        $newStaff->S_Email = $validatedData['S_Email'];
        $newStaff->S_PhoneNumber = $validatedData['S_PhoneNumber'];
        $newStaff->S_StaffID = $validatedData['S_StaffID'];
        $newStaff->save();

        $newUser = new User;
        $newUser->name = $validatedData['S_Name'];
        $newUser->LA_Username = $validatedData['S_Email'];
        $newUser->email = $validatedData['S_Email'];
        $newUser->password = Hash::make($validatedData['S_IC']);
        $newUser->S_IC = $validatedData['S_IC'];
        $newUser->LA_Role = 1;

            if ($newUser->save()) {
                return redirect()->route("staffReg")->with("success", "Success Registration!");
            }
            // Redirect with error message
            return redirect()->route("staffReg")->with("error", "Failed to register!");
        }
    public function MentorRegisterPost(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            "M_Name" => "required",
            "M_IC" => "required",
            "M_PhoneNumber" => "required",
            "M_Email" => "required|email",
            "M_MentorID" => "required",
        ]);

            // Create a new Staff instance and populate it with data
            $mentor = new Mentor();
            $mentor->M_IC = $validatedData['M_IC'];
            $mentor->M_Name = $validatedData['M_Name'];
            $mentor->M_PhoneNumber = $validatedData['M_PhoneNumber'];
            $mentor->M_Email = $validatedData['M_Email'];
            $mentor->M_MentorID = $validatedData['M_MentorID'];

            $mentor->save();

            // Create a new LoginAccount instance and populate it with data
            $newUser = new User;
            $newUser->name = $validatedData['M_Name'];
            $newUser->LA_Username = $validatedData['M_Email'];
            $newUser->email = $validatedData['M_Email'];
            $newUser->password = Hash::make($validatedData['M_IC']);
            $newUser->M_IC = $validatedData['M_IC'];
            $newUser->LA_Role = 2;

            if ($newUser->save()) {
                // Redirect with success message
                return redirect()->route("mentorReg")->with("success", "Success Registration!");
            }
            // Redirect with error message
            return redirect()->route("mentorReg")->with("error", "Failed to register!");
    }


    //Verification

    public function VerifyAccountView()
    {
        return view('Login.VerifyAccountView');
    }

    public function verificationView()
    {
        return view('VerifyAccountView');
    }

    /*public function verify(Request $request)
    {
        // Verify user based on token or other verification method
        // Update user status to "verified"
        // Redirect user to login page with a success message
    }*/

    public function platinumList()
    {
        return view('manageRegistration.platinumList');
    }

    //profile
    public function ProfileView()
    {
        return view('manageProfile.ProfileView');
    }
    //homepage
    public function staffmain()
    {
        return view('layouts.staffmain');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route("login")->with("success", "Successfully Logout!");
    }

}
