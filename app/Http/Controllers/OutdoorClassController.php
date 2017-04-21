<?php

namespace App\Http\Controllers;

use App\OutdoorClass;
use Illuminate\Http\Request;

class OutdoorClassController extends Controller
{

    // For Web Visitors
    public function display(){
        $outdoorClasses = OutdoorClass::all();

        return view('users.outdoorclasslist', ['outdoorClasses' => $outdoorClasses]);
    }

    // For Web Visitors
    public function displayOne($id){
        $outdoorClass = OutdoorClass::find($id);

        return view('users.outdoorclass', ['outdoorClass' => $outdoorClass]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outdoorClasses = OutdoorClass::all();

        return view('admin.edit.outdoorclasslist', ['outdoorClasses' => $outdoorClasses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.add.outdoorclass');
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
            'class_name' => 'required',
            'place' => 'required',

        ]);

        OutdoorClass::create([
            'class_name' => $request['class_name'],
            'place' => $request['place'],
            'other_description' => $request['other_description'],
            'contactInfo' => $request['contactInfo']
        ]);

        return redirect()->route('outdoorClass.create')
            ->with('success', 'Successfully Saved');
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
        $outdoorClass = OutdoorClass::find($id);

        return view('admin.edit.outdoorclass',
            ['outdoorClass' => $outdoorClass]);
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
        $outdoorClass = OutdoorClass::find($id);

        $outdoorClass->class_name  =  $request['class_name'];
        $outdoorClass->place  =  $request['place'];
        $outdoorClass->other_description  =  $request['other_description'];
        $outdoorClass->contactInfo  =  $request['contactInfo'];

        $outdoorClass->update();

        return redirect()->route('outdoorClass.edit',
            ['id' => $outdoorClass->id])
            ->with('success' , 'Successfully Updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $outdoorClass = OutdoorClass::find($id);

        $outdoorClass->delete();

        return redirect()->route('outdoorClass.list')
                    ->with('success', 'Successfully Deleted!');


    }
}
