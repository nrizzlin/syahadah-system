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

    public function list()
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
        // Validate and store the new journal entry

        Auth::user()->resources()->create($request->all());

        return redirect()->route('resources.index')->with('success', 'Journal updated successfully');
    }

    public function edit($id)
    {
        $resources = Resources::findOrFail($id);
        return view('ManageEvents.edit', compact('resources'));
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

        $resources = Resources::findOrFail($id);
        $resources->update($request->all());

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
}
