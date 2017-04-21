<?php

namespace App\Http\Controllers;

use App\LectureSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class LectureScheduleController extends Controller
{

    // For Web Visitors
    public function display(){
        $lectureSchedules = LectureSchedule::all();

        //return $lectureSchedules;
        return view('users.lectureschedule',[
            'lectureSchedules' => $lectureSchedules
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lectureSchedules = LectureSchedule::all();


        //return $lectureSchedules;
        return view('admin.edit.lectureschedule',[
                'lectureSchedules' => $lectureSchedules
            ]);

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

        $ids = Input::get('lectureScheduleId');

        $titles = Input::get('title');
        $times = Input::get('time');
        $dates = Input::get('date');
        $durations = Input::get('duration');

        foreach ($ids as $id) {

            DB::table('lecture_schedules')
                ->where('id', $id)
                ->update([
                    'title' => $titles[$id],
                    'time' => $times[$id],
                    'date' => $dates[$id],
                    'duration' => $durations[$id]
                ]);

        }



        return redirect()->route('lectureSchedule.index')
                ->with('success', 'Successfully Updated!');



        //return $request['lectureScheduleId[1]'];
        //return $lectureSchedule;
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
        //
    }
}
