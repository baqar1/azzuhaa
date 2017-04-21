@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Album</div>

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


                        <form class="form-horizontal" role="form" method="POST" action="{{ route('albums.update', ['id' => $album->id]) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label for="title" class="col-md-4 control-label">Campus</label>

                                <div class="col-md-6">
                                    <select name="campus_id"  autofocus>

                                        @foreach($campuses as $campus)

                                            @if($campus->id == $album->campus_id)
                                                <option value="{{ $campus->id }}" selected> {{ $campus->name }} </option>

                                            @else
                                                <option value="{{ $campus->id }}"> {{ $campus->name }} </option>
                                            @endif


                                        @endforeach

                                    </select>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Event Name</label>

                                <div class="col-md-6">
                                    <input name="name" id="name" type="text" value="{{ $album->name }}" required >


                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="col-md-4 control-label">Start Time</label>

                                <div class="col-md-6">
                                    <input id="date" type="date" class="form-control" name="date" value="{{ $album->date }}" required>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">

                                    <textarea class="form-control" id="description" name="description" rows="4" cols="50">{{ $album->description }}</textarea>

                                </div>

                            </div>


                            <div class="form-group">

                                    <label for="description" class="col-md-4 control-label">Photos</label>

                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Update
                                        </button>
                                    </div>


                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
