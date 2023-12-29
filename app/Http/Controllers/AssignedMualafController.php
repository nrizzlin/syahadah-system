<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Specialist;
use App\Models\AssignedMualaf;
use App\Models\EvaluatedMualaf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class AssignedMualafController extends Controller
{
    public function assignMualafToMentor()
    {
        $mentors = User::with('specialist')->where('usertype', 'like', '%mentor%')->get();
        $mualafs = User::where('usertype', 'like', '%mualaf%')->get();
        $mualafUsers = User::where('usertype', 'mualaf')->get();

        return view('AssignedMualaf.index', compact('mentors', 'mualafs','mualafUsers'));
    }

    public function indexMentor()
    {
        $mentorId = Auth::id();

        // Fetch the assigned Mualaf data for the current mentor
        $assignedMualaf = AssignedMualaf::with(['mentor', 'mualaf'])->where('mentor_id', $mentorId)->get();
        
        // Pass the assigned Mualaf data to the view
        return view('AssignedMualaf.indexMentor', compact('assignedMualaf'));
    }

    public function reportPerformance()
    {
        $poorCount = EvaluatedMualaf::where('result_status', 'Poor')->count();
        $goodCount = EvaluatedMualaf::where('result_status', 'Good')->count();
        $excellentCount = EvaluatedMualaf::where('result_status', 'Excellent')->count();
    
        // Fetch data for the table
        $assignedMualafs = AssignedMualaf::with(['mualaf', 'mentor', 'evaluations']) // Change 'mentors' to 'mentor'
            ->orderBy('created_at', 'desc')
            ->get();
    
        return view('AssignedMualaf.report', compact('poorCount', 'goodCount', 'excellentCount', 'assignedMualafs'));
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
        $user->mentors()->attach($mentorIds);
        Alert::success('Congrats','You Already Assign The Mualaf Successfully');
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

    public function MualafInfo($id)
    {
        // Fetch details of the Mualaf and Mentor based on the assigned ID
        $assignment = AssignedMualaf::with(['mentor', 'mualaf'])->find($id);
        $dailyProgress = $assignment->mualaf->progressDaily;
        
        // Pass details to the view
        return view('AssignedMualaf.mualafInfo', compact('assignment','dailyProgress'));
    }

    public function create($assignmentId)
    {
        $assignment = AssignedMualaf::with(['mentor', 'mualaf'])->find($assignmentId);
        
        return view('AssignedMualaf.evaluateMualaf', compact('assignment'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'performance' => 'required|array',
            'note' => 'required|string',
            'assigned_id' => 'required|exists:assigned_mualaf,id',
        ]);

        // Count the total number of performance categories
        $totalPerformanceCategories = count(config('performance.categories'));

        // Calculate the total performance based on the checked checkboxes
        $checkedPerformanceCount = count($request->input('performance'));

        // Calculate the percentage
        $percentage = ($checkedPerformanceCount / $totalPerformanceCategories) * 100;

        // Determine the result status
        $resultStatus = 'Poor';
        if ($percentage >= 70) {
            $resultStatus = 'Excellent';
        } elseif ($percentage >= 50) {
            $resultStatus = 'Good';
        }

        // Create a new EvaluatedMualaf instance with the result status
        $evaluation = new EvaluatedMualaf([
            'date' => $request->input('date'),
            'performance' => implode(',', $request->input('performance')),
            'note' => $request->input('note'),
            'assigned_id' => $request->input('assigned_id'),
            'result_status' => $resultStatus,
        ]);

        // Save the evaluation
        $evaluation->save();
        Alert::success('Congrats','You have evaluate mualaf the data Successfully');
        // You can redirect the user to a success page or do something else
        return redirect()->route('assign.listMentor')->with('success', 'Evaluation stored successfully.');
    }


        public function listPerformance()
    {
        // Get the current mentor's ID
        $mentorId = Auth::id();

        // Fetch the assigned Mualaf IDs for the current mentor
        $assignedMualafIds = AssignedMualaf::where('mentor_id', $mentorId)
            ->pluck('mualaf_id');

        // Fetch performances for all mentors associated with the same Mualaf IDs
        $assignedMualafs = AssignedMualaf::with(['mentor', 'mualaf', 'evaluations'])
        ->whereIn('mualaf_id', $assignedMualafIds)
        ->get();

        // Pass the assigned Mualaf data to the view
        return view('AssignedMualaf.listPerformance', compact('assignedMualafs'));
    }


    public function viewPerformanceDetail($id)
    {
        // Fetch details of the Mualaf and Mentor based on the assigned ID
        $assignedMualaf = AssignedMualaf::with(['mentor', 'mualaf', 'evaluations'])->find($id);
        $specialists = Specialist::all();

        // Pass details to the view
        return view('AssignedMualaf.performanceInfo', compact('assignedMualaf', 'specialists'));
    }

}

