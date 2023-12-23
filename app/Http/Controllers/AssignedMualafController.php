<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Specialist;
use App\Models\AssignedMualaf;
use Illuminate\Http\Request;


class AssignedMualafController extends Controller
{
    public function assignMualafToMentor()
    {
        $mentors = User::with('specialist')->where('usertype', 'like', '%mentor%')->get();
        $mualafs = User::where('usertype', 'like', '%mualaf%')->get();
        $mualafUsers = User::where('usertype', 'mualaf')->get();

        return view('AssignedMualaf.index', compact('mentors', 'mualafs','mualafUsers'));
    }

    public function storeAssigned(Request $request)
    {
        // Validate the request
        $request->validate([
            'mentors' => 'required|array',
            'mualaf' => 'required|exists:users,id,usertype,mualaf',
        ]);
    
        // Get selected mentors and mualaf
        $mentorIds = $request->input('mentors');
        $mualafId = $request->input('mualaf');
    
        // Attach mentors to the mualaf
        $user = User::find($mualafId);
        $user->mentors()->sync($mentorIds);
    
        // Redirect or return a response
        return redirect()->route('assign.index')->with('success', 'Mentors assigned successfully.');
    }


    public function listAssign()
    {
        $assignedMualaf = AssignedMualaf::with(['mentor', 'mualaf'])->get();
        $specialists = Specialist::all();

        return view('AssignedMualaf.list', compact('assignedMualaf','specialists'));
    }

    public function viewDetail($id)
    {
        // Fetch details of the Mualaf and Mentor based on the assigned ID
        $assignment = AssignedMualaf::with(['mentor', 'mualaf', 'mentor.specialist'])->find($id);
        $specialists = Specialist::all();
        
        // Pass details to the view
        return view('AssignedMualaf.view', compact('assignment','specialists'));
    }
}

