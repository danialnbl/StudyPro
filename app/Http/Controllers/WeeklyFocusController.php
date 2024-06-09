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
            'startdate' => 'required|date',
            'enddate' => 'required|date',
            'block' => 'required|string',
            'inputinfo' => 'required|array',
            'inputinfo.*' => 'required|string',
        ]);

        $weeklyFocus = new WeeklyFocus();
        $weeklyFocus->WF_StartDate = $validatedData['startdate'];
        $weeklyFocus->WF_EndDate = $validatedData['enddate'];
        $weeklyFocus->WF_FocusBlock = $validatedData['block'];
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

        $platinum = Platinum::all();
        $mentor = Mentor::all();

        if (Auth::check()) {
            $user = Auth::user();
            $weeklyFocus->P_IC = $user->platinum->P_IC ?? null;
            $weeklyFocus->M_IC = $user->mentor->M_IC ?? null;
        }

        $weeklyFocus->save();
        return redirect()->route('WeeklyFocus.view')->with('success', 'Weekly Focus added successfully.');
    }

    public function ListWeeklyFocusView()
    {
        $weeklyFocus = WeeklyFocus::all();
        return view('manageWeeklyFocusView.ListWeeklyFocusView', compact('weeklyFocus'));
    }

    public function DeleteWeeklyFocus($wf_id)
    {
        WeeklyFocus::where('WF_ID', $wf_id)->delete();
        return redirect()->route('WeeklyFocus.view')->with('success', 'Weekly Focus deleted successfully.');
    }

    public function EditWeeklyFocusForm($wf_id)
    {
        $weeklyFocus = WeeklyFocus::find($wf_id);
        if (!$weeklyFocus) {
            return redirect()->route('WeeklyFocus.view')->with('error', 'Weekly Focus not found.');
        }
        return view('manageWeeklyFocusView.EditWeeklyFocusView', compact('weeklyFocus'));
    }

    public function EditWeeklyFocusView(Request $request, $wf_id)
    {
        $validatedData = $request->validate([
            'startdate' => 'required|date',
            'enddate' => 'required|date',
            'block' => 'required|string',
            'inputinfo' => 'required|array',
            'inputinfo.*' => 'required|string',
        ]);

        $weeklyFocus->WF_StartDate = $validatedData['startdate'];
        $weeklyFocus->WF_EndDate = $validatedData['enddate'];
        $weeklyFocus->WF_FocusBlock = $validatedData['block'];
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

            if ($user->mentor) {
                $weeklyFocus->M_IC = $user->mentor->M_IC;
            } else {
                $weeklyFocus->M_IC = null;
            }
        }
        $weeklyFocus->save();
        return redirect()->route('WeeklyFocus.view')->with('success', 'Weekly Focus updated successfully.');
    }

    public function SearchWeeklyFocusView(Request $request)
    {
        // Retrieve the search input
        $search = $request->input('search');

        // Query the database based on the search input
        $platinum = Platinum::query()
            ->where('P_Name', 'LIKE', "%{$search}%")
            ->orWhere('P_Status', 'LIKE', "%{$search}%")
            ->get();

        // Return the view with the search results
        return view('manageWeeklyFocusView.SearchWeeklyFocusView')->with('platinums', $platinum);
    }

    //not finished yet
    public function FeedbackWFView(){   
        $platinum = Platinum::all();
        $weeklyFocus = WeeklyFocus::all();

        //validatedData[WF_Feedback]

        return view('manageWeeklyFocusView.FeedbackWFView')
            ->with('weeklyFocus', $weeklyFocus)
            ->with('platinums', $platinum);
    }

    public function ListPlatinumWFView(){
        $platinum = Platinum::where('P_Status', 'Platinum')->get();

        return view('manageWeeklyFocusView.ListPlatinumWFView')->with('platinums', $platinum);
    }

}

