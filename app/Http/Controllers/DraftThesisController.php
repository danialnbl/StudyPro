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
            'startdate' => 'required|date',
            'enddate' => 'required|date',
            'pageno' => 'required|numeric',
            'ddc' => 'required|numeric',
            'comment' => 'nullable|string|max:255',
        ]);
    
        // Calculate the total pages and preparation days
        $totalPages = $validatedData['pageno'];
        $startDate = Carbon::createFromFormat('Y-m-d', $validatedData['startdate']);
        $endDate = Carbon::createFromFormat('Y-m-d', $validatedData['enddate']);
        $prepDays = $endDate->diffInDays($startDate);
    
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

}
