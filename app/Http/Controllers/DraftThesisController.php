<?php
namespace App\Http\Controllers;

use App\Models\DraftThesis;
use App\Models\User;
use App\Models\Mentor;
use App\Models\Platinum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DraftThesisController extends Controller
{
    public function AddDraftThesisView()
    {
        return view('manageDraftThesisView.AddDraftThesisView');
    }

    public function submitDraftThesis(Request $request)
    {
        $validatedData = $request->validate([
            'draftno' => 'required|numeric',
            'title' => 'required|string|max:255',
            'startdate' => 'required|date_format:Y-m-d|before_or_equal:enddate',
            'enddate' => 'required|date_format:Y-m-d|after_or_equal:startdate',
            'pageno' => 'required|numeric',
            'ddc' => 'required|numeric',
            'comment' => 'nullable|string|max:255',
        ]);
    
        // Calculate the total pages and preparation days
        $totalPages = $validatedData['pageno'];
        $startDate = Carbon::createFromFormat('Y-m-d', $validatedData['startdate']);
        $endDate = Carbon::createFromFormat('Y-m-d', $validatedData['enddate']);
        $prepDays = abs($endDate->diffInDays($startDate));
    
        // Save the draft thesis
        $draftThesis = new DraftThesis();
        $draftThesis->DT_DraftNumber = $validatedData['draftno'];
        $draftThesis->DT_Title = $validatedData['title'];
        $draftThesis->DT_StartDate = $validatedData['startdate'];
        $draftThesis->DT_EndDate = $validatedData['enddate'];
        $draftThesis->DT_PagesNumber = $validatedData['pageno'];
        $draftThesis->DT_DDC = $validatedData['ddc'];
        $draftThesis->DT_Feedback = $validatedData['comment'];
        $draftThesis->DT_TotalPages = $totalPages;
        $draftThesis->DT_PrepDays = $prepDays;

        $platinum = Platinum::all();
        $mentor = Mentor::all();

        if (Auth::check()) {
            $user = Auth::user();
            $draftThesis->P_IC = $user->platinum->P_IC ?? null;
            $draftThesis->M_IC = $user->mentor->M_IC ?? null;
        }
    
        $draftThesis->save();
        return redirect()->route('DraftThesis.view')->with('success', 'Draft Thesis added successfully.');
    }

    public function DraftThesisPerformanceView()
    {
        $draftThesis = DraftThesis::all();
        
        // Calculate the total pages
        $totalPages = $draftThesis->sum('DT_PagesNumber');
        
        return view('manageDraftThesisView.DraftThesisPerformanceView')
            ->with('draftThesis', $draftThesis)
            ->with('totalPages', $totalPages);
    }


    public function DeleteDraftThesis($draftid) {
        DraftThesis::where('DT_ID', $draftid)->delete();
        return redirect()->route('DraftThesis.view')->with('success', 'Data has been deleted successfully.');
    }

    public function EditDraftThesisView(Request $request, $draftid){
        \Log::info('Request Method: ' . $request->method());
            $validatedData = $request->validate([
                'draftno' => 'required|numeric',
                'title' => 'required|string|max:255',
                'startdate' => 'required|date_format:Y-m-d|before_or_equal:enddate',
                'enddate' => 'required|date_format:Y-m-d|after_or_equal:startdate',
                'pageno' => 'required|numeric',
                'ddc' => 'required|numeric',
                'comment' => 'nullable|string|max:255',
            ]);
    
            // Find the draft thesis by ID
            $draftThesis = DraftThesis::findOrFail($draftid);
    
            // Calculate the total pages and preparation days
            $totalPages = $validatedData['pageno'];
            $startDate = Carbon::createFromFormat('Y-m-d', $validatedData['startdate']);
            $endDate = Carbon::createFromFormat('Y-m-d', $validatedData['enddate']);
            $prepDays = abs($endDate->diffInDays($startDate));
    
            // Update the draft thesis attributes
            $draftThesis->DT_DraftNumber = $validatedData['draftno'];
            $draftThesis->DT_Title = $validatedData['title'];
            $draftThesis->DT_StartDate = $validatedData['startdate'];
            $draftThesis->DT_EndDate = $validatedData['enddate'];
            $draftThesis->DT_PagesNumber = $validatedData['pageno'];
            $draftThesis->DT_DDC = $validatedData['ddc'];
            $draftThesis->DT_Feedback = $validatedData['comment'] ?? '';
            $draftThesis->DT_TotalPages = $totalPages;
            $draftThesis->DT_PrepDays = $prepDays;

            $platinum = Platinum::all();
            $mentor = Mentor::all();
    
            if (Auth::check()) {
                $user = Auth::user();
                $draftThesis->P_IC = $user->platinum->P_IC ?? null;
                $draftThesis->M_IC = $user->mentor->M_IC ?? null;
            }
    
            $draftThesis->save();
            return redirect()->route('DraftThesis.view')->with('success', 'Draft Thesis updated successfully.');
    }   
    
    public function EditDraftThesisForm($draftid){
        $draftThesis = DraftThesis::find($draftid);
        if (!$draftThesis) {
            return redirect()->route('DraftThesis.view')->with('error', 'Draft Thesis not found.');
        }
        return view('manageDraftThesisView.EditDraftThesisView', compact('draftThesis'));
    }

    public function SearchDraftThesisView(Request $request)
    {
        // Retrieve the search input
        $search = $request->input('search');

        // Query the database based on the search input
        $platinum = Platinum::query()
            ->where('P_Name', 'LIKE', "%{$search}%")
            ->orWhere('P_Status', 'LIKE', "%{$search}%")
            ->get();

        // Return the view with the search results
        return view('manageDraftThesisView.SearchDraftThesisView')->with('platinums', $platinum);
    }

    public function FeedbackDTView(){
        $draftThesis = DraftThesis::all();

        return view('manageDraftThesisView.FeedbackDTView')
            ->with('draftThesis', $draftThesis);
    }

    public function ListPlatinumDTView(){
        $platinum = Platinum::where('P_Status', 'Platinum')->get();

        return view('manageDraftThesisView.ListPlatinumDTView')->with('platinums', $platinum);
    }

}
