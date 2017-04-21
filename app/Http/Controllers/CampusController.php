<?php

namespace App\Http\Controllers;

use App\Campus;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CampusController extends Controller
{
    // For Web Visitors
    public function display(){
        $campuses = Campus::all();

        return view('users.campuslist', ['campuses' => $campuses]);

    }

    public function displayOne($id){
        $campus = Campus::find($id);

        return view('users.campus', ['campus' =>  $campus]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $campuses = Campus::all();

        return view('admin.edit.campuslist', ['campuses' => $campuses]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('admin.add.campus');
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
            'name' => 'required',
            'address' => 'required',
            'lat' => 'required',
            'lng' => 'required',

        ]);


        $campus = Campus::create([
            'name' => $request['name'],
            'address' => $request['address'],
            'lat' => $request['lat'],
            'lng' => $request['lng'],

        ]);

        return redirect()->route('campus.add')->with('success', 'Successfuly Saved!');
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
        $campus = Campus::find($id);

        return view('admin.edit.campus', ['campus' =>  $campus]);
        //return view::make('admin.edit.campus', compact('campus'));
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
        $campus = Campus::find($id);

        $campus->name = $request['name'];
        $campus->address  =  $request['address'];
        $campus->lat  =  $request['lat'];
        $campus->lng  =  $request['lng'];

        $campus->update();

        return redirect()->route('campus.edit', ['campus' => $campus->id])->with('success', 'Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $campus = Campus::find($id);

        $campus->delete();



        return redirect()->route('campuses.list')->with('success', 'Successfully Deleted!');

    }
}
