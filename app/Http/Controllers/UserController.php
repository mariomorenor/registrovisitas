<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('roles')->get();
        return view("users.index")->with(["users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->fill($request->all());
        $user->save();

        $user->assignRole($request->role);

        return redirect()->route("users.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user, Request $request)
    {
        if ($request->has("delete")) {
            return view("users.delete")->with(["user" => $user]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view("users.edit")->with(['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->fill($request->except('password'));

        if ($request->has('password') && $request->password != null) {
            $user->password = $request->password;
        }

        $user->save();
        $user->syncRoles([$request->role]);

        return redirect()->route("users.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route("users.index");
    }
}
