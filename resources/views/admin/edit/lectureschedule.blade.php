@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Lecture Schedule</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('lectureSchedule.store') }}">
                            {{ csrf_field() }}


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
                                                <input type="hidden" name="lectureScheduleId[{{ $lectureSchedule->id }}]" value="{{ $lectureSchedule->id }}">
                                                <input id="title" type="text" name="title[{{ $lectureSchedule->id }}]"  value="{{ $lectureSchedule->title }}">
                                            </td>

                                            <td>
                                                <input id="time" type="time" name="time[{{ $lectureSchedule->id }}]"  value="{{ $lectureSchedule->time }}">
                                            </td>
                                            <td>
                                                <input id="date" type="date" name="date[{{ $lectureSchedule->id }}]"  value="{{ $lectureSchedule->date }}">
                                            </td>

                                            <td>
                                                <input align="center" id="duration" type="number" name="duration[{{ $lectureSchedule->id }}]"  value="{{ $lectureSchedule->duration }}" min="1">
                                            </td>


                                        </tr>

                                @endforeach

                                    </tbody>

                                </table>



                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
