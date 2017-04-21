@extends('layouts.user')

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
                                <th>Action</th>
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
                                        <a href=" {{ route('outDoorClasses.displayOne', ['id' => $outdoorClass->id]) }}">
                                            <button type="button" class="btn btn-success">
                                                View</button>
                                        </a>



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
