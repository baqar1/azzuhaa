@extends('layouts.app')

@section('title')
    <title>File Upload to dropbox</title>

@endsection

@section('content')

    @if(Session::has('success'))
        <h2>{!! Session::get('success') !!}</h2>
    @endif

    <div>Upload form</div>
    {!! Form::open(array('url' => 'upload', 'method'=>'POST', 'files'=>true))  !!}
    {!! Form::file('image', array('multiple'=>false)) !!}
    {!! Form::submit('Submit', array('class'=>'send-btn')) !!}
    {!! Form::close() !!}


@endsection