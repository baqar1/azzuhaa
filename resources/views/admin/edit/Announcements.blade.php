@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Announcements</div>

                    <div class="panel-body">
                        <table class="table table-hover">

                            <thead>
                                <?php
                                $count = 1;
                                ?>
                                <th>No. </th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>

                            </thead>


                            <tbody>
                                @foreach($announcements as $announcement)
                                    <tr>
                                        <td><?= $count++ ?></td>
                                        <td>{{ $announcement->title }}</td>
                                        <td>{{ substr($announcement->description, 0, 60) }}....</td>
                                        <td>
                                            <a href="{{ route('announcement.edit', ['announcement_id' => $announcement->id]) }}"><button type="button" class="btn btn-success">Edit</button></a>
                                            <form action="{{ route('announcement.delete', ['id' => $announcement->id]) }}" method="POST">
                                                {{ csrf_field() }}
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
