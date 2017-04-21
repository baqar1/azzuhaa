<?php

namespace App\Http\Controllers;

use App\EventType;
use Illuminate\Http\Request;

class EventTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventTypes = EventType::all();

        return view('admin.edit.eventtypeslist', ['eventTypes' => $eventTypes]);
    }

    protected function validator(array $data){
        return Validator::make($data, [
            'event_name' => 'required|max:255'

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return redirect()->route('eventtype.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'event_name' => 'required|min:2|max:255'

        ]);

        EventType::create([
            'event_name' => $request['event_name']

        ]);

        return redirect()->route('eventtype.create')->with('success', 'Successfully Recorded!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eventType = EventType::where('id', $id)->first();

        //return $eventType;
        return view('admin.edit.editeventtype', ['eventType' => $eventType]);
        //return redirect()->route('eventType.edit', ['eventType' => $eventType]);
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
        $eventType = EventType::find($id);

        $eventType->event_name = $request['event_name'];

        $eventType->save();

        return redirect()->route('eventType.edit', ['eventType' => $eventType])
            ->with('success', 'Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eventType = EventType::find($id);

        $eventType->delete();

        return redirect()->route('eventType.list')->with('success', 'Successfully Deleted!');
    }
}
