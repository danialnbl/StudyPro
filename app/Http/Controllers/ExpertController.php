<?php

namespace App\Http\Controllers;

use App\Models\Expert;
use App\Models\ExpertPaper;
use App\Models\ExpertResearch;
use App\Models\Mentor;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ExpertController extends Controller
{
    public function expertListView()
    {
        return view('manageExpertDomain.expertListView', [
            'expert' => Expert::all(),
        ]);
    }

    public function addExpertView()
    {
        return view('manageExpertDomain.addExpertView', [
            'expert' => Expert::all(),
        ]);
    }

    public function detailExpertView()
    {
        return view('manageExpertDomain.detailExpertView', [
            'expert' => Expert::all(),
        ]);
    }

    public function myExpertView()
    {
        $userID = Auth::user()->P_IC;

        $fetchExpert = Expert::where('P_IC', $userID)->get();

        return view('manageExpertDomain.myExpertListView', [
            'expert' => $fetchExpert,
        ]);
    }

    //Post Functions
    public function ExpertAddPost(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            "E_Name" => "required",
            "E_University" => "required",
            "E_Email" => "required|email",
            "E_PhoneNumber" => "required",
            "ER_Title" => "required",
            "EP_Paper" => "required",
            "EP_Year" => "required",
            'RP_File' => 'required|mimes:pdf|max:2048',
        ]);

        $userID = Auth::user()->P_IC;
        // Create a new Staff instance and populate it with data
        $expert = new Expert();
        $expert->E_Name = $validatedData['E_Name'];
        $expert->E_University = $validatedData['E_University'];
        $expert->E_Email = $validatedData['E_Email'];
        $expert->E_PhoneNumber = $validatedData['E_PhoneNumber'];
        $expert->P_IC = $userID;
        $expert->save();

        $expertResearch = new ExpertResearch();
        $expertResearch->ER_Title = $validatedData['ER_Title'];
        $expertResearch->E_ID = $expert->id;
        $expertResearch->save();

        $expertPaper = new ExpertPaper();
        $expertPaper->EP_Paper = $validatedData['EP_Paper'];
        $expertPaper->EP_Year = $validatedData['EP_Year'];
        $expertPaper->ER_ID = $expertResearch->id;
        $expertPaper->E_ID = $expert->id;
        $file = $request->file('RP_File');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads', $fileName);
        $expertPaper->EP_FileName = $fileName;
        $expertPaper->EP_FilePath = $filePath;

        if ($expertPaper->save()) {
            // Redirect with success message
            return redirect()->route("addExpert")->with("success", "Success to add expert!");
        }
        // Redirect with error message
        return redirect()->route("addExpert")->with("error", "Failed to add expert!");
    }
}
