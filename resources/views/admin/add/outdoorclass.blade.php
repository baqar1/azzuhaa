@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Outdoor Class</div>

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

                        <form class="form-horizontal" role="form" method="POST" action="{{ route('outdoorClass.store') }}">
                            {{ csrf_field() }}


                            <div class="form-group">
                                <label for="description" class="col-md-4 control-label">Class Name</label>

                                <div class="col-md-6">
                                    <input id="class_name" type="text" class="form-control" name="class_name" value="" required autofocus>

                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('place') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Place (Location)</label>

                                <div class="col-md-6">


                                    <textarea class="form-control" id="place" name="place" rows="4" cols="50"></textarea>

                                    @if ($errors->has('other_description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('other_description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('other_description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Other Description</label>

                                <div class="col-md-6">


                                    <textarea class="form-control" id="other_description" name="other_description" rows="4" cols="50"></textarea>

                                    @if ($errors->has('other_description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('other_description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('contactInfo') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Contact Info.</label>

                                <div class="col-md-6">


                                    <textarea class="form-control" id="contactInfo" name="contactInfo" rows="4" cols="50"></textarea>

                                    @if ($errors->has('other_description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('other_description') }}</strong>
                                    </span>
                                    @endif
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
