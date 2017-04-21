@extends('layouts.app')

@section('content')

    <body onload="window.setTimeout(window.opener.SC.connectCallback, 1);">
    <p>
        This popup should automatically close in a few seconds
    </p>


    </body>

@endsection