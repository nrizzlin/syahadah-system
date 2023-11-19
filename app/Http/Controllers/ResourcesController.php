<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resources;
use Illuminate\Support\Facades\Auth;

class ResourcesController extends Controller
{
    public function index()
    {
        // Retrieve journals for the logged-in Daie
        $resources = Auth::user()->resources;
        return view('ManageResources.index', compact('resources'));
    }

    public function indexUser()
    {
        // Retrieve journals for the logged-in Daie
        $resources = Resources::all();
        return view('ManageResources.list', compact('resources'));
    }

    public function create()
    {
        return view('ManageResources.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'attachment' => 'nullable|file',
        ]);

        $attachment = $request->file('attachment');
        $filename = time() . '.' . $attachment->getClientOriginalExtension();
        $attachment->move('assets', $filename);

        Auth::user()->resources()->create([
            'title' => $request->title,
            'description' => $request->description,
            'attachment' => $filename,
        ]);

        return redirect()->route('resources.index')->with('success', 'Journal updated successfully');
    }

    public function edit($id)
    {
        $resources = Resources::findOrFail($id);
        return view('ManageResources.edit', compact('resources'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
                    
            'title' => 'required|string',
            'description' => 'required|string',
            'attachment' => 'nullable|file',
        ]);

        $resources = Resources::findOrFail($id);
    
        if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment');
            $filename = time() . '.' . $attachment->getClientOriginalExtension();
            $attachment->move('assets', $filename);
        } else {
            $filename = $events->attachment;
        }
    
        $resources->update([
            'title' => $request->title,
            'description' => $request->description,
            'attachment' => $filename,
        ]);

        return redirect()->route('resources.index')->with('success', 'Journal updated successfully');
    }

    public function view($id)
    {
        $resources = Resources::find($id);
        return view('ManageResources.view', compact('resources'));
    }

    public function destroy($id)
    {
        $resources = Resources::findOrFail($id);
        $resources->delete();

        return redirect()->route('resources.index')->with('success', 'Journal deleted successfully');
    }

    public function viewlist($id)
    {
        $resources = Resources::findOrFail($id);
        return view('ManageResources.view_list', compact('resources'));
    }

    public function downloadFile(Request $request, $attachment){
        return response()->download (public_path('assets/'.$attachment));
    }

    public function viewFile(Request $request, $attachment){
        return response()->file (public_path('assets/'.$attachment));
    }
}
