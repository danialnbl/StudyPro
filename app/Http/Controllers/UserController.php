<?php

namespace App\Http\Controllers;

use App\Models\LoginAccount;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Platinum;
use App\Models\PlatinumEducation;
use App\Models\PlatinumReferral;

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

    public function loginPost(Request $request)
    {

    }

    /*public function login(Request $request) //ni nak masuk kan info dalam database
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
    }*/

    // Registration
    public function PlatinumRegistration()
    {
        return view('manageRegistration.PlatinumRegistration');
    }

    public function registerPost(Request $request)
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

            //login
            $loginAcc = new LoginAccount();
            $loginAcc->LA_Password = $validatedData['ic'];
            $loginAcc->LA_Username = $validatedData['ic'];

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

    /*public function register(Request $request)
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
    }*/

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
