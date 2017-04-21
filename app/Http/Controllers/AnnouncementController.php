<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{


    // For Web Visitors
    public function display(){
        $announcements = Announcement::all();

        //return $announcements;


        return view('users.announcementlist', ['announcements' => $announcements]) ;
    }

    public function ShowAnnouncement($id){
        $announcement = Announcement::find($id);

        //return $announcement;

        return view('users.announcement', ['announcement' => $announcement]);


    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = Announcement::all();

        return view('admin.edit.Announcements', ['announcements' => $announcements]) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add.announcement');
    }

    protected function validator(array $data){
        return Validator::make($data, [
            'title' => 'required|max:255',
            'description' => 'required|max:255',


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
        $announcement = new Announcement();

        $announcement->title = $request['title'];
        $announcement->description = $request['description'];

        $announcement->save();

        return redirect()->route('announcement.add')->with('success', 'Record Successfully Saved!');

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
        $announcement = Announcement::where('id' , $id)->first();

        return view('admin.edit.announcement', ['announcement' => $announcement]);
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
        $announcement = Announcement::findorFail($id);

        $announcement->title = $request['title'];
        $announcement->description = $request['description'];
        $announcement->update();

        return redirect()->route('announcement.edit', ['id' => $announcement->id ])->with('success', 'Successfully  Update!');

        //return 'Successfully Updated!';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $announcement = Announcement::find($id);

        $announcement->delete();

        return redirect()->route('announcement.editing.list');
    }
}
