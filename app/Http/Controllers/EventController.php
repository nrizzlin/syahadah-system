<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        // Retrieve journals for the logged-in Daie
        $events = Event::all();
        return view('ManageEvents.index', compact('events'));
    }

    public function list()
    {
        // Retrieve journals for the logged-in Daie
        $events = Event::all();
        return view('ManageEvents.list', compact('events'));
    }

    public function create()
    {
        return view('ManageEvents.create');
    }

    public function store(Request $request)
    {
        // Validate and store the new journal entry
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|date',
            'attachment' => 'nullable|file',
        ]);

        Auth::user()->events()->create($request->all());

        return redirect()->route('event.index')->with('success', 'Journal updated successfully');
    }

    public function edit($id)
    {
        $events = Event::findOrFail($id);
        return view('ManageEvents.edit', compact('events'));
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

        $events = Event::findOrFail($id);
        $events->update($request->all());

        return redirect()->route('event.index')->with('success', 'Journal updated successfully');
    }

    public function view($id)
    {
        $events = Event::find($id);
        return view('ManageEvents.view', compact('events'));
    }

    public function destroy($id)
    {
        $events = Event::findOrFail($id);
        $events->delete();

        return redirect()->route('event.index')->with('success', 'Journal deleted successfully');
    }

    public function viewlist($id)
    {
        $events = Event::findOrFail($id);
        return view('ManageEvents.view_list', compact('events'));
    }
}
