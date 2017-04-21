@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Files List</div>

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

                             <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Folder</label>

                                <div class="col-md-6">
                                    <select name="parentFolder" id="parentFolder" name="parentFolder">
                                        <?php $count = 0 ?>
                                        @foreach($folders as $folder)
                                            <option value="{{ $count++ }}" >
                                                <?php
                                                $folder = explode('/', $folder);
                                                $folderName = $folder[count($folder) - 1];
                                                echo $folderName
                                                ?>

                                            </option>
                                        @endforeach
                                    </select>


                                    <button id="search" type="submit" class="btn btn-primary">
                                        Search
                                    </button>


                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-md-6">
                                    <table id="myTable" class="table-responsive">
                                        <thead>
                                        <th><td>Files List</td></th>
                                        </thead>
                                        <tbody>

                                        </tbody>

                                    </table>


                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){

            $('#search').click(function(){

                var parentFolder = $("#parentFolder option:selected").val();


                //var url = "audioFiles/show/" + parentFolder;
                var url = "{{ route('audioFiles.show', ['id' => 'parentFolder']) }}";
                url = url.replace('parentFolder', parentFolder);

                $.get(url , function(data, status){

                    var i = 0;
                    while(data.length > i){

                        document.cookie = 'name=' + data[i++];
                        alert( document.cookie);
                        $('#myTable').find('tbody:last')
                            .append($('<tr>')
                                .append($('<td>')
                                    .append($('<a>')
                                        .attr('href', '{{ $_COOKIE['name'] }}')
                                        .text(document.cookie['name'])
                                    )
                                )
                            );


                        //.append("<tr> <td>" + data[i++] +"</td> </tr>");

                    }

                    alert("Data: " + data + "\nStatus: " + status);


                });

            });

        });
    </script>
@endsection
