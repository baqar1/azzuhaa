@extends('layouts.app')

@section('content')

    <div class="row">
        <img src="{{ Storage::url($photo->image) }}" alt="" width="400px" height="400px">
    </div>




@endsection

