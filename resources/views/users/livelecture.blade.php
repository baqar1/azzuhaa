@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Live Lecture</div>

                        <div class="panel-body">
                            <h2>Mixlr player</h2>

                            <script src="https://content.jwplatform.com/libraries/GG1wEshA.js"></script>

                            <div id="player"></div>
                            
                            <iframe src="https://mixlr.com/users/5874592/embed?autoplay=true" width="100%" height="180px" scrolling="no" frameborder="no" marginheight="0" marginwidth="0"></iframe>
                            <small><a href="http://mixlr.com/baqar" style="color:#1a1a1a;text-align:left; font-family:Helvetica, sans-serif; font-size:11px;">baqar is on Mixlr</a></small>

                            <script type="text/javascript">

                               /* var playerInstance = jwplayer('player');
                                playerInstance.setup({
                                    primary: 'html5',
                                    playlist: [{
                                        sources: [{
                                            file: "https://mixlr.com/users/5874592/embed?autoplay=true",
                                            type: 'mp3'
                                        }]
                                    }],
                                    width: 480,
                                    height: 40
                                });
                                */

                            </script>


                        </div>


                </div>
            </div>
        </div>
    </div>
@endsection

