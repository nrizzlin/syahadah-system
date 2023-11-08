<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // Retrieve journals for the logged-in Daie
        $users = User::all();
        return view('ManageUser.create', compact('users'));
    }

    public function store(Request $request)
    {
        // Validate and store the new journal entry
        User::create($request->all());

        return redirect()->back()->with('success', 'User added successfully');
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('ManageUser.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $users->update($request->all());

        return redirect()->route('list_users')->with('success', 'User updated successfully');
    }

    public function view($id)
    {
        $users = User::findOrFail($id);
        return view('ManageUser.view_user', compact('users'));
    }

    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect()->back()->with('success', 'Journal deleted successfully');
    }
    
}
