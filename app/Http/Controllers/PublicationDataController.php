<?php

namespace App\Http\Controllers;

use App\Models\PublicationData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Platinum;
use App\Models\Expert;

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
        'PD_File' => 'required|file|mimes:pdf|max:1000240', // 1GB max
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

        return redirect()->route('Mypublication.view')->with('success', 'Publication added successfully!');
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
}
