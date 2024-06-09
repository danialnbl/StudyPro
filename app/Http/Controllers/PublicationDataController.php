<?php

namespace App\Http\Controllers;

use App\Models\PublicationData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Platinum;
use App\Models\Expert;
use App\Models\Mentor;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class PublicationDataController extends Controller
{
    public function addPublicationData()
    {
        return view('managePublicationData.addPublicationDataView');
    }

    public function create()
    {
        return view('managePublicationData.addPublicationDataView');
    }

    public function storePublication(Request $request)
{
    // Validate request data
    $validatedData = $request->validate([
        'PD_University' => 'required|string|max:255',
        'PD_Title' => 'required|string|max:255',
        'PD_Author' => 'required|string|max:255',
        'PD_DOI' => 'required|string|max:255',
        'PD_Type' => 'required|string|max:255',
        'PD_File' => 'required|file|mimes:pdf|max:1000240',
    ]);
    $userID = Auth::user()->P_IC;
    // Handle file upload
    if ($request->hasFile('PD_File')) {
        $file = $request->file('PD_File');
        $fileName = uniqid() . '_' . $file->getClientOriginalName(); // Use a unique name to avoid overwrite
        $path = $file->storeAs('uploads/publicationData', $fileName, 'public'); // Store file

        // Create a new PublicationData instance and populate it with data
        $publication = new PublicationData();
        $publication->PD_University = $validatedData['PD_University'];
        $publication->PD_Title = $validatedData['PD_Title'];
        $publication->PD_Author = $validatedData['PD_Author'];
        $publication->PD_DOI = $validatedData['PD_DOI'];
        $publication->PD_Type = $validatedData['PD_Type'];
        $publication->PD_FileName = $fileName;
        $publication->PD_FilePath = $path;
        $publication->PD_Date = now(); // or use your own date format
        $publication->P_IC = $userID; // Save the user ID
        $publication->save();

        return redirect()->route('Mypublication.view')->with('success', 'Publication added successfully!');
    }

    return redirect()->back()->with('error', 'File upload failed!');
}



    public function viewPublicationData()
    {
        $publications = PublicationData::all();
        return view('managePublicationData.viewPublicationDataView', compact('publications'));
    }

    public function viewPublicationDataM()
    {
        $publications = PublicationData::all();
    
        return view('managePublicationData.viewPublicationDataViewMentor', compact('publications'));
    }
    
    public function viewOwnPublicationData()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Fetch publications that belong to the authenticated user based on P_IC
        $publications = PublicationData::where('P_IC', $user->P_IC)->get();

        // Return the view with the filtered publications
        return view('managePublicationData.viewOwnPublicationDataView', compact('publications'));
    }

    public function editPublicationDataView($id)
    {
        $publication = PublicationData::findOrFail($id);
        $platinums = Platinum::all();
        $experts = Expert::all();
        return view('managePublicationData.editPublicationDataView', compact('publication', 'platinums', 'experts'));
    }

    public function update(Request $request, $PD_ID)
    {
        $request->validate([
            'PD_University' => 'required|string|max:255',
            'PD_Title' => 'required|string|max:255',
            'PD_Author' => 'required|string|max:255',
            'PD_DOI' => 'required|string|max:255',
            'PD_Type' => 'required|string|max:255',
            'PD_File' => 'nullable|file|mimes:pdf|max:1000240', // Optional file validation
        ]);
        
        $publication = PublicationData::findOrFail($PD_ID);
        $publication->PD_Title = $request->input('PD_Title');
        $publication->PD_University = $request->input('PD_University');
        $publication->PD_Author = $request->input('PD_Author');
        $publication->PD_DOI = $request->input('PD_DOI');
        $publication->PD_Type = $request->input('PD_Type');
    
        if ($request->hasFile('PD_File')) {
            // Delete the old file if it exists
            if ($publication->PD_FilePath) {
                Storage::delete($publication->PD_FilePath);
            }
    
            $file = $request->file('PD_File');
            $fileName = $file->getClientOriginalName();
            $path = $file->storeAs('PublicationData', $fileName, 'public');
            $publication->PD_FileName = $fileName;
            $publication->PD_FilePath = $path;
        }
    
        // Save the updated publication to the database
        $publication->save();
        return redirect()->route('Mypublication.view')->with('success', 'Publication updated successfully!');
    }

    public function destroy($id)
    {
        $publication = PublicationData::findOrFail($id);
        Storage::delete($publication->PD_FilePath);
        $publication->delete();
        return redirect()->back()->with('success', 'Publication deleted successfully!');
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);

        $search = $request->input('search');

        $publications = PublicationData::query()
            ->when($search, function ($query, $search) {
                return $query->where('PD_Title', 'like', '%' . $search . '%');
            })
            ->get();

        return view('managePublicationData.viewPublicationDataView', [
            'publications' => $publications,
        ]);
    }

    public function generateReportView()
{
    $platinums = Platinum::all();
    return view('managePublicationData.generateReportPublicationDataView', compact('platinums'));
}

public function generateReport(Request $request)
{
    $request->validate([
        'P_Name' => 'required|exists:platinum,P_Name',
    ]);

    $P_Name = $request->input('P_Name');

    // Get the platinum name
    $platinum = Platinum::where('P_Name', $P_Name)->first();
    
    if (!$platinum) {
        return redirect()->back()->with('error', 'Platinum member not found!');
    }

    // Fetch publications that belong to the specified platinum name 
    $publications = PublicationData::where('P_IC', $platinum->P_IC)->get();
    // Count the number of publications
    $publicationCount = $publications->count();

    // Return the PDF view
    $pdf = pdf::loadView('managePublicationData.publicationReportView', compact('platinum', 'publications', 'publicationCount'));
    return $pdf->download('publicationReport.pdf');
}
   

}
