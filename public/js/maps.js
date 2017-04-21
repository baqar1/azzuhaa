

var uluru = {lat: 31.515288, lng: 74.334434};
var map = new google.maps.Map(document.getElementById('map-canvas'),{
    center: uluru,
    zoom: 13,
    mapTypeId: 'roadmap'
});

var marker = new google.maps.Marker({
    position: uluru,
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








var marker;
function initMap(){
    var uluru = {lat: -25.363, lng: 131.044};
    var map = new google.maps.Map(document.getElementById('map'), {
        center: uluru,
        zoom: 13,
        mapTypeId: 'roadmap'

    });

    // Create the search box and link it to the UI element
    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    // Bias the SearchBox results towards current map's viewport
    map.addListener('bounds_changed', function(){
        searchBox.setBounds(map.getBounds())
    });

    map.addListener(marker, 'position_change', function() {

        var lat = marker.getPosition().lat();
        var lng = marker.getPosition().lng();

        $('#lat').val(lat);
        $('#lng').val(lng);


    });

    //var markers = [];


    // Listen for the vent fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener('places_changed', function(){
        var places = searchBox.getPlaces();

        if(places.length == 0){
            return;
        }

        // Clear out the old markers.
        /*markers.forEach(function(marker){
            marker.setMap(null);
        });
        markers = [];
        */

        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function(place){
            if (!place.geometry){
                console.log('Retured place contains no geometry');
                return;
            }

            var icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                title: place.name,
                position: place.geometry.location
            });

            /*
            markers.push(new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                title: place.name,
                position: place.geometry.location
            }));
            */


            if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }

        });

        map.fitBounds(bounds);
    });



}
google.maps.event.addListener(marker, 'position_change', function() {

    var lat = marker.getPosition().lat();
    var lng = marker.getPosition().lng();

    $('#lat').val(lat);
    $('#lng').val(lng);


});

