<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventType;
use Illuminate\Http\Request;

class EventController extends Controller
{



    // To get All Event Types

    public function eventTypes(){
        $eventTypes = EventType::all();

        return view('admin.add.event', ['eventTypes' => $eventTypes]);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventTypes = EventType::with('events')->get();

        //return $events;
        return view('admin.edit.eventslist', ['eventTypes' => $eventTypes]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eventTypes = EventType::all();

        return view('admin.add.event', ['eventTypes' => $eventTypes]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request, [
            'eventTypeId' => 'required',
            'title' => 'required|min:4|max:255',
            'place' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',

        ]);


        $eventType = EventType::find($request['eventTypeId']);

        $eventType->events()->create([
            'title' => $request['title'],
            'place' => $request['place'],
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date']

        ]);

        //return 'Successfully Created!';
        return redirect()->route('event.create')->with('success', 'Record Successfully Saved!');
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
        $event = Event::find($id);
        $eventTypes = EventType::all();


        //return ['event' => $event, 'eventTypes' => $eventTypes];
        return view('admin.edit.event', ['event' => $event, 'eventTypes' => $eventTypes]);

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
        $event = Event::find($id);

        $event->event_type_id = $request['eventTypeId'];
        $event->title  = $request['title'];
        $event->start_date  = $request['start_date'];
        $event->end_date  = $request['end_date'];
        $event->place  = $request['place'];

        $event->update();

        return redirect()->route('event.edit', ['event_id' => $event->id])->with('success', 'Successfully Updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    // To Delete a Record
    public function deleteEvent($id){
        $event = Event::find($id);

        $event->delete();

        $event = Event::all();

        return redirect()->route('events.list')->with('success', 'Successfully Deleted!');
    }
}
