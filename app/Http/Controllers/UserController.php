<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{


public function index()
{
    $users = User::all();
    return view('user.index', compact('users'));
}

public function create()
{
    return view('user.create');
}

public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            "title" => ['required'],
            "description" => ['required'],
            "year"  => ['required', 'numeric'],
            "author"  => ['required'],
        ]);

        $new = User::create($request->all());
        return redirect()->route('user.index')->with('success', $new->title . " berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::find($id);
    return view('user.edit', compact('users', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $users = User::find($id);
        $users->update($request->all());

    return redirect()->route('user.index')->with('success', 'Repository updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::findOrFail($id);
        $users->delete();

    return redirect()->route('user.index')->with('success', 'Repository deleted successfully');
    }


}
