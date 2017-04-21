@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Outdoor Classes List</div>

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



                        <table class="table table-hover">
                            <?php
                            $count = 1;
                            ?>
                            <thead>
                            <tr>
                                <th>No. </th>
                                <th>Class_Name</th>
                                <th>Other Description</th>
                                <th>Place</th>
                                <th>Contact Info.</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($outdoorClasses as $outdoorClass)


                                <tr>
                                    <td><?= $count++ ?></td>
                                    <td>{{ $outdoorClass->class_name }}</td>
                                    <td>{{ $outdoorClass->other_description }}</td>
                                    <td>{{ $outdoorClass->place }}</td>
                                    <td>{{ $outdoorClass->contactInfo }}</td>

                                    <td>
                                        <a href=" {{ route('outdoorClass.edit', ['id' => $outdoorClass->id]) }}">
                                            <button type="button" class="btn btn-success">
                                                Edit</button></a>
                                        <form action="{{ route('outdoorClass.delete', ['id' => $outdoorClass->id]) }}" method="POST">
                                            {{ csrf_field() }}
                                            <button type="button" class="btn btn-danger">
                                                Delete
                                            </button>
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
                title: 'Caution!' ,
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
