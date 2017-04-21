@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Facilities</div>

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
                                    <th>Facility</th>
                                    <th>Action</th>

                                </tr>
                            </thead>


                            <tbody>

                                @foreach($facilities as $facility)


                                    <tr>
                                        <td><?= $count++ ?></td>
                                        <td>{{ $facility->facility_name }}</td>
                                        <td>
                                            <a href="{{ route('facility.edit', ['facility_id' => $facility->id]) }}"><button type="button" class="btn btn-success">Edit</button></a>

                                            <form action="{{ route('facility.delete', ['id' => $facility->id]) }}" method="POST">
                                                {{ csrf_field() }}
                                                <button type="button" class="btn btn-success">
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
                title: 'Caution!',
                content: 'Are you sure to delete this?',
                buttons: {
                    okay: function() {
                        myForm.submit();
                    },

                    cancel: function() {

                    }
                }

            });
        });
    </script>
@endsection
