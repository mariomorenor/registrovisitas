<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Teen;
use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $teens = Teen::all();
        return view("records.create")->with(["teens" => $teens]);
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
    public function show(Record $record, Request $request)
    {
        if ($request->has("delete")) {
            return view("records.delete")->with(["record" => $record]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Record $record)
    {
        $teens = Teen::all();
        return view("records.edit")->with(["record" => $record, "teens" => $teens]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Record $record)
    {
        $record->fill($request->all());
        $record->save();

        return redirect()->route("records.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Record $record)
    {
        $record->delete();

        return redirect()->route("records.index");
    }


    public function upload(Request $request)
    {

        if ($request->has('file')) {
            $attachment_name = $request->file('file')->getClientOriginalName();
            $path = Storage::putFile(
                "records/$request->code",
                $request->file('file'),
            );

            $record = Record::find($request->record_id);

            $record->attachments()->create([
                "name" => $attachment_name,
                "path" => $path
            ]);
        }
        return response()->json(["msg" => "Ok"]);
    }

}
