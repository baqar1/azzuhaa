@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editing Shift Timings</div>

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
                                <th>Shift </th>
                                <th>Start Time</th>
                                <th>End Time</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($campuses as $campus)

                                <tr>
                                    <td colspan="4" align="center"><b> {{ $campus->name }} </b></td>
                                </tr>

                                @foreach($campus->shiftTimings as $shiftTiming)
                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>{{ $shiftTiming->shift }}</td>
                                        <td>
                                            {{ date('h:i: a', strtotime($shiftTiming->start_time)) }}

                                        </td>
                                        <td>
                                            {{ date('h:i: a', strtotime($shiftTiming->end_time)) }}
                                        </td>

                                        <td>
                                            <a href=" {{ route('shiftTiming.edit', ['id' => $shiftTiming->id]) }}">
                                                <button type="button" class="btn btn-success">Edit</button>
                                            </a>


                                            <form action="{{ route('shiftTiming.delete', ['id' => $shiftTiming->id]) }}" method="POST">
                                                {{ csrf_field() }}
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




