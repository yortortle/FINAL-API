<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Entry;
use App\Http\Resources\Entry as EntryResource;


class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get Entries
        $entries = Entry::paginate(15);

        // Return Collection of entries as a resource
        return EntryResource::collection($entries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $entry = Entry::findOrFail($id);

        // $entry = $request->isMethod('put') ? Entry::findOrFail($request->entry_id) : new Entry;

        $entry = $request->isMethod('put') ? Entry::findOrFail($request->id) : new Entry;

        // $entry->id = $request->input('entry_id');
        $entry->title = $request->input('title');
        $entry->subject = $request->input('subject');
        $entry->description = $request->input('description');
        $entry->URL = $request->input('URL');
        $entry->cost = $request->input('cost');

        if ($entry->save()) {
          return new EntryResource($entry);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show individual entry
        $entry = Entry::findOrFail($id);

        //Return single Entry as resource
        return new EntryResource($entry);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //destroy individual entry
      $entry = Entry::findOrFail($id);

      if($entry->delete()) {
        return new EntryResource($entry);
      }
    }
}
