<?php

namespace App\Http\Controllers;

use App\Album;
use App\AudioFile;
use App\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class AudioFilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $folders = Storage::directories('public');

        return view('admin.edit.audiofilelist', [
            'folders' => $folders
        ]);

        return $folders;


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $folders = Folder::all();

        return view('admin.add.audiofile', [
            'folders' => $folders
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

        $folder = Folder::find($request['folder_id']);
        $files = Input::file('files');

        foreach ($files as $file){

            $fileName = str_random(8);
            $fullFileName = $fileName . '.' . $file->extension();

            $path = $file->storeAs('public/'.$folder->name, $fullFileName);

            $folder->AudioFiles()->create([
                'name' => $file->getClientOriginalName(),
                'path' => $path
            ]);
        } // end foreach

        return redirect()->route('audioFiles.create')
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
        // Here $id is the Array Index of the Folder Array
        $folders = Storage::directories('public');

        $selectedFolder = $folders[$id];

        $files = Storage::allFiles($selectedFolder);

        return $files;

        return view('admin.edit.playaudiofile', [
            'file' => $file
        ]);

    }


    public function playAudio($id){

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
