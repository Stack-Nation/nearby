@extends('layouts.app')
@section("title","Home")
@section('head')
<style>
    #map{
        height: 300px;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-7">
            <div id="map"></div>
        </div>
        <div class="col-lg-5">
            <h4>Do you have any Resources to Share?</h4>
            <a href="{{route("resources.add")}}" class="btn btn-info">Add Resource</a>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script async src="https://maps.googleapis.com/maps/api/js?key={{env("GOOGLE_MAPS_API")}}&callback=initMap"></script>
<script>
    let map;

    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: -34.397, lng: 150.644 },
            zoom: 8,
        });
        infoWindow = new google.maps.InfoWindow();
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                const pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                };
                var marker = new google.maps.Marker({
                    position: pos,
                    map: map,
                });
                google.maps.event.addListener(marker,'click', (function(marker,infowindow){ 
                    return function() {
                        infowindow.setContent("You are here");
                        infowindow.open(map, marker);
                    };
                })(marker,infowindow));
                map.setCenter(pos);
                },
                () => {
                handleLocationError(true, infoWindow, map.getCenter());
                }
            );
        } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
        }
        let pos;
        let marker;
        let infowindow;
        @if($hospitals->count()>0)
            @foreach($hospitals as $hospital)
            pos = {
                lat: {{json_decode($hospital->address)->lat}},
                lng: {{json_decode($hospital->address)->lon}},
            };
            marker = new google.maps.Marker({
                position: pos,
                map: map,
                icon: 'assets/icons/hospital.png'
            });
            infowindow = new google.maps.InfoWindow()

            google.maps.event.addListener(marker,'click', (function(marker,infowindow){ 
                    return function() {
                        const geocoder = new google.maps.Geocoder();
                        geocodeLatLng(geocoder, map, infowindow,pos);
                    };
                })(marker,infowindow));
            () => {
            handleLocationError(true, infoWindow, map.getCenter());
            }
            @endforeach
        @endif
        @if($plasma->count()>0)
            @foreach($plasma as $plas)
            pos = {
                lat: {{json_decode($plas->address)->lat}},
                lng: {{json_decode($plas->address)->lon}},
            };
            marker = new google.maps.Marker({
                position: pos,
                map: map,
                icon: 'assets/icons/plasma-donor.png'
            });
            infowindow = new google.maps.InfoWindow()

            google.maps.event.addListener(marker,'click', (function(marker,infowindow){ 
                    return function() {
                        const geocoder = new google.maps.Geocoder();
                        geocodeLatLng(geocoder, map, infowindow,pos);
                    };
                })(marker,infowindow));
            () => {
            handleLocationError(true, infoWindow, map.getCenter());
            }
            @endforeach
        @endif
        @if($testings->count()>0)
            @foreach($testings as $testing)
            pos = {
                lat: {{json_decode($testing->address)->lat}},
                lng: {{json_decode($testing->address)->lon}},
            };
            marker = new google.maps.Marker({
                position: pos,
                map: map,
                icon: 'assets/icons/covid-test.png'
            });
            infowindow = new google.maps.InfoWindow()

            google.maps.event.addListener(marker,'click', (function(marker,infowindow){ 
                    return function() {
                        const geocoder = new google.maps.Geocoder();
                        geocodeLatLng(geocoder, map, infowindow,pos);
                    };
                })(marker,infowindow));
            () => {
            handleLocationError(true, infoWindow, map.getCenter());
            }
            @endforeach
        @endif
        @if($ambulances->count()>0)
            @foreach($ambulances as $ambulance)
            pos = {
                lat: {{json_decode($ambulance->address)->lat}},
                lng: {{json_decode($ambulance->address)->lon}},
            };
            marker = new google.maps.Marker({
                position: pos,
                map: map,
                icon: 'assets/icons/ambulance.png'
            });
            infowindow = new google.maps.InfoWindow()

            google.maps.event.addListener(marker,'click', (function(marker,infowindow){ 
                    return function() {
                        const geocoder = new google.maps.Geocoder();
                        geocodeLatLng(geocoder, map, infowindow,pos);
                    };
                })(marker,infowindow));
            () => {
            handleLocationError(true, infoWindow, map.getCenter());
            }
            @endforeach
        @endif
        @if($vaccinations->count()>0)
            @foreach($vaccinations as $vaccination)
            pos = {
                lat: {{json_decode($vaccination->address)->lat}},
                lng: {{json_decode($vaccination->address)->lon}},
            };
            marker = new google.maps.Marker({
                position: pos,
                map: map,
                icon: 'assets/icons/vaccine.png'
            });
            infowindow = new google.maps.InfoWindow()

            google.maps.event.addListener(marker,'click', (function(marker,infowindow){ 
                    return function() {
                        const geocoder = new google.maps.Geocoder();
                        geocodeLatLng(geocoder, map, infowindow,pos);
                    };
                })(marker,infowindow));
            () => {
            handleLocationError(true, infoWindow, map.getCenter());
            }
            @endforeach
        @endif
        @if($oxygens->count()>0)
            @foreach($oxygens as $oxygen)
            pos = {
                lat: {{json_decode($oxygen->address)->lat}},
                lng: {{json_decode($oxygen->address)->lon}},
            };
            marker = new google.maps.Marker({
                position: pos,
                map: map,
                icon: 'assets/icons/vaccine.png'
            });
            infowindow = new google.maps.InfoWindow()

            google.maps.event.addListener(marker,'click', (function(marker,infowindow){ 
                    return function() {
                        const geocoder = new google.maps.Geocoder();
                        geocodeLatLng(geocoder, map, infowindow,pos);
                    };
                })(marker,infowindow));
            () => {
            handleLocationError(true, infoWindow, map.getCenter());
            }
            @endforeach
        @endif
        @if($medicines->count()>0)
            @foreach($medicines as $medicine)
            pos = {
                lat: {{json_decode($medicine->address)->lat}},
                lng: {{json_decode($medicine->address)->lon}},
            };
            marker = new google.maps.Marker({
                position: pos,
                map: map,
                icon: 'assets/icons/medicine.png'
            });
            infowindow = new google.maps.InfoWindow()

            google.maps.event.addListener(marker,'click', (function(marker,infowindow){ 
                    return function() {
                        const geocoder = new google.maps.Geocoder();
                        geocodeLatLng(geocoder, map, infowindow,pos);
                    };
                })(marker,infowindow));
            () => {
            handleLocationError(true, infoWindow, map.getCenter());
            }
            @endforeach
        @endif
    }

    function geocodeLatLng(geocoder, map, infowindow,pos) {
  const latlng = {
    lat: parseFloat(pos.lat),
    lng: parseFloat(pos.lng),
  };
  geocoder.geocode({ location: latlng }, (results, status) => {
    if (status === "OK") {
      if (results[0]) {
        map.setZoom(11);
        const marker = new google.maps.Marker({
          position: latlng,
          map: map,
        });
        infowindow.setContent(results[0].formatted_address);
        infowindow.open(map, marker);
      } else {
        window.alert("No results found");
      }
    } else {
      window.alert("Geocoder failed due to: " + status);
    }
  });
}
</script>
@endsection