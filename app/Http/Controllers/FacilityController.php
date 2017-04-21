<?php

namespace App\Http\Controllers;

use App\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{

    // For Web Visitors
    public function display(){
        $facilities = Facility::all();

        //return $facilities;
        return view('users.facilitylist', ['facilities' => $facilities]);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilities = Facility::all();

        //return $facilities;
        return view('admin.edit.facility', ['facilities' => $facilities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/add/facility');
    }

    protected function validator(array $data){
        return Validator::make($data, [
            'facility_name' => 'required|max:255'

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$facility = new Facility();

        //$facility->facility_name = $request['facility_name'];
        Facility::create([
           'facility_name' => $request['facility_name']
        ]);

        return redirect()->route('facility.add')->with('success', 'Record Successfully Saved!');

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
        $facility = Facility::where('id' , $id)->first();

        //return $facility;
        return view('admin.edit.editfacility', ['facility' => $facility]);
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

        $facility = Facility::findorFail($id);

        $facility->facility_name =  $request['facility_name'];

        $facility->update();

        return redirect()->route('facility.edit', ['id' => $facility->id ])->with('success', 'Successfully Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facility = Facility::find($id);

        $facility->delete();

        return redirect()->route('facility.editing.list')->with('success', 'Successfully Deleted!');

    }
}
