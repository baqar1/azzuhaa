@extends('layouts.user')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Campuses List</div>

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
                                <th>Name</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($campuses as $campus)


                                <tr>
                                    <td><?= $count++ ?></td>
                                    <td>{{ $campus->name }}</td>
                                    <td>{{ $campus->address }}</td>
                                    <td>
                                        <a href=" {{ route('campuses.displayOne', ['campus_id' => $campus->id]) }}">
                                            <button type="button" class="btn btn-success">View</button>
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
        <div class="modal fade" tabindex="-1" role="dialog" id="addPerson-modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add Person</h4>
                    </div>
                    <form method="POST" action="">
                        {{ csrf_field() }}
                        <div class="modal-body">

                            <div class="form-group">

                                <label for="post-body">Name</label>
                                <input type="text" name="name" id="name" autofocus="true" required="true"><br>
                                <label for="post-body">Age</label>
                                <input type="number" name="age" id="age" width="2" min="0" required>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" id="modal-save" value="Save">
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
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
