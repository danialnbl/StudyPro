<?php

namespace App\Http\Controllers;

use App\Models\LoginAccount;
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
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $role = $request->role;
        $user = null;
        $loginAccount = null;

        if ($role === "Staff") {
            $user = Staff::where('S_IC', '=', $request->username)->first();
            if ($user) {
                $loginAccount = LoginAccount::where('S_IC', '=', $user->S_IC)->first();
            }
        } elseif ($role === "Mentor") {
            $user = Mentor::where('M_IC', '=', $request->username)->first();
            if ($user) {
                $loginAccount = LoginAccount::where('M_IC', '=', $user->M_IC)->first();
            }
        } elseif ($role === "Platinum") {
            $user = Platinum::where('P_IC', '=', $request->username)->first();
            if ($user) {
                $loginAccount = LoginAccount::where('P_IC', '=', $user->P_IC)->first();
            }
        } else {
            return back()->with('fail', 'Invalid role specified');
        }

        if ($user && $loginAccount) {
            if (Hash::check($request->password, $loginAccount->LA_Password)) {
                $request->session()->put('loginId', $user->id);
                if ($role === "Staff") {
                    Log::info('Redirecting to StaffDashboard');
                    return redirect()->route('StaffDashboard');
                } elseif ($role === "Mentor") {
                    Log::info('Redirecting to MentorDashboard');
                    return redirect()->route('MentorDashboard');
                } else {
                    Log::info('Redirecting to PlatDashboard');
                    return redirect()->route('PlatDashboard');
                }
            } else {
                return back()->with('fail', 'Password not match');
            }
        } else {
            return back()->with('fail', 'This username is not registered');
        }
    }
    public function logout() {
        Log::info('Logout function called');
        if(Session::has('loginId')) {
            Log::info('User logging out with session ID: ' . Session::get('loginId'));
            Session::pull('loginId');
            Log::info('Session cleared, redirecting to login');
            return redirect('login');
        } else {
            Log::info('No session found, redirecting to login');
            return redirect('login');
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

        // Using DB transaction to ensure data consistency
        DB::beginTransaction();

        try {

            // Create a new Staff instance and populate it with data
            $staff = new Staff();
            $staff->S_IC = $validatedData['Sic'];
            $staff->S_Name = $validatedData['Sname'];
            $staff->S_PhoneNumber = $validatedData['SphoneNum'];
            $staff->S_Email = $validatedData['Semail'];
            $staff->S_StaffId = $validatedData['staffID'];

            $staff->save();

            // Create a new LoginAccount instance and populate it with data
            $loginAcc = new LoginAccount();
            $loginAcc->LA_Username = $validatedData['Sic'];
            // Hash the password before storing it
            $loginAcc->LA_Password = password_hash($validatedData['Sic'], PASSWORD_BCRYPT);
            $loginAcc->S_IC = $validatedData['Sic'];
            $loginAcc->save();

            // Commit the transaction
            DB::commit();

            // Redirect with success message
            return redirect()->route("staffReg")->with("success", "Success Registration!");
        } catch (\Exception $e) {
            // Rollback the transaction on failure
            DB::rollBack();

            // Log the error for debugging purposes
            Log::error('Failed to register user: ' . $e->getMessage());

            // Redirect with error message
            return redirect()->route("staffReg")->with("error", "Failed to register: " . $e->getMessage());
        }
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

}
