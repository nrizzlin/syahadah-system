<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Journal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Stroage;


class JournalController extends Controller
{
    public function index()
    {
        // Retrieve journals for the logged-in Daie
        $user = Auth::user();
        $journals = $user->journals;
        return view('ManageJournal.index', compact('journals'));
    }

    public function create()
    {
        return view('ManageJournal.create');
    }

    public function store(Request $request)
    {
        // Validate and store the new journal entry
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
}
