<?php

namespace App\Http\Controllers;

use App\Campus;
use App\ShiftTiming;
use Illuminate\Http\Request;

class ShiftTimingController extends Controller
{
    // For Web Visitors
    public function display(){
        $campuses = Campus::with('shiftTimings')->get();

        return view('users.shifttiminglist',
            ['campuses' => $campuses]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campuses = Campus::with('shiftTimings')->get();

        return view('admin.edit.shifttiminglist',
            ['campuses' => $campuses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $campuses = Campus::all();

        return view('admin.add.shifttiming', ['campuses' => $campuses]);
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
            'shift' => 'required',
            'campus_id' => 'required',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);

        $shiftCheck = ShiftTiming::where('campus_id', $request['campus_id'])
                        ->where('shift', $request['shift'])->get();

        if($shiftCheck->count() > 0){
            $shiftCheck = $shiftCheck->first();
            return redirect()->route('shiftTiming.create')->with('shiftAlreadyExist', $shiftCheck->shift . ' Already Exist in Record!');
        }



        $campus = Campus::find($request['campus_id']);

        $campus->shiftTimings()->create([
            'shift' => $request['shift'],
            'start_time' => $request['start_time'],
            'end_time' => $request['end_time'],
        ]);

        return redirect()->route('shiftTiming.create')->with('success', 'Successfully Saved!');
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
        $shiftTiming = ShiftTiming::find($id);

        $campuses = Campus::all();

        return view('admin.edit.shifttiming',['campuses' => $campuses,
                    'shiftTiming' => $shiftTiming]);

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

        $shiftTiming = ShiftTiming::find($id);

        $shiftTiming->campus_id = $request['campus_id'];
        $shiftTiming->shift = $request['shift'];
        $shiftTiming->start_time = $request['start_time'];
        $shiftTiming->end_time = $request['end_time'];

        $shiftTiming->update();


        return redirect()
                ->route('admin.edit.shifttiming', ['id' => $shiftTiming->id])
                ->with('success', 'Successfully Updated!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shiftTiming = ShiftTiming::find($id);

        $shiftTiming->delete();

        return redirect()
                ->route('shiftTiming.list')
                ->with('success', 'Successfully Deleted!');
    }
}
