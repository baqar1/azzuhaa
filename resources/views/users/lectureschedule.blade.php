@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Lecture Schedule</div>

                    <div class="panel-body">
                            <table class="table table-hover">

                                <thead>
                                <?php
                                $count = 0;
                                ?>
                                <th>No. </th>
                                <th>Topic/Title</th>
                                <th>Time</th>
                                <th>Date</th>
                                <th>Duration(Minutes)</th>


                                </thead>


                                <tbody>
                                @foreach($lectureSchedules as $lectureSchedule)



                                        <tr>
                                            <td><?= ++$count ?></td>
                                            <td>
                                                {{ $lectureSchedule->title }}
                                            </td>

                                            <td>
                                                {{ date('h:i: a', strtotime($lectureSchedule->time)) }}

                                            </td>
                                            <td>
                                                {{ $lectureSchedule->date }}
                                            </td>

                                            <td>
                                                {{ $lectureSchedule->duration }}
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
@endsection
