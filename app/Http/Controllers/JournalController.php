<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Journal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Stroage;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;


class JournalController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $journals = $user->journals()->paginate(5);
        return view('ManageJournal.index', compact('journals'));
    }

    public function ReportJournal()
    {
        $journalsD = Journal::paginate(5);
        $Totaljournal = Journal::count();
        $TotalJournalMonth = Journal::whereMonth('created_at', Carbon::now()->month)->count();

        return view('ManageJournal.report', compact('Totaljournal','journalsD','TotalJournalMonth'));
    }

    public function create()
    {
        return view('ManageJournal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|date',
            'place' => 'required|string',
            'status' => 'required|string',
            'attachment' => 'nullable|file',
        ]);

        $attachment = $request->file('attachment');
        $filename = time() . '.' . $attachment->getClientOriginalExtension();
        $attachment->move('assets', $filename);

        Auth::user()->journals()->create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'place' => $request->place,
            'status' => $request->status,
            'attachment' => $filename,
        ]);
        Alert::success('Congrats','You have Added the data Successfully');
        return redirect()->route('journals.index')->with('success', 'Journal added successfully');
    }

    public function edit($id)
    {
        $journal = Journal::findOrFail($id);
        return view('ManageJournal.edit', compact('journal'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|date',
            'place' => 'required|string',
            'status' => 'required|string',
            'attachment' => 'nullable|file',
        ]);
    
        $journal = Journal::findOrFail($id);
    
        if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment');
            $filename = time() . '.' . $attachment->getClientOriginalExtension();
            $attachment->move('assets', $filename);
        } else {
            $filename = $journal->attachment;
        }
    
        $journal->update([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'place' => $request->place,
            'status' => $request->status,
            'attachment' => $filename,
        ]);
        Alert::success('Congrats','You have Updated the data Successfully');
        return redirect()->route('journals.index')->with('success', 'Journal updated successfully');
    }

    public function view($id)
    {
        $journal = Journal::find($id);
        return view('ManageJournal.view', compact('journal'));
    }

    public function destroy($id)
    {
        $journal = Journal::findOrFail($id);
        $journal->delete();

        return redirect()->route('journals.index')->with('success', 'Journal deleted successfully');
    }

    public function downloadFile(Request $request, $attachment){
        return response()->download (public_path('assets/'.$attachment));
    }

    public function viewFile(Request $request, $attachment){
        return response()->file (public_path('assets/'.$attachment));
    }


    public function searchData(Request $request)
    {
        $search = $request->input('search');

    
        // Check if there is a search query
        if ($search) {
            $journalsD = Journal::where('title', 'like', "%$search%")->paginate(5);
        } else {
            // If there's no search query, retrieve all users with pagination
            $journalsD = Journal::paginate(5);
        }

        $Totaljournal = Journal::count();
        $TotalJournalMonth = Journal::whereMonth('created_at', Carbon::now()->month)->count();

        return view('ManageJournal.report', compact('Totaljournal','journalsD','TotalJournalMonth'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

    
        // Check if there is a search query
        if ($search) {
            $journals = Journal::where('title', 'like', "%$search%")->paginate(5);
        } else {
            // If there's no search query, retrieve all users with pagination
            $journals = Journal::paginate(5);
        }

        return view('ManageJournal.index', compact('journals'));
    }
}
