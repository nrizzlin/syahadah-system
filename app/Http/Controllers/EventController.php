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
        $events = Event::paginate(5);
        return view('ManageEvents.index', compact('events'));
    }

    public function indexUser()
    {
        // Retrieve journals for the logged-in Daie
        $events = Event::all();
        return view('ManageEvents.list', compact('events'));
    }

    public function ReportEvent()
    {
        // Retrieve all users
        $events = Event::all();
        $Totalevents = Event::count();

        return view('ManageEvents.report', compact('Totalevents','events'));
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

        $attachment = $request->file('attachment');
        $filename = time() . '.' . $attachment->getClientOriginalExtension();
        $attachment->move('assets', $filename);

        Auth::user()->events()->create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'attachment' => $filename,
        ]);

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
            'title' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|date',
            'attachment' => 'nullable|file',
        ]);

        $events = Event::findOrFail($id);
    
        if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment');
            $filename = time() . '.' . $attachment->getClientOriginalExtension();
            $attachment->move('assets', $filename);
        } else {
            $filename = $events->attachment;
        }
    
        $events->update([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'attachment' => $filename,
        ]);

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

    public function eventInfo($id)
    {
        $events = Event::findOrFail($id);
        return view('ManageEvents.view_eventInfo', compact('events'));
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
            $events = Event::where('title', 'like', "%$search%")->paginate(5);
        } else {
            // If there's no search query, retrieve all users with pagination
            $events = Event::paginate(5);
        }


        $Events = Event::all();
        $Totalevents = Event::count();

        return view('ManageEvents.report', compact('Totalevents','Events'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
    
        // Check if there is a search query
        if ($search) {
            $events = Event::where('title', 'like', "%$search%")->paginate(5);
        } else {
            // If there's no search query, retrieve all users with pagination
            $events = Event::paginate(5);
        }

        return view('ManageEvents.index', compact('events'));
    }

}
