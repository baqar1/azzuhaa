@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Announcement</div>

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

                        <form class="form-horizontal" role="form" method="POST" action="{{ route('shiftTiming.store') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="title" class="col-md-4 control-label">Campus</label>

                                <div class="col-md-6">
                                    <select name="campus_id"  autofocus>

                                        @foreach($campuses as $campus)

                                            <option value="{{ $campus->id }}"> {{ $campus->name }} </option>


                                        @endforeach

                                    </select>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="title" class="col-md-4 control-label">Shift</label>

                                <div class="col-md-6">
                                    <select name="shift" id="shift">

                                        <option value="1st Shift" SELECTED>1st Shift</option>
                                        <option value="2nd Shift" >2nd Shift</option>


                                    </select>


                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="col-md-4 control-label">Start Time</label>

                                <div class="col-md-6">
                                    <input id="start_time" type="time" class="form-control" name="start_time" value="" require>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="col-md-4 control-label">End Time</label>

                                <div class="col-md-6">
                                    <input id="end_time" type="time" class="form-control" name="end_time" value="" require>

                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save
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
