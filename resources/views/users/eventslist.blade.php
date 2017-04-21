@extends('layouts.user')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Events List</div>

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
                                <th>Events </th>
                                <th>Start_Date</th>
                                <th>End_Date</th>
                                <th>Place</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($eventTypes as $eventType)

                                <tr>
                                    <td colspan="5" align="center"><b> {{ $eventType->event_name }} </b></td>
                                </tr>

                                @foreach($eventType->events as $event)
                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>{{ $event->title }}</td>
                                        <td>{{ $event->start_date }}</td>
                                        <td>{{ $event->end_date }}</td>
                                        <td>{{ $event->place }}</td>
                                        <td>
                                            <a href=" {{ route('event.edit', ['event_id' => $event->id]) }}">
                                                <button type="button" class="btn btn-success">Edit</button>
                                            </a>

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




