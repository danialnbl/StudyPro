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
                return to_route('login', ['message' => 'Something wrong with role!']);
            }
        }
        return to_route('login', ['message' => 'Wrong email or password']);
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
            "name" => "required",
            "ic" => "required",
            "gender" => "required",
            "religion" => "required",
            "race" => "required",
            "citizenship" => "required",
            "address" => "required",
            "city" => "required",
            "state" => "required",
            "country" => "required",
            "zip" => "required",
            "phoneNum" => "required",
            "email" => "required|email",
            "facebook" => "required",
            "tshirtSize" => "required",
            "dateApply" => "required|date",
            "program" => "required",
            "batch" => "required|integer",
            "status" => "required",
            "title" => "required",
            "eduIns" => "required",
            "sponsorship" => "required",
            "programFee" => "required|numeric",
            "eduLevel" => "required",
            "occupation" => "required",
            "referral" => "required|string",
            "referralName" => "required_if:referral,yes",
            "referralBatch" => "required_if:referral,yes"
        ]);

        // Using DB transaction to ensure data consistency
        DB::beginTransaction();

        try {
            // Create a new PlatinumEducation instance and populate it with data
            $userEdu = new PlatinumEducation();
            $userEdu->PE_EduInstitute = $validatedData['eduIns'];
            $userEdu->PE_Sponsorship = $validatedData['sponsorship'];
            $userEdu->PE_ProgramFee = $validatedData['programFee'];
            $userEdu->PE_EduLevel = $validatedData['eduLevel'];
            $userEdu->PE_Occupation = $validatedData['occupation'];
            $userEdu->save();

            if ($request->referral === 'yes') {
                $userRef = new PlatinumReferral();
                $userRef->PR_Name = $validatedData['referralName'];
                $userRef->PR_Batch = $validatedData['referralBatch'];
                $userRef->save();
            }

            // Create a new Platinum instance and populate it with data
            $user = new Platinum();
            $user->P_IC = $validatedData['ic'];
            $user->P_Name = $validatedData['name'];
            $user->P_Gender = $validatedData['gender'];
            $user->P_Religion = $validatedData['religion'];
            $user->P_Race = $validatedData['race'];
            $user->P_Citizenship = $validatedData['citizenship'];
            $user->P_Address = $validatedData['address'];
            $user->P_City = $validatedData['city'];
            $user->P_State = $validatedData['state'];
            $user->P_Country = $validatedData['country'];
            $user->P_Zip = $validatedData['zip'];
            $user->P_PhoneNumber = $validatedData['phoneNum'];
            $user->P_Email = $validatedData['email'];
            $user->P_Facebook = $validatedData['facebook'];
            $user->P_TshirtSize = $validatedData['tshirtSize'];
            $user->P_DateApply = $validatedData['dateApply'];
            $user->P_Program = $validatedData['program'];
            $user->P_Batch = $validatedData['batch'];
            $user->P_Status = $validatedData['status'];
            $user->P_Title = $validatedData['title'];



            // Set the PE_Id field with the ID of the PlatinumEducation instance
            $user->PE_Id = $userEdu->id;
            $user->save();

            // Create a new LoginAccount instance and populate it with data
            $loginAcc = new LoginAccount();
            $loginAcc->LA_Username = $validatedData['ic'];
            // Hash the password before storing it
            $loginAcc->LA_Password = password_hash($validatedData['ic'], PASSWORD_BCRYPT);
            $loginAcc->P_IC = $validatedData['ic'];
            $loginAcc->save();

            // Commit the transaction
            DB::commit();

            // Redirect with success message
            return redirect()->route("register")->with("success", "Success Registration!");
        } catch (\Exception $e) {
            // Rollback the transaction on failure
            DB::rollBack();

            // Log the error for debugging purposes
            Log::error('Failed to register user: ' . $e->getMessage());

            // Redirect with error message
            return redirect()->route("register")->with("error", "Failed to register: " . $e->getMessage());
        }
    }

    public function StaffRegisterPost(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            "Sname" => "required",
            "Sic" => "required",
            "SphoneNum" => "required",
            "Semail" => "required|email",
            "staffID" => "required",
            "role" => "required"
        ]);

        $newUser = new User;
        $newUser->name = $validatedData['Sic'];
        $newUser->LA_Username = $validatedData['Sname'];
        $newUser->email = $validatedData['Semail'];
        $newUser->password = Hash::make($validatedData['Sic']);
        $newUser->LA_Role = $validatedData['role'];

            if ($newUser->save()) {
                return to_route('login', ['message' => 'ya did it']);
            }
            return to_route('StaffRegister', ['message' => 'saving to db failed, RARE ENDING']);
        }
    public function MentorRegisterPost(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            "Mname" => "required",
            "Mic" => "required",
            "MphoneNum" => "required",
            "Memail" => "required|email",
            "mentorID" => "required",
            "role" => "required"

        ]);

        // Using DB transaction to ensure data consistency
        DB::beginTransaction();

        try {

            // Create a new Staff instance and populate it with data
            $mentor = new Mentor();
            $mentor->M_IC = $validatedData['Mic'];
            $mentor->M_Name = $validatedData['Mname'];
            $mentor->M_PhoneNumber = $validatedData['MphoneNum'];
            $mentor->M_Email = $validatedData['Memail'];
            $mentor->M_MentorId = $validatedData['mentorID'];

            $mentor->save();

            // Create a new LoginAccount instance and populate it with data
            $loginAcc = new LoginAccount();
            $loginAcc->LA_Username = $validatedData['Mic'];
            // Hash the password before storing it
            $loginAcc->LA_Password = password_hash($validatedData['Mic'], PASSWORD_BCRYPT);
            $loginAcc->M_IC = $validatedData['Mic'];
            $loginAcc->save();

            // Commit the transaction
            DB::commit();

            // Redirect with success message
            return redirect()->route("mentorReg")->with("success", "Success Registration!");
        } catch (\Exception $e) {
            // Rollback the transaction on failure
            DB::rollBack();

            // Log the error for debugging purposes
            Log::error('Failed to register user: ' . $e->getMessage());

            // Redirect with error message
            return redirect()->route("mentorReg")->with("error", "Failed to register: " . $e->getMessage());
        }
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
        return to_route('login', ['message' => 'You are logged out']);
    }

}
