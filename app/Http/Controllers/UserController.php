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
            return to_route('staffReg', ['message' => 'saving to db failed, RARE ENDING']);
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
        return to_route('login', ['message' => 'You are logged out']);
    }

}
