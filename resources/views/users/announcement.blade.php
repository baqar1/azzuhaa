@extends('layouts.user')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Announcement</div>

                    <div class="panel-body">

                            <div class="form-group">
                                <label for="title" class="col-md-4 control-label">Title</label>

                                <div class="col-md-6">
                                    <h3>{{ $announcement->title }}</h3>


                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <p>{{ $announcement->description }}</p>



                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
