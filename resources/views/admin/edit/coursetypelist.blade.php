@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Course Types List</div>

                    <div class="panel-body">
                        <table class="table table-hover">

                            <thead>
                            <?php
                            $count = 1;
                            ?>
                            <th>No. </th>
                            <th>Name</th>

                            </thead>


                            <tbody>
                            @foreach($courseTypes as $courseType)
                                <tr>
                                    <td><?= $count++ ?></td>
                                    <td>{{ $courseType->name }}</td>

                                    <td>
                                        <a href="{{ route('courseType.edit', ['id' => $courseType->id]) }}"><button type="button" class="btn btn-success">Edit</button></a>
                                        <form action="{{ route('courseType.destroy', ['id' => $courseType->id]) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="button" class="btn btn-danger">
                                                Delete</button>
                                        </form>

                                    </td>
                                </tr>

                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>

        $('tbody').find('form').find('button').on('click', function(event){

            event.preventDefault();

            var myForm = event.target.parentNode;

            $.confirm({
                title: 'Caution!',
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
