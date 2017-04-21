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


                        <form class="form-horizontal" role="form" method="POST" action="{{ route('subFolders.store') }}" >
                            {{ csrf_field() }}


                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Folder</label>

                                <div class="col-md-6">
                                    <select name="parentFolder" id="parentFolder" name="parentFolder">
                                        @foreach($folders as $folder)
                                            <option value="{{ $folder }}" >
                                                <?php
                                                    $folder = explode('/', $folder);
                                                    $folderName = $folder[count($folder) - 1];
                                                    echo $folderName
                                                ?>

                                            </option>
                                        @endforeach
                                    </select>


                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Sub-Folder Name</label>

                                <div class="col-md-6">
                                    <input name="name" id="name" type="text" value="" required >


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
