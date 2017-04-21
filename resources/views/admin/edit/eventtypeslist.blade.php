@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Event Types List</div>

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
                            <?php $count = 0;  ?>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>No. </th>
                                    <th>Event Types</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($eventTypes as $eventType)
                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>{{ $eventType->event_name }}</td>
                                        <td>
                                            <a href="{{ route('eventType.edit', ['event_type_id' => $eventType->id]) }}">
                                                <button type="button" class="btn btn-success">Edit</button>
                                            </a>

                                            <form action="{{ route('eventType.delete', ['id' => $eventType->id]) }}" method="POST">
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
        $('tbody').find('form').find('button').on('click', function(){

            event.preventDefault();

            var myForm = event.target.parentNode;

            $.confirm({
                title: 'Caution!',
                content: 'Are you sure to delete this?',
                buttons: {
                    okay: function(){
                        myForm.submit()
                    },

                    cancel: function(){

                    }
                }
            });
        });
    </script>

@endsection
