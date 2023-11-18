<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DailyProgress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Stroage;

class ProgressDailyController extends Controller
{
    public function index()
    {
        // Retrieve journals for the logged-in Daie
        $user = Auth::user();
        $progressdaily = $user->progressdaily;
        return view('ManageDailyProgress.index', compact('progressdaily'));
    }

    public function create()
    {
        return view('ManageDailyProgress.create');
    }

    public function store(Request $request)
    {
        // Validate and store the new journal entry
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|date',
            'question_topic' => 'required|string',
            'question_desc' => 'required|string',
            'status' => 'required|string',
            'attachment' => 'nullable|file',
        ]);

        $attachment = $request->file('attachment');
        $filename = time() . '.' . $attachment->getClientOriginalExtension();
        $attachment->move('assets', $filename);

        Auth::user()->progressdaily()->create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'question_topic' => $request->question_topic,
            'question_desc' => $request->question_desc,
            'status' => $request->status,
            'attachment' => $filename,
        ]);

        return redirect()->route('dailyprogress.index')->with('success', 'Daily Progress added successfully');
    }

    public function edit($id)
    {
        $progressdaily = DailyProgress::findOrFail($id);
        return view('ManageDailyProgress.edit', compact('progressdaily'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|date',
            'question_topic' => 'required|string',
            'question_desc' => 'required|string',
            'status' => 'required|string',
            'attachment' => 'nullable|file',
        ]);
    
        $progressdaily = DailyProgress::findOrFail($id);
    
        if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment');
            $filename = time() . '.' . $attachment->getClientOriginalExtension();
            $attachment->move('assets', $filename);
        } else {
            $filename = $progressdaily->attachment;
        }
    
        $progressdaily->update([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'question_topic' => $request->question_topic,
            'question_desc' => $request->question_desc,
            'status' => $request->status,
            'attachment' => $filename,
        ]);

        return redirect()->route('dailyprogress.index')->with('success', 'Daily Progress updated successfully');
    }

    public function view($id)
    {
        $progressdaily = DailyProgress::find($id);
        return view('ManageDailyProgress.view', compact('progressdaily'));
    }

    public function destroy($id)
    {
        $progressdaily = DailyProgress::findOrFail($id);
        $progressdaily->delete();

        return redirect()->route('dailyprogress.index')->with('success', 'Daily Progress deleted successfully');
    }

    public function downloadFile(Request $request, $attachment){
        return response()->download (public_path('assets/'.$attachment));
    }
}
