<?php

namespace App\Http\Controllers;

use App\Models\Expert;
use App\Models\ExpertPaper;
use App\Models\ExpertResearch;
use App\Models\Mentor;
use App\Models\Picture;
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

    public function editExpertView($E_ID)
    {
        $Experts = Expert::where('E_ID', $E_ID)->get();
        $ExpertResearchs = ExpertResearch::where('E_ID',$E_ID)->first();

        return view('manageExpertDomain.editExpertView',
            compact('Experts','ExpertResearchs'));
    }

    public function ExpertEditPost(Request $request, $E_ID)
    {

        // Validate the incoming request data
        $validatedData = $request->validate([
            "E_Name" => "required",
            "E_University" => "required",
            "E_Email" => "required|email",
            "E_PhoneNumber" => "required",
            "ER_Title" => "required",
        ]);

//        $Experts = Expert::where('E_ID', $E_ID)->get();
        $Experts = Expert::findOrFail($E_ID);
        $ExpertResearchs = ExpertResearch::where('E_ID',$E_ID)->first();
        $ExpertResearchs->update([
            "ER_Title" => $validatedData['ER_Title'],
        ]);

        $Experts->update([
            "E_Name" => $validatedData['E_Name'],
            "E_University" => $validatedData['E_University'],
            "E_Email" => $validatedData['E_Email'],
            "E_PhoneNumber" => $validatedData['E_PhoneNumber'],
        ]);

        return redirect('/expertEdit/' . $E_ID)->with('success', 'Expert updated successfully');
    }

    public function detailExpertView($E_ID)
    {
        $Experts = Expert::where('E_ID', $E_ID)->get();
        $fetchPapers = ExpertPaper::where('E_ID', $E_ID)->get();
        $fetchResearches = ExpertResearch::where('E_ID', $E_ID)->get();
        $fetchPic = Picture::where('E_ID',$E_ID)->first();

        return view('manageExpertDomain.detailExpertView',
            compact('Experts','fetchPapers','fetchResearches','fetchPic'));
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
            "PI_File" => "nullable|mimes:jpeg,jpg,png,gif",
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
        $expertResearch->E_ID = $expert->E_ID;
        $expertResearch->save();

        if ($request->hasFile('PI_File')) {
            $picture = new Picture();
            $file = $request->file('PI_File');
            $fileNamePic = time() . '_' . $file->getClientOriginalName();
            $filePathPic = $file->storeAs('uploads/profilePic', $fileNamePic, 'public');
            $picture->PI_File = $fileNamePic;
            $picture->PI_FilePath = $filePathPic;
            $picture->PI_Type = "Expert";
            $picture->E_ID = $expert->E_ID;;
            $picture->save();
        }

        $expertPaper = new ExpertPaper();
        $expertPaper->EP_Paper = $validatedData['EP_Paper'];
        $expertPaper->EP_Year = $validatedData['EP_Year'];
        $expertPaper->ER_ID = $expertResearch->ER_ID;
        $expertPaper->E_ID = $expert->E_ID;
        $file = $request->file('RP_File');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads', $fileName, 'public');
        $expertPaper->EP_FileName = $fileName;
        $expertPaper->EP_FilePath = $filePath;

        if ($expertPaper->save()) {
            // Redirect with success message
            return redirect()->route("addExpert")->with("success", "Success to add expert!");
        }
        // Redirect with error message
        return redirect()->route("addExpert")->with("error", "Failed to add expert!");
    }


    public function deleteExpert($E_ID){
        try {
            Expert::where('E_ID', $E_ID)->delete();
            // Redirect with success message
            return redirect()->route("myExpertView")->with("success", "Success to delete expert!");
        } catch (\Exception $e){
            return redirect()->route("myExpertView")->with("fail", "Failed to delete expert!");
        }
    }
}
