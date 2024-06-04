<?php
namespace App\Http\Controllers;
use App\Models\DraftThesis;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DraftThesisController extends Controller
{
    public function AddDraftThesisView()
    {
        return view('manageDraftThesisView.AddDraftThesisView');
    }

    public function submitDraftThesis(Request $request)
    {
        $validatedData = $request->validate([
            'draftid' => 'required|numeric|unique:DraftThesis,DT_ID',
            'draftno' => 'required|numeric',
            'title' => 'required|string|max:255',
            'startdate' => 'required|date',
            'enddate' => 'required|date|after_or_equal:startdate',
            'pageno' => 'required|numeric',
            'ddc' => 'required|numeric',
            'comment' => 'required|string|max:255',

            // add : comment, totalpageno, prepdays
        ]);
        
        $draftThesis = [
            'DT_ID' => $validatedData['draftid'],
            'DT_DraftNumber' => $validatedData['draftno'],
            'DT_Title' => $validatedData['title'],
            'DT_StartDate' => $validatedData['startdate'],
            'DT_EndDate' => $validatedData['enddate'],
            'DT_PagesNumber' => $validatedData['pageno'],
            'DT_DDC' => $validatedData['ddc'],
            'DT_Feedback' => $validatedData['comment'],
        ];
        DraftThesis::create($draftThesis);
        return redirect('manageDraftThesisView.DraftThesisPerformanceView')->with('success', 'Draft Thesis added successfully.');
    }

    public function DraftThesisPerformanceView()
    {
        $draftThesis = DraftThesis::all(); 
        return view('manageDraftThesisView.DraftThesisPerformanceView')->with('draftThesis', $draftThesis);
    }

    public function DeleteDraftThesis(string $draftno){
        DraftThesis::where('DT_DraftNumber',$draftno)->delete();
        return redirect()->to('manageDraftThesisView.DraftThesisPerformanceView')->with('success', 'Data has been deleted successfully.');
    }

}
