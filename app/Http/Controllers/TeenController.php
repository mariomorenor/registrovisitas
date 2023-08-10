<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Teen;
use Illuminate\Http\Request;

class TeenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teens = Teen::all();
        return view("teens.index")->with(["teens" => $teens]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nationalities = Teen::all()->pluck("nationality");
        $contacts = Contact::all();
        return view("teens.create")->with(["contacts" => $contacts, "nationalities" => $nationalities]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $teen = new Teen();
        $teen->fill($request->all());
        $teen->save();

        return redirect()->route("teens.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Teen $teen, Request $request)
    {
        if ($request->has("delete")) {
            return view("teens.delete")->with(["teen" => $teen]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teen $teen)
    {
        $nationalities = Teen::all()->pluck("nationality");
        $contacts = Contact::all();
        return view("teens.edit")->with(["teen" => $teen, "nationalities" => $nationalities, "contacts" => $contacts]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teen $teen)
    {
        $teen->fill($request->all());
        $teen->save();

        return redirect()->route("teens.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teen $teen)
    {
        try {
            $teen->delete();
            return redirect()->route("teens.index");
        } catch (\Illuminate\Database\QueryException $th) {
            $records = $teen->records->pluck("code");

            $msg = " El registro que intenta eliminar está relacionado con:";
            $model = "Casos";
            return view("layouts.constraint_delete")->with(["msg" => $msg, "model" => $model, "records" => $records]);
        }
    }
}
