<?php

namespace App\Http\Controllers;

use App\Models\LoginAccount;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Platinum;
use App\Models\Picture;
use App\Models\Staff;
use App\Models\PlatinumEducation;
use App\Models\PlatinumReferral;
use App\Models\Mentor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;


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
    //reg list - mentor 
    public function regList(){
        return view('manageRegistration.regList');
    }
    public function showRegList(){
        $platinum = Platinum ::all();
        return view('manageRegistration.regList', compact('platinum'));
    }
    public function viewReg($P_IC){
        $platinum = Platinum::findOrFail($P_IC);
        //$platinum = Platinum ::all();
        $data1 = $platinum->PE_Id;
        $data2 = $platinum->PR_Id;
        $PlatEdu = PlatinumEducation::where('PE_Id',$data1)->first();
        $PlatRef = PlatinumReferral::where('PR_Id',$data2)->first();
        return view('manageRegistration.regDetail', compact('platinum','PlatEdu','PlatRef'));
    }
    public function searchReg(Request $request){
        $search = $request->input('search');
        $platinum = Platinum::query()
        ->where('P_IC', 'LIKE', "%{$search}%")
        ->orWhere('P_Program', 'LIKE', "%{$search}%")
        ->orWhere('P_Name', 'LIKE', "%{$search}%")
        ->orWhere('P_Status', 'LIKE', "%{$search}%")
        ->get();

    return view('manageRegistration.regList', compact('platinum'));
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

            $userRef = new PlatinumReferral();
            if ($request->referral === 'yes') {
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
            $user->PE_Id = $userEdu->PE_Id;
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

        //platinum list
        public function showPlatList(){
            $platinum = Platinum ::all();
            return view('manageRegistration.platinumList', compact('platinum'));
        }

        public function viewPlat($P_IC){
            $platinum = Platinum::findOrFail($P_IC);
            //$platinum = Platinum ::all();
            $data1 = $platinum->PE_Id;
            $data2 = $platinum->PR_Id;
            $PlatEdu = PlatinumEducation::where('PE_Id',$data1)->first();
            $PlatRef = PlatinumReferral::where('PR_Id',$data2)->first();
            return view('manageRegistration.viewDetail', compact('platinum','PlatEdu','PlatRef'));
        }

        public function editPlat($P_IC)
        {
            $Platinum = Platinum::findOrFail($P_IC);
           // $Platinum = Platinum::where('P_IC', $P_IC)->get();
            $data = $Platinum->PE_Id;
            $PlatEdu = PlatinumEducation::where('PE_Id',$data)->first();

            return view('manageRegistration.editPlatinum',
                compact('Platinum','PlatEdu'));
        }

        public function PlatinumEditPost(Request $request, $P_IC)
        {
            // Validate the incoming request data
            $validatedData = $request->validate([
                "P_PhoneNumber" => "required",
                "P_Facebook" => "required",
                "P_TshirtSize" => "required",
                "P_Program" => "required",
                "P_Batch" => "required|integer",
                "P_Status" => "required",
                "P_Title" => "required",
                "PE_EduInstitute" => "required",
                "PE_Sponsorship" => "required",
                "PE_ProgramFee" => "required|numeric",
                "PE_EduLevel" => "required",
                "PE_Occupation" => "required",
            ]);

            // Retrieve the Platinum instance by P_IC
            $Platinum = Platinum::findOrFail($P_IC);
            //$Platinum = Platinum::where('P_IC', $P_IC)->firstOrFail();

            // Update related PlatinumEducation instance
            $Platinum->education()->update([
                "PE_EduInstitute" => $validatedData['PE_EduInstitute'],
                "PE_Sponsorship" => $validatedData['PE_Sponsorship'],
                "PE_ProgramFee" => $validatedData['PE_ProgramFee'],
                "PE_EduLevel" => $validatedData['PE_EduLevel'],
                "PE_Occupation" => $validatedData['PE_Occupation'],
            ]);

            // Update Platinum instance
            $Platinum->update([
                "P_PhoneNumber" => $validatedData['P_PhoneNumber'],
                "P_Facebook" => $validatedData['P_Facebook'],
                "P_TshirtSize" => $validatedData['P_TshirtSize'],
                "P_Program" => $validatedData['P_Program'],
                "P_Batch" => $validatedData['P_Batch'],
                "P_Status" => $validatedData['P_Status'],
                "P_Title" => $validatedData['P_Title'],
            ]);

            return redirect('/platEdit/' . $P_IC)->with('success', 'Platinum updated successfully');
        }
//      delete
    public function deletePlat($P_IC){
        $platinum = Platinum::find($P_IC);
        $platinum -> delete();
        $data1 = $platinum->PE_Id;
        $data2 = $platinum->PR_Id;
        $PlatEdu = PlatinumEducation::where('PE_Id',$data1)->delete();
        $PlatRef = PlatinumReferral::where('PR_Id',$data2)->delete();
        return redirect('/PlatinumList')->with('status',"Data Deleted Successfully !");
    }
// search in list - registration
    public function search(Request $request){
        $search = $request->input('search');
        $platinum = Platinum::query()
        ->where('P_IC', 'LIKE', "%{$search}%")
        ->orWhere('P_Program', 'LIKE', "%{$search}%")
        ->orWhere('P_Name', 'LIKE', "%{$search}%")
        ->orWhere('P_Status', 'LIKE', "%{$search}%")
        ->get();

    return view('manageRegistration.platinumList', compact('platinum'));
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


    public function platinumList()
    {
        return view('manageRegistration.platinumList');
    }

    //profile
    public function ProfileView()
    {
        return view('manageProfile.ProfileView');
    }
    public function staffProfile()
    {
        return view('manageProfile.staffProfile');
    }
    public function mentorProfile()
    {
        return view('manageProfile.mentorProfile');
    }
//  PLATINUM PROFILE 
    public function showPlatinum()
    {
        //$platinum = Platinum::where('P_IC', $P_IC)->firstOrFail();
        $user = Auth::user();
        $platinum = Platinum::where('P_IC', $user->P_IC)->firstOrFail();
        $data1 = $platinum->PE_Id;
        $data2 = $platinum->PR_Id;
        $data3 = $platinum->P_IC;
        $PlatEdu = PlatinumEducation::where('PE_Id',$data1)->first();
        $PlatRef = PlatinumReferral::where('PR_Id',$data2)->first();
        $fetchPic = Picture::where('P_IC',$data3)->first();

        return view('manageProfile.ProfileView', compact('platinum', 'PlatEdu', 'PlatRef','fetchPic'));
    }
    public function updatePlatinum()
    {
        //$platinum = Platinum::where('P_IC', $P_IC)->firstOrFail();
        $user = Auth::user();
        $platinum = Platinum::where('P_IC', $user->P_IC)->firstOrFail();
        $data1 = $platinum->PE_Id;
        $data2 = $platinum->PR_Id;
        $data3 = $platinum->P_IC;
        $PlatEdu = PlatinumEducation::where('PE_Id',$data1)->first();
        $PlatRef = PlatinumReferral::where('PR_Id',$data2)->first();
        $fetchPic = Picture::where('P_IC',$data3)->first();

        return view('manageProfile.editProfileView', compact('platinum', 'PlatEdu', 'PlatRef','fetchPic'));
    }
    public function PlatinumProfilePost(Request $request,)
    {
            // Validate the incoming request data
            $validatedData = $request->validate([
                "PI_File" => "nullable|mimes:jpeg,jpg,png,gif",
                "P_Name" => "required",
                "P_PhoneNumber" => "required",
                "P_Facebook" => "required",
                "P_Address" => "required",
                "P_Title" => "required",
                "PE_EduInstitute" => "required",
                "PE_Sponsorship" => "required",
                "PE_EduLevel" => "required",
                "PE_Occupation" => "required",
            ]);

            $P_IC = Auth::user()->P_IC;
            // Retrieve the Platinum instance by P_IC
            $platinum = Platinum::findOrFail($P_IC);
            //$Platinum = Platinum::where('P_IC', $P_IC)->firstOrFail();

            // Update related PlatinumEducation instance
            $platinum->education()->update([
                "PE_EduInstitute" => $validatedData['PE_EduInstitute'],
                "PE_Sponsorship" => $validatedData['PE_Sponsorship'],
                "PE_EduLevel" => $validatedData['PE_EduLevel'],
                "PE_Occupation" => $validatedData['PE_Occupation'],
            ]);

            // Update Platinum instance
            $platinum->update([
                "P_Name" => $validatedData['P_Name'],
                "P_PhoneNumber" => $validatedData['P_PhoneNumber'],
                "P_Facebook" => $validatedData['P_Facebook'],
                "P_Address" => $validatedData['P_Address'],
                "P_Title" => $validatedData['P_Title'],
            ]);
            if ($request->hasFile('PI_File')) {
                $picture = new Picture();
                $file = $request->file('PI_File');
                $fileNamePic = time() . '_' . $file->getClientOriginalName();
                $filePathPic = $file->storeAs('uploads/profilePic', $fileNamePic, 'public');
                $picture->PI_File = $fileNamePic;
                $picture->PI_FilePath = $filePathPic;
                $picture->PI_Type = "Platinum";
                $picture->P_IC = $platinum->P_IC;;
                $picture->save();
            }

            return redirect('/platProfile')->with('success', 'Platinum profile updated successfully');
    }
        //search profiles -platinum
    public function searchPlat(Request $request){
        $search = $request->input('search');
        $platinum = Platinum::query()
        ->where('P_IC', 'LIKE', "%{$search}%")
        ->orWhere('P_Program', 'LIKE', "%{$search}%")
        ->orWhere('P_Name', 'LIKE', "%{$search}%")
        ->orWhere('P_Status', 'LIKE', "%{$search}%")
        ->get();
        return view('manageProfile.searchProfiles', compact('platinum'));
    }

    public function detailPlat($P_IC){
        $platinum = Platinum::findOrFail($P_IC);
        //$platinum = Platinum ::all();
        $data1 = $platinum->PE_Id;
        $data2 = $platinum ->P_IC;
        $PlatEdu = PlatinumEducation::where('PE_Id',$data1)->first();
        $fetchPic = Picture::where('P_IC',$data2)->first();
        return view('manageProfile.searchDetailPT', compact('platinum','PlatEdu','fetchPic'));
    }

// STAFF PROFILE
    public function showStaff()
    {
        
        $user = Auth::user();
        $staff = Staff::where('S_IC', $user->S_IC)->firstOrFail();
        $data1 = $staff->S_IC;
        $fetchPic = Picture::where('S_IC',$data1)->first();

        return view('manageProfile.staffProfile', compact('staff','fetchPic'));
    }
    public function updateStaff()
    {
        $user = Auth::user();
        $staff = Staff::where('S_IC', $user->S_IC)->firstOrFail();
        $data1 = $staff->P_IC;
        $fetchPic = Picture::where('S_IC',$data1)->first();

        return view('manageProfile.editStaffProfile', compact('staff','fetchPic'));
    }
    public function StaffProfilePost(Request $request,)
    {
            // Validate the incoming request data
            $validatedData = $request->validate([
                "PI_File" => "nullable|mimes:jpeg,jpg,png,gif",
                "S_PhoneNumber" => "required",
            ]);

            $S_IC = Auth::user()->S_IC;
            // Retrieve the Platinum instance by P_IC
            $staff = Staff::findOrFail($S_IC);
            //$Platinum = Platinum::where('P_IC', $P_IC)->firstOrFail();

            // Update staff instance
            $staff->update([
                "S_PhoneNumber" => $validatedData['S_PhoneNumber'],
            ]);
            if ($request->hasFile('PI_File')) {
                $picture = new Picture();
                $file = $request->file('PI_File');
                $fileNamePic = time() . '_' . $file->getClientOriginalName();
                $filePathPic = $file->storeAs('uploads/profilePic', $fileNamePic, 'public');
                $picture->PI_File = $fileNamePic;
                $picture->PI_FilePath = $filePathPic;
                $picture->PI_Type = "Staff";
                $picture->S_IC = $staff->S_IC;;
                $picture->save();
            }

            return redirect('/staffProfile')->with('success', 'Staff profile updated successfully');
    }
    public function searchPlatST(Request $request){
        $search = $request->input('search');
        $platinum = Platinum::query()
        ->where('P_IC', 'LIKE', "%{$search}%")
        ->orWhere('P_Program', 'LIKE', "%{$search}%")
        ->orWhere('P_Name', 'LIKE', "%{$search}%")
        ->orWhere('P_Status', 'LIKE', "%{$search}%")
        ->get();
        return view('manageProfile.searchProST', compact('platinum'));
    }
    public function detailPlatST($P_IC){
        $platinum = Platinum::findOrFail($P_IC);
        //$platinum = Platinum ::all();
        $data1 = $platinum->PE_Id;
        $data2 = $platinum-> P_IC;
        $PlatEdu = PlatinumEducation::where('PE_Id',$data1)->first();
        $fetchPic = Picture::where('P_IC',$data2)->first();
        return view('manageProfile.searchDetailST', compact('platinum','PlatEdu','fetchPic'));
    }
// MENTOR PROFILE
    public function showMentor()
    {
        
        $user = Auth::user();
        $mentor = Mentor::where('M_IC', $user->M_IC)->firstOrFail();
        $data1 = $mentor->M_IC;
        $fetchPic = Picture::where('M_IC',$data1)->first();

        return view('manageProfile.mentorProfile', compact('mentor','fetchPic'));
    }
    public function updateMentor()
    {
        $user = Auth::user();
        $mentor = Mentor::where('M_IC', $user->M_IC)->firstOrFail();
        $data1 = $mentor->M_IC;
        $fetchPic = Picture::where('M_IC',$data1)->first();

        return view('manageProfile.editMentorProfile', compact('mentor','fetchPic'));
    }
    public function MentorProfilePost(Request $request,)
    {
            // Validate the incoming request data
            $validatedData = $request->validate([
                "PI_File" => "nullable|mimes:jpeg,jpg,png,gif",
                "M_PhoneNumber" => "required",
            ]);

            $M_IC = Auth::user()->M_IC;
            // Retrieve the Platinum instance by P_IC
            $mentor = Mentor::findOrFail($M_IC);
            //$Platinum = Platinum::where('P_IC', $P_IC)->firstOrFail();

            // Update staff instance
            $mentor->update([
                "M_PhoneNumber" => $validatedData['M_PhoneNumber'],
            ]);
            if ($request->hasFile('PI_File')) {
                $picture = new Picture();
                $file = $request->file('PI_File');
                $fileNamePic = time() . '_' . $file->getClientOriginalName();
                $filePathPic = $file->storeAs('uploads/profilePic', $fileNamePic, 'public');
                $picture->PI_File = $fileNamePic;
                $picture->PI_FilePath = $filePathPic;
                $picture->PI_Type = "Mentor";
                $picture->M_IC = $mentor->M_IC;
                $picture->save();
            }

            return redirect('/mentorProfile')->with('success', 'Mentor profile updated successfully');
    }
    public function searchPlatMT(Request $request){
        $search = $request->input('search');
        $platinum = Platinum::query()
        ->where('P_IC', 'LIKE', "%{$search}%")
        ->orWhere('P_Program', 'LIKE', "%{$search}%")
        ->orWhere('P_Name', 'LIKE', "%{$search}%")
        ->orWhere('P_Status', 'LIKE', "%{$search}%")
        ->get();
        return view('manageProfile.searchProMT', compact('platinum'));
    }
    public function detailPlatMT($P_IC){
        $platinum = Platinum::findOrFail($P_IC);
        //$platinum = Platinum ::all();
        $data1 = $platinum->PE_Id;
        $data2 = $platinum->P_IC;
        $PlatEdu = PlatinumEducation::where('PE_Id',$data1)->first();
        $fetchPic = Picture::where('P_IC',$data2)->first();
        return view('manageProfile.searchDetailMT', compact('platinum','PlatEdu','fetchPic'));
    }
    //homepage
    public function staffmain()
    {
        return view('layouts.staffmain');
    }

    public function logout(Request $request) {

        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route("login")->with("success", "Successfully Logout!");
        }else{
            return redirect()->route("login");
        }




    }
    // REPORT
    public function reportPlatinumView()
    {
            $data = ['platinum'=>Platinum::all()];
            $pdf = Pdf::LoadView('manageProfile.ProfileReportView', $data);
            return $pdf->download('profileReport.pdf');
    }
}