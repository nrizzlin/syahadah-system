<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::paginate(5);
        return view('ManageEvents.index', compact('events'));
    }

    public function indexUser()
    {
        $Events = Event::paginate(5);
        return view('ManageEvents.list', compact('Events'));
    }

    public function ReportEvent()
    {
        // Retrieve all users
        $eventsD = Event::paginate(5);
        $Totalevents = Event::count();
        $TotalEventMonth = Event::whereMonth('created_at', Carbon::now()->month)->count();

        return view('ManageEvents.report', compact('Totalevents','eventsD','TotalEventMonth'));
    }

    public function create()
    {
        return view('ManageEvents.create');
    }

    public function store(Request $request)
    {
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
        Alert::success('Congrats','You have Added the data Successfully');
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
        Alert::success('Congrats','You have Updated the data Successfully');
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
            $eventsD = Event::where('title', 'like', "%$search%")->paginate(5);
        } else {
            // If there's no search query, retrieve all users with pagination
            $eventsD = Event::paginate(5);
        }

        $Totalevents = Event::count();

        return view('ManageEvents.report', compact('Totalevents','eventsD'));
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
