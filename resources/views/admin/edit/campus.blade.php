@extends('layouts.app')

@section('style')

    <style>
        #map {
            height: 400px;
            width: 100%;
            background-color: grey;
        }

        #searchBox {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            -ms-text-overflow: ellipsis;
            text-overflow: ellipsis;
            width: 400px;
        }

        #map-canvas{
            height: 400px;
            width: 100%;
            background-color: grey;

        }
    </style>

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add New Campus</div>

                    <div class="panel-body">
                        <form action="{{ route('campus.update', ['campus_id' => $campus->id ]) }}" method="POST">

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


                            <input type="text" id="searchBox" name="address" value="{{ $campus->address }}" class="controls" placeholder="Search Box" autofocus>
                            <div id="map-canvas" ></div>

                            <div class="form-group{{ $errors->has('announcement_title') ? ' has-error' : '' }}">
                                <label for="title" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $campus->name }}" required >

                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('announcement_title') ? ' has-error' : '' }}">
                                <label for="title" class="col-md-4 control-label">Lat</label>

                                <div class="col-md-6">
                                    <input id="lat" type="text" class="form-control" name="lat" value="{{ $campus->lat }}" required >

                                </div>

                            </div>

                            <div class="form-group{{ $errors->has('announcement_title') ? ' has-error' : '' }}">
                                <label for="title" class="col-md-4 control-label">Lng</label>

                                <div class="col-md-6">
                                    <input id="lng" type="text" class="form-control" name="lng" value="{{ $campus->lng }}" required >

                                </div>
                            </div>

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

    <script>

        var lat = {{ $campus->lat }};
        var lng = {{ $campus->lng }};

        var map = new google.maps.Map(document.getElementById('map-canvas'), {
            center:{
                lat: lat,
                lng: lng
            },
            zoom: 15
        });

        var marker = new google.maps.Marker({
            position: {
                lat: lat,
                lng: lng
            },
            map: map,
            draggable: true
        });

        var searchBox = new google.maps.places.SearchBox(document.getElementById('searchBox'));

        google.maps.event.addListener(searchBox, 'places_changed', function(){
            var places = searchBox.getPlaces();
            var bounds = new google.maps.LatLngBounds();

            var i, place;

            for(i=0; place=places[i]; i++){
                bounds.extend(place.geometry.location);
                marker.setPosition(place.geometry.location); // set marker position new

            }

            map.fitBounds(bounds);
            map.setZoom(15);
        });

        google.maps.event.addListener(marker, 'position_changed', function(){

            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();

            $('#lat').val(lat);
            $('#lng').val(lng);
        });

    </script>

@endsection
