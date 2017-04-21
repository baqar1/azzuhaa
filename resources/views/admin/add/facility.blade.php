@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add New Facility</div>

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

                        <form class="form-horizontal" role="form" method="POST" action="{{ route('facility.store') }}">
                            {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('facility_name') ? ' has-error' : '' }}">
                            <label for="facility_name" class="col-md-4 control-label">Facility Name</label>

                            <div class="col-md-6">
                                <input id="facility_name" type="text" class="form-control" name="facility_name" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('facility_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('facility_name') }}</strong>
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
