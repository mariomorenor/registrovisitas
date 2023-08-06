<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
    public function update(UserRequest $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->has('image')) {
            $path = Storage::putFileAs(
                'users/avatars',
                $request->file('image'),
                "avatar" . Auth::user()->id . "." . $request->file('image')->extension()
            );
            $user->image = $path;
        }

        if ($request->has('password') && $request->password != null) {
            $user->password = $request->password;
        }

        $user->save();

        if ($request->has('role')) {
            $user->syncRoles([$request->role]);
        }

        if ($request->has("profile")) {
            return redirect()->route("profile");
        }

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

    function profile()
    {
        $user = Auth::user();
        return view("users.profile")->with(["user" => $user]);
    }
}
