<?php

namespace App\Http\Controllers;


use App\Album;
use App\Campus;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class AlbumsController extends Controller
{

    // For Web Visitors
    public function display(){
        $campuses = Campus::all();

        $albums = Album::all();


        return view('users.photogallerylist', [
            'campuses' => $campuses,
            'albums' => $albums
        ]);
    }

    public function displayOne($id){

        $album = Album::find($id);
        $campus = Campus::find($album->campus_id);
        $photos = $album->photos()->get();


        //return $photos;

        return view('users.photogallery', [
            'album' => $album,
            'campus' => $campus,
            'photos' => $photos
        ]);


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $campuses = Campus::all();

        $albums = Album::all();


        return view('admin.edit.photogallerylist', [
            'campuses' => $campuses,
            'albums' => $albums
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $campuses = Campus::all();



        return view('admin.add.photogallery', ['campuses' => $campuses]);
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
            'campus_id' => 'required',
            'name' => 'required',
            'date' => 'required'
        ]);



        $album = Album::create([
            'campus_id' => $request['campus_id'],
            'name' => $request['name'],
            'date' => $request['date'],

            'description' => $request['description'],
        ]);

        $photos = Input::file('photos');
        foreach ($photos as $photo){


            $filename = str_random(8) . '.' . $photo->extension();
            $path =  $photo->storeAs('public/albums', $filename);

            $album->Photos()->create([
                'image' => $path
            ]);

        }


        return redirect()->route('albums.create')->with('success', 'Successfully Saved!');


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
        $album = Album::find($id);
        $campuses = Campus::all();


        return view('admin.edit.photogallery',[
            'album' => $album,
            'campuses' => $campuses

        ]);
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
        $album = Album::find($id);

        $album->campus_id = $request['campus_id'];

        $album->name = $request['name'];
        $album->date = $request['date'];
        $album->description = $request['description'];

        $album->update();

        return redirect()->route('albums.edit',[
            'id' => $album->id,

        ])->with('success' , 'Successfully Updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $album = Album::find($id);




        // Deleting photos from storage
        $photos = $album->photos()->get();



        foreach ($photos as $photo){
            Storage::delete($photo->image);
        }

        $album->delete();

        return redirect()->route('albums.index')
                ->with('success', 'Successfully Delete!');
    }
}
