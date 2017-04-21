@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Gallery Albums List</div>

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

                        <?php $count = 1;  ?>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name </th>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($campuses as $campus)

                                <tr>
                                    <td colspan="5" align="center"><b> {{ $campus->name }} </b></td>
                                </tr>

                                @foreach($albums as $album)
                                @if($campus->id == $album->campus_id)

                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>{{ $album->name }}</td>
                                        <td>
                                            {{ date('D-m-Y', $album->time) }}

                                        </td>
                                        <td>
                                            {{ $album->description }}
                                        </td>

                                        <td>
                                            <a href=" {{ route('albums.edit', ['id' => $album->id]) }}">
                                                <button type="button" class="btn btn-success">Edit</button>
                                            </a>


                                            <form action="{{ route('albums.destroy', ['id' => $album->id]) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="button" class="btn btn-danger delete">Delete</button>
                                            </form>



                                        </td>

                                    </tr>
                                @endif
                                @endforeach

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>

        //var myForm = null;

        $("tbody").find('form').find('button').on("click", function(event){

            event.preventDefault();


            var myForm = event.target.parentNode;

            $.confirm({
                title: 'Caution! ' ,
                content: 'Are you sure to delete this?',
                buttons: {
                    okay: function(){
                        myForm.submit();
                    },

                    cancel: function() {

                    }
                }
            });

        });


    </script>




@endsection




