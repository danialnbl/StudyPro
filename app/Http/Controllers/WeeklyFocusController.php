<?php

namespace App\Http\Controllers;
use App\Models\WeeklyFocus;
use App\Models\User;
use App\Models\Mentor;
use App\Models\Platinum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WeeklyFocusController extends Controller
{
    public function AddWeeklyFocusView()
    {
        return view('manageWeeklyFocusView.AddWeeklyFocusView');
    }

    public function submitWeeklyFocusView(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'block' => 'required|string',
            'inputinfo' => 'required|array',
            'inputinfo.*' => 'required|string',
        ]);
        
        $weeklyFocus = [
            'WF_Date' => $validatedData['date'],
            'WF_Block' => $validatedData['block'],
            'WF_AdminInfo' => '',
            'WF_FocusInfo' => '',
            'WF_SocialInfo' => '',
            'WF_RecoveryInfo' => '',
        ];
    
        // Store data based on the selected block
        switch ($validatedData['block']) {
            case 'admin':
                $weeklyFocus['WF_AdminInfo'] = implode(', ', $validatedData['inputinfo']);
                break;
            case 'focus':
                $weeklyFocus['WF_FocusInfo'] = implode(', ', $validatedData['inputinfo']);
                break;
            case 'recovery':
                $weeklyFocus['WF_RecoveryInfo'] = implode(', ', $validatedData['inputinfo']);
                break;
            case 'social':
                $weeklyFocus['WF_SocialInfo'] = implode(', ', $validatedData['inputinfo']);
                break;
        }

        if (Auth::check()) {
            $user = Auth::user();
    
            // Check if the user has a Platinum relationship
            if ($user->platinum) { // Use correct casing for relationship
                $weeklyFocus['P_IC'] = $user->platinum->P_IC;
            } else {
                $weeklyFocus['P_IC'] = null; // or handle it in another appropriate way
            }
        
            // Check if the user has a Mentor relationship
            if ($user->Mentor) { // Use correct casing for relationship
                $weeklyFocus['M_IC'] = $user->mentor->M_IC;
            } else {
                $weeklyFocus['M_IC'] = null; // or handle it in another appropriate way
            } 
        }
        WeeklyFocus::create($weeklyFocus);
        return redirect()->route('WeeklyFocus.view')->with('success', 'Weekly Focus added successfully.');
    }
    

    public function ListWeeklyFocusView()
    {
        $weeklyFocus = WeeklyFocus::all();
        return view('manageWeeklyFocusView.ListWeeklyFocusView')->with('weeklyFocus', $weeklyFocus);
    }

    public function DeleteWeeklyFocus($wf_id)
    {
        WeeklyFocus::where('WF_ID', $wf_id)->delete();
        return redirect()->route('WeeklyFocus.view')->with('success', 'Weekly Focus deleted successfully.');
    }

    public function EditWeeklyFocusView(Request $request, string $wf_id)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'block' => 'required|string',
            'inputinfo' => 'required|array',
            'inputinfo.*' => 'required|string',
        ]);
    
        $weeklyFocus = WeeklyFocus::find($wf_id);
        if (!$weeklyFocus) {
            return redirect()->route('WeeklyFocus.view')->with('error', 'Weekly Focus not found.');
        }
    
        $weeklyFocus->WF_Date = $validatedData['date'];
        $weeklyFocus->WF_Block = $validatedData['block'];
        $weeklyFocus->WF_AdminInfo = '';
        $weeklyFocus->WF_FocusInfo = '';
        $weeklyFocus->WF_SocialInfo = '';
        $weeklyFocus->WF_RecoveryInfo = '';
    
        switch ($validatedData['block']) {
            case 'admin':
                $weeklyFocus->WF_AdminInfo = implode(', ', $validatedData['inputinfo']);
                break;
            case 'focus':
                $weeklyFocus->WF_FocusInfo = implode(', ', $validatedData['inputinfo']);
                break;
            case 'recovery':
                $weeklyFocus->WF_RecoveryInfo = implode(', ', $validatedData['inputinfo']);
                break;
            case 'social':
                $weeklyFocus->WF_SocialInfo = implode(', ', $validatedData['inputinfo']);
                break;
        }
    
        if (Auth::check()) {
            $user = Auth::user();
    
            if ($user->platinum) {
                $weeklyFocus->P_IC = $user->platinum->P_IC;
            } else {
                $weeklyFocus->P_IC = null;
            }
    
            if ($user->Mentor) {
                $weeklyFocus->M_IC = $user->mentor->M_IC;
            } else {
                $weeklyFocus->M_IC = null;
            }
        }
        $weeklyFocus->save();  
        return redirect()->route('WeeklyFocus.view')->with('success', 'Weekly Focus updated successfully.');
    }

    //still working on it
    public function EditWeeklyFocusForm($wf_id)
    {
        $weeklyFocus = WeeklyFocus::find($wf_id);
        if (!$weeklyFocus) {
            return redirect()->route('WeeklyFocus.view')->with('error', 'Weekly Focus not found.');
        }
        
        return view('weeklyfocus.edit', compact('weeklyFocus'));
    }

    public function FeedbackWFView(){
        return view('manageWeeklyFocusView.FeedbackWFView')->with('weeklyFocus', $weeklyFocus);
    }

    public function SearchWeeklyFocusView(){
        return view('manageWeeklyFocusView.SearchWeeklyFocusView')->with('weeklyFocus', $weeklyFocus);
    }

}

