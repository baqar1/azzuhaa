@extends('layouts.user')

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

                                </tr>
                            </thead>


                            <tbody>

                                @foreach($facilities as $facility)


                                    <tr>
                                        <td><?= $count++ ?></td>
                                        <td>{{ $facility->facility_name }}</td>

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
