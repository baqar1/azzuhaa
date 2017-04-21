<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseType;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    // For Web Visitors
    public function display(){
        $courseTypes = CourseType::with('courses')->get();

        //return $courseTypes;
        return view('users.courselist', ['courseTypes' => $courseTypes]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courseTypes = CourseType::with('courses')->get();

        //return $courseTypes;
        return view('admin.edit.courselist', ['courseTypes' => $courseTypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courseTypes = CourseType::all();

        //return $courseTypes;

        return view('admin.add.course', ['courseTypes' => $courseTypes]);
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
            'name' => 'required|min:2'
        ]);

        $courseType = CourseType::find($request['courseTypeId']);

        $courseType->courses()->create([
            'name' => $request['name'],
            'description' => $request['description']

        ]);

        return redirect()->route('course.create')
                    ->with('success', 'Successfully Saved!');


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

        $courseTypes = CourseType::all();

        $course = Course::find($id);

        return view('admin.edit.course', [
                    'course' => $course,
                    'courseTypes' => $courseTypes]);
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
        $course = Course::find($id);

        $this->validate($request, [
            'name' => 'required'
        ]);

        $course->name  =  $request['name'];
        $course->description  =  $request['description'];

        $course->update();

        return redirect()->route('course.edit', ['id' => $course->id])
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
        $course = Course::find($id);

        $course->delete();


        return redirect()->route('course.index')
                    ->with('success', 'Successfully Deleted!');

    }
}
