@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add New Album</div>

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


                        <form class="form-horizontal" role="form" method="POST" action="{{ route('audioFiles.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="title" class="col-md-4 control-label">Folder</label>

                                <div class="col-md-6">
                                    <select name="folder_id"  autofocus>

                                        @foreach($folders as $folder)

                                            <option value="{{ $folder->id }}"> {{ $folder->name }} </option>


                                        @endforeach

                                    </select>

                                </div>
                            </div>

                            <div class="form-group">

                                <label for="description" class="col-md-4 control-label">Audio Files</label>

                                <div class="col-md-6 form-control">
                                    <input name="files[]" id="files[]" type="file" class="form-control" multiple required>

                                </div>

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
