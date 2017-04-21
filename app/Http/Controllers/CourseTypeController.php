<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseType;
use Illuminate\Http\Request;

class CourseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courseTypes = CourseType::all();

        return view('admin.edit.coursetypelist', ['courseTypes' => $courseTypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.add.coursetype');
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

        CourseType::create([
            'name' => $request['name']
        ]);

        return redirect()->route('courseType.create')
            ->with('success', 'Successfully saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courseType = CourseType::find($id);

        //return $courseType;
        return view('admin.edit.coursetype', ['courseType' => $courseType]);
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
        $courseType = CourseType::find($id);

        $this->validate($request, [
            'name' => 'required|min:2'
        ]);

        $courseType->name = $request['name'];

        $courseType->update();

        return redirect()->route('courseType.edit', ['id' => $courseType->id])
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
        $courseType = CourseType::find($id);

        $courseType->delete();

        return redirect()->route('courseType.index')
            ->with('success', 'Successfully Deleted!');
    }
}
