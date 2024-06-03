<?php

namespace App\Http\Controllers;

use App\Models\Expert;
use App\Models\ExpertPaper;
use App\Models\ExpertResearch;
use App\Models\Mentor;
use App\Models\Picture;
use App\Models\PublicationData;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
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

    public function reportExpertView()
    {
        $data = ['experts'=>Expert::all()];
        $pdf = Pdf::LoadView('manageExpertDomain.reportExpertView', $data);
        return $pdf->download('expertList.pdf');
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
        $ExpertPic = Picture::where('E_ID', $E_ID)->get()->first();
        $ExpertResearchs = ExpertResearch::where('E_ID',$E_ID)->first();

        return view('manageExpertDomain.editExpertView',
            compact('Experts','ExpertResearchs','ExpertPic'));
    }

    public function ExpertEditPost(Request $request, $E_ID)
    {

        // Validate the incoming request data
        $validatedData = $request->validate([
            "E_Name" => "required",
            "E_University" => "required",
            "E_Email" => "required|email",
            "E_PhoneNumber" => "required",
            "E_Domain" => "required",
            "PI_File" => "nullable|mimes:jpeg,jpg,png,gif",
        ]);

//        $Experts = Expert::where('E_ID', $E_ID)->get();
        $Experts = Expert::findOrFail($E_ID);
        $ExpertPic = Picture::where('E_ID', $E_ID)->get()->first();

        if ($request->hasFile('PI_File')) {
            $file = $request->file('PI_File');
            $fileNamePic = time() . '_' . $file->getClientOriginalName();
            $filePathPic = $file->storeAs('uploads/profilePic', $fileNamePic, 'public');

            $ExpertPic->update([
                "PI_File" => $fileNamePic,
                "PI_FilePath" => $filePathPic,
                "PI_Type" => "Expert",
            ]);
        }

        $Experts->update([
            "E_Name" => $validatedData['E_Name'],
            "E_University" => $validatedData['E_University'],
            "E_Email" => $validatedData['E_Email'],
            "E_PhoneNumber" => $validatedData['E_PhoneNumber'],
        ]);

        return redirect('/expertEdit/' . $E_ID)->with('success', 'Expert updated successfully');
    }

    public function PublicationEditPost(Request $request, $PD_ID)
    {

        // Validate the incoming request data
        $validatedData = $request->validate([
            "PD_Title" => "required",
            "PD_Date" => "required",
            "PD_Type" => "required",
        ]);

//        $Experts = Expert::where('E_ID', $E_ID)->get();
        $PublicationData = PublicationData::findOrFail($PD_ID);

        $PublicationData->update([
                "PD_Title" => $validatedData['PD_Title'],
                "PD_Date" => $validatedData['PD_Date'],
                "PD_Type" => $validatedData['PD_Type'],
        ]);

        return redirect('/myexpert')->with('success', 'Expert publication updated successfully');
    }

    public function detailExpertView($E_ID)
    {
        $Experts = Expert::where('E_ID', $E_ID)->get();
        $fetchPapers = ExpertPaper::where('E_ID', $E_ID)->get();
        $fetchPublication = PublicationData::where('E_ID', $E_ID)->get();
        $fetchPic = Picture::where('E_ID',$E_ID)->first();

        return view('manageExpertDomain.detailExpertView',
            compact('Experts','fetchPapers','fetchPic','fetchPublication'));
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
            "E_Domain" => "required",
            "PD_Title" => "required",
            "PD_Date" => "required",
            "PD_Type" => "required",
            "PI_File" => "nullable|mimes:jpeg,jpg,png,gif",
            'PD_File' => 'required|mimes:pdf|max:10048',
        ]);

        $userID = Auth::user()->P_IC;
        // Create a new Staff instance and populate it with data
        $expert = new Expert();
        $expert->E_Name = $validatedData['E_Name'];
        $expert->E_University = $validatedData['E_University'];
        $expert->E_Email = $validatedData['E_Email'];
        $expert->E_PhoneNumber = $validatedData['E_PhoneNumber'];
        $expert->E_Domain = $validatedData['E_Domain'];
        $expert->P_IC = $userID;
        $expert->save();

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

        $publicationData = new PublicationData();
        $publicationData->PD_Title = $validatedData['PD_Title'];
        $publicationData->PD_University = $validatedData['E_University'];
        $publicationData->PD_Type = $validatedData['PD_Type'];
        $publicationData->PD_Author = $validatedData['E_Name'];

        //PDF File
        $file = $request->file('PD_File');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads', $fileName, 'public');
        $publicationData->PD_FileName = $fileName;
        $publicationData->PD_FilePath = $filePath;

        $publicationData->PD_Date = $validatedData['PD_Date'];
        $publicationData->E_ID = $expert->E_ID;
//        $publicationData->save();

        if ($publicationData->save()) {
            // Redirect with success message
            return redirect()->route("addExpert")->with("success", "Success to add expert!");
        }
        // Redirect with error message
        return redirect()->route("addExpert")->with("error", "Failed to add expert!");
    }

    public function PaperAddPost(Request $request, $E_ID)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            "PD_Title" => "required",
            "PD_Date" => "required",
            "PD_Type" => "required",
            'PD_File' => 'required|mimes:pdf|max:10048',
        ]);

        $userID = Auth::user()->P_IC;
        $Experts = Expert::where('P_IC', $userID)->get()->first();

        if($Experts!= null){
            $publicationData = new PublicationData();
            $publicationData->PD_Title = $validatedData['PD_Title'];
            $publicationData->PD_University = $Experts->E_University;
            $publicationData->PD_Type = $validatedData['PD_Type'];
            $publicationData->PD_Author = $Experts->E_Name;

            //PDF File
            $file = $request->file('PD_File');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');
            $publicationData->PD_FileName = $fileName;
            $publicationData->PD_FilePath = $filePath;

            $publicationData->PD_Date = $validatedData['PD_Date'];
            $publicationData->E_ID = $Experts->E_ID;

            if ($publicationData->save()) {
                // Redirect with success message
                return redirect()->route("detailExpertView", $E_ID)->with("success", "Success to add expert!");
            }
        }
        // Redirect with error message
        return redirect()->route("detailExpertView", $E_ID)->with("error", "Failed to add expert!");
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

    public function deletePaper($PD_ID){

        $EID = PublicationData::find($PD_ID)->E_ID;

        $Expert = Expert::where('E_ID', $EID)->get()->first();
        try {
            PublicationData::where('PD_ID', $PD_ID)->delete();
            // Redirect with success message
            return redirect()->route("detailExpertView", $Expert)->with("success", "Success to delete expert!");
        } catch (\Exception $e){
            return redirect()->route("detailExpertView", $Expert)->with("fail", "Failed to delete expert!");
        }
    }
}
