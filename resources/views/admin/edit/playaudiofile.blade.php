@extends('layouts.app')

@section('customScript')

    <script src="/mediaelement/mediaelement-and-player.min.js"></script>
    <!-- Add any other renderers you need; see Use Renderers for more information -->
    <link rel="stylesheet" href="/mediaelement/mediaelementplayer.min.css" />
    <script>
        var vid = document.getElementById('myAudio');

        function myFunction(){
            alert('Start: ' + vid.seekable.start(0) +
                ' End: ' + vid.seekable.end(0));
        }


    </script>

    <script>
        /*
        $('video, audio').mediaelementplayer({
            // Do not forget to put a final slash (/)
            pluginPath: 'https://cdnjs.com/libraries/mediaelement/',
            // this will allow the CDN to use Flash without restrictions
            // (by default, this is set as `sameDomain`)
            shimScriptAccess: 'always'
            // more configuration
        });
        */

    </script>



@endsection

@section('style')

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add New Album</div>

                    <div class="panel-body">
                        @if(Session::has('success'))

                            <div class="row">
                                <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                                    <div id="charge-message" class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(Session::has('shiftAlreadyExist'))

                            <div class="row">
                                <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                                    <div id="charge-message" class="form-group has-error ">
                                        {{ Session::get('shiftAlreadyExist') }}
                                    </div>
                                </div>
                            </div>
                        @endif




                            <div class="form-group">

                                <label for="description" class="col-md-4 control-label">Audio Files</label>

                                @foreach($files as $file)
                                    <div class="col-md-10 form-control">



                                        <audio controls id="myAudio" class="mejs__mediaelement">
                                            <source src="{{ Storage::url($file) }}"  type="audio/mp3">

                                            Your browser does not support the audio element.
                                        </audio>


                                    </div>

                                @endforeach




                            </div>

                                <div class="col-md-6 col-md-offset-4">
                                    <button onclick="myFunction()" type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>


                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
