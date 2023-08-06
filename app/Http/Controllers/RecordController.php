<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Teen;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Record::all();
        return view("records.index")->with(["records" => $records]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $code = Record::max("code") ?? 1;
        $str_code = str_pad($code, 4, "0", STR_PAD_LEFT);

        $teens = Teen::all();
        return view("records.create")->with(["code" => $str_code, "teens" => $teens]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $record = new Record();

        $record->fill($request->all());
        $record->save();

        return redirect()->route("records.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Record $record)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Record $record)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Record $record)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Record $record)
    {
        //
    }
}
