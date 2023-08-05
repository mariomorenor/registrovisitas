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
        $contacts = Contact::all();
        return view("teens.create")->with(["contacts" => $contacts]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Teen $teen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teen $teen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teen $teen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teen $teen)
    {
        //
    }
}
