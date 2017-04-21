@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Event</div>

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


                        <form class="form-horizontal" role="form" method="POST" action="{{ route('event.update', ['event_id' => $event->id]) }}">
                            {{ csrf_field() }}


                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="facility_name" class="col-md-4 control-label">Event Type</label>

                                <div class="col-md-6">

                                    <select name="eventTypeId" autofocus>

                                        @foreach($eventTypes as $eventType)

                                            @if($eventType->id == $event->event_type_id)

                                                <option value="{{ $eventType->id }}" SELECTED> {{ $eventType->event_name }} </option>
                                            @else
                                                <option value="{{ $eventType->id }}"> {{ $eventType->event_name }} </option>
                                            @endif

                                        @endforeach

                                    </select>

                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="facility_name" class="col-md-4 control-label">Title</label>

                                <div class="col-md-6">



                                    <input id="title" type="text" class="form-control" name="title" value="{{ $event->title }}" required autofocus>

                                    @if ($errors->has('title'))<span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('place') ? ' has-error' : '' }}">
                                <label for="place" class="col-md-4 control-label">Place </label>

                                <div class="col-md-6">
                                    <input id="place" type="text" class="form-control" name="place" value="{{ $event->place }}" required >


                                    @if ($errors->has('place'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('place') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                <label for="start_date" class="col-md-4 control-label">Start Date</label>

                                <div class="col-md-6">
                                    <input id="start_date" type="date" class="form-control" name="start_date" value="{{ $event->start_date }}" required >

                                    @if ($errors->has('start_date'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('start_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                                <label for="end_date" class="col-md-4 control-label">End Date</label>

                                <div class="col-md-6">
                                    <input id="end_date" type="date" class="form-control" name="end_date" value="{{ $event->start_date }}" required >

                                    @if ($errors->has('end_date'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('end_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
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

@section('customScript')
    $(document).ready(function(){
        $(#eventTypeId).children('li#{{ $event->event_type_id }}').selected = true;
    });

@endsection
