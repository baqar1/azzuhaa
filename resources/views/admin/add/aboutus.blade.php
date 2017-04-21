@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add New Announcement</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('announcement.store') }}">
                            {{ csrf_field() }}

                            @if(Session::has('success'))

                                <div class="row">
                                    <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                                        <div id="charge-message" class="alert alert-success">
                                            {{ Session::get('success') }}
                                        </div>
                                    </div>
                                </div>
                            @endif



                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Mission</label>

                                <div class="col-md-6">


                                    <textarea class="form-control" id="mission" name="mission" rows="4" cols="50">

                                    </textarea>

                                    @if ($errors->has('mission'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('mission') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group{{ $errors->has('history') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">History</label>

                                <div class="col-md-6">


                                    <textarea class="form-control" id="history" name="history" rows="4" cols="50">

                                    </textarea>

                                    @if ($errors->has('history'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('history') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('other_description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Other Description</label>

                                <div class="col-md-6">


                                    <textarea class="form-control" id="other_description" name="other_description" rows="4" cols="50">

                                    </textarea>

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
