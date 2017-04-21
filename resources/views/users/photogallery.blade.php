@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Album</div>

                    <div class="panel-body">

                            <div class="form-group">
                                <label for="title" class="col-md-4 control-label">Campus</label>

                                <div class="col-md-6">
                                    <h4>{{ $campus->name }}</h4>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Event Name</label>

                                <div class="col-md-6">
                                    <h3>{{ $album->name }}</h3>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="col-md-4 control-label">Date</label>

                                <div class="col-md-6">
                                    <p>{{ $album->date }}</p>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <p>{{ $album->description }}</p>

                                </div>

                            </div>


                            <div class="form-group">

                                    <label for="description" class="col-md-4 control-label">Photos</label>

                                    @foreach($photos as $photo)

                                        <img src="{{ Storage::url($photo->image) }}" alt="">

                                    @endforeach



                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
