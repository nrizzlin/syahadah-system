<?php

namespace App\Http\Controllers\Daie;

use Illuminate\Http\Request;
use App\Models\Journal;
use Illuminate\Support\Facades\Auth;


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

        Auth::user()->journals()->create($request->all());

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
            
            'description' => 'required|string',
            'date' => 'required|date',
            'place' => 'required|string',
            'status' => 'required|string',
            'attachment' => 'nullable|file',
        ]);

        $journal = Journal::findOrFail($id);
        $journal->update($request->all());

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
}
