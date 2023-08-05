<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();

        return view("contacts.index")->with(['contacts' => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("contacts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $contact = new Contact();
        $contact->fill($request->all());

        $contact->save();

        return redirect()->route("contacts.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact, Request $request)
    {
        if ($request->has("delete")) {
            return view("contacts.delete")->with(["contact" => $contact]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view("contacts.edit")->with(["contact" => $contact]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $contact->fill($request->all());
        $contact->save();

        return redirect()->route("contacts.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route("contacts.index");
    }
}
