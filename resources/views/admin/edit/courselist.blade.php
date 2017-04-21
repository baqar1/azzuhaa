@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Offered Courses</div>

                    <div class="panel-body">
                        <table class="table table-hover">

                            <thead>
                            <?php
                            $count = 1;
                            ?>
                            <th>No. </th>
                            <th>Course_Name</th>
                            <th>Subjects</th>
                            <th>Action</th>


                            </thead>


                            <tbody>
                            @foreach($courseTypes as $courseType)

                                <tr>
                                    <td colspan="4" align="center"><b> {{ $courseType->name }} </b></td>
                                </tr>

                                @foreach($courseType->courses as $course)
                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>{{ $course->name }}</td>
                                        <td>{{ $course->description }}</td>

                                        <td>
                                            <a href=" {{ route('course.edit', ['id' => $course->id]) }}">
                                                <button type="button" class="btn btn-success">Edit</button>
                                            </a>


                                            <form action="{{ route('course.destroy', ['id' => $course->id]) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="button" class="btn btn-danger delete">Delete</button>
                                            </form>



                                        </td>

                                    </tr>
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
