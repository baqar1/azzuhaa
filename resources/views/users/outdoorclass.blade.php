@extends('layouts.user')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Outdoor Class</div>

                    <div class="panel-body">

                           <div class="form-group">
                                <label for="description" class="col-md-4 control-label">Class Name</label>

                                <div class="col-md-6">
                                    <h4>{{ $outdoorClass->class_name }}</h4>


                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('place') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Place (Location)</label>

                                <div class="col-md-6">
                                    <p>{{ $outdoorClass->place }}</p>


                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('other_description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Other Description</label>

                                <div class="col-md-6">
                                    <p>{{ $outdoorClass->other_description }}</p>

                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('contactInfo') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Contact Info.</label>

                                <div class="col-md-6">
                                    <p>{{ $outdoorClass->contactInfo }}</p>

                                </div>
                            </div>



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
