<?php

namespace App\Http\Controllers;

use App\Models\PublicationData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
    $request->validate([
        'PD_University' => 'required|string|max:255',
        'PD_Title' => 'required|string|max:255',
        'PD_Author' => 'required|string|max:255',
        'PD_DOI' => 'required|string|max:255',
        'PD_Type' => 'required|string|max:255',
        'PD_File' => 'required|file|mimes:pdf|max:1000240', // 10MB max, adjust as needed
    ]);

    // Handle file upload
    if ($request->hasFile('PD_File')) {
        $file = $request->file('PD_File');
        $fileName = $file->getClientOriginalName();
        $path = $file->storeAs('uploads/publicationData', $fileName, 'public'); // Store file

        // Save to database
        PublicationData::create([
            'PD_University' => $request->PD_University,
            'PD_Title' => $request->PD_Title,
            'PD_Author' => $request->PD_Author,
            'PD_DOI' => $request->PD_DOI,
            'PD_Type' => $request->PD_Type,
            'PD_FileName' => $fileName,
            'PD_FilePath' => $path,
            'PD_Date' => now(), // or use your own date format
            'user_id' => Auth::id(), // Save the user ID
        ]);

        return redirect()->back()->with('success', 'Publication added successfully!');
    }

    return redirect()->back()->with('error', 'File not found!');
}


    public function viewPublicationData()
    {
        $publications = PublicationData::all();
        return view('managePublicationData.viewPublicationDataView', compact('publications'));
    }

    public function viewOwnPublicationData()
    {
        $publications = PublicationData::all();
        return view('managePublicationData.viewOwnPublicationDataView', compact('publications'));
    }

    public function editPublicationDataView($id)
    {
        $publication = PublicationData::findOrFail($id);
        return view('managePublicationData.editPublicationDataView', compact('publications'));
    }

    public function update(Request $request, $id)
    {
        $publications = PublicationData::findOrFail($id);
        $publications->PD_Title = $request->input('PD_Title');
        $publications->PD_University = $request->input('PD_University');
        $publications->PD_Author = $request->input('PD_Author');
        $publications->PD_DOI = $request->input('PD_DOI');
        $publications->PD_Type = $request->input('PD_Type');
    
        if ($request->hasFile('PD_File')) {
            Storage::delete($publications->PD_FilePath);
            $file = $request->file('PD_File');
            $fileName = $file->getClientOriginalName();
            $path = $file->storeAs('PublicationData', $fileName, 'public');
            $publications->PD_FileName = $fileName;
            $publications->PD_FilePath = $path;
        }
    
        $publications->save();
        return redirect()->route('publications.my')->with('success', 'Publication updated successfully.');
    }
    

    public function destroy($id)
    {
        $publication = PublicationData::findOrFail($id);
        Storage::delete($publication->PD_FilePath);
        $publication->delete();
        return redirect()->route('Mypublication')->with('success', 'Publication deleted successfully.');
    }
}
