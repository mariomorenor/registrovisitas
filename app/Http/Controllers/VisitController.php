<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visits = Visit::all();
        return view("visits.index")->with(["visits" => $visits]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $records = Record::all();
        return view("visits.create")->with(["records" => $records]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $visit = new Visit();
        $visit->fill($request->all());
        $visit->save();

        return redirect()->route("visits.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Visit $visit, Request $request)
    {
        if ($request->has("delete")) {
            return view("visits.delete")->with(["visit" => $visit]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visit $visit)
    {
        $records = Record::all();
        return view("visits.edit")->with(["visit" => $visit, "records" => $records]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visit $visit)
    {
        $visit->fill($request->all());
        $visit->save();

        return redirect()->route("visits.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visit $visit)
    {
        $visit->delete();
        return redirect()->route("visits.index");
    }
}
