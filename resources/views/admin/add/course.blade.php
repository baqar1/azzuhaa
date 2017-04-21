@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add New Course</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('course.store') }}">
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


                            <div class="form-group{{ $errors->has('courseType') ? ' has-error' : '' }}">
                                <label for="facility_name" class="col-md-4 control-label">Course Type</label>

                                <div class="col-md-6">

                                    <select name="courseTypeId"  autofocus>

                                        @foreach($courseTypes as $courseType)

                                            <option value="{{ $courseType->id }}"> {{ $courseType->name }} </option>

                                        @endforeach

                                    </select>


                                    @if ($errors->has('courseType'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('courseType') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="title" class="col-md-4 control-label">Title</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Subjects ( Seperate by Commas)</label>

                                <div class="col-md-6">


                                    <textarea class="form-control" id="description" name="description" rows="4" cols="50"></textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
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
