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
            'draftno' => 'required|numeric|unique:DraftThesis,DT_DraftNumber',
            'title' => 'required|string|max:255',
            'startdate' => 'required|date',
            'enddate' => 'required|date|after_or_equal:startdate',
            'pageno' => 'required|numeric',
            'ddc' => 'required|numeric',

            // add : comment, totalpageno, prepdays
        ]);
        
        $draftThesis = [
            'DT_DraftNumber' => $validatedData['draftno'],
            'DT_Title' => $validatedData['title'],
            'DT_StartDate' => $validatedData['startdate'],
            'DT_EndDate' => $validatedData['enddate'],
            'DT_PagesNumber' => $validatedData['pageno'],
            'DT_DDC' => $validatedData['ddc'],
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
