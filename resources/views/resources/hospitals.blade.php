@extends('layouts.app')
@section("title","Hospitals")
@section('head')
<style>
    #map{
        height: 500px;
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
            <div id="hospital" class="row mt-2">
                @if($hospitals->count()>0)
                <input type="text" class="form-control" placeholder="Search Address" onkeyup="search(this.value)">
                <input type="text" class="form-control" placeholder="Search City" onkeyup="searchC(this.value)">
                <div id="searchr" class="row">

                </div>
                    @foreach ($hospitals as $resource)
                    <div class="row">
                        @if($resource->name)
                        <div class="col-4 mb-2">Hospital Name</div>
                        <div class="col-8 mb-2">{{$resource->name}}</div>
                        @endif
                        @if($resource->contact_name)
                        <div class="col-4 mb-2">Contact Name</div>
                        <div class="col-8 mb-2">{{$resource->contact_name}}</div>
                        @endif
                        @if($resource->phone)
                        <div class="col-4 mb-2">Contact Phone Number</div>
                        <div class="col-8 mb-2">{{$resource->phone}}</div>
                        @endif
                        @if($resource->description)
                        <div class="col-4 mb-2">Description</div>
                        <div class="col-8 mb-2">{!!$resource->description!!}</div>
                        @endif
                        @if($resource->beds)
                        <div class="col-4 mb-2">Number of beds</div>
                        <div class="col-8 mb-2">{{$resource->beds}}</div>
                        @endif
                        @if($resource->bed_oxygen)
                        <div class="col-4 mb-2">Number of beds with oxygen support</div>
                        <div class="col-8 mb-2">{{$resource->bed_oxygen}}</div>
                        @endif
                        @if($resource->bed_nono)
                        <div class="col-4 mb-2">Number of beds with no oxygen support</div>
                        <div class="col-8 mb-2">{{$resource->bed_nono}}</div>
                        @endif
                        @if($resource->bed_ac)
                        <div class="col-4 mb-2">Number of beds with AC</div>
                        <div class="col-8 mb-2">{{$resource->bed_ac}}</div>
                        @endif
                        @if($resource->bed_noac)
                        <div class="col-4 mb-2">Number of beds with no AC</div>
                        <div class="col-8 mb-2">{{$resource->bed_noac}}</div>
                        @endif
                        @if($resource->icu)
                        <div class="col-4 mb-2">Number of ICU</div>
                        <div class="col-8 mb-2">{{$resource->icu}}</div>
                        @endif
                        @if($resource->vantilator)
                        <div class="col-4 mb-2">Number of vaccant vantilators</div>
                        <div class="col-8 mb-2">{{$resource->vantilator}}</div>
                        @endif
                        @if($resource->price)
                        <div class="col-4 mb-2">Price</div>
                        <div class="col-8 mb-2">{{$resource->price}}</div>
                        @endif
                        @if($resource->address)
                        <div class="col-4 mb-2">Address</div>
                        <div class="col-8 mb-2"><span class="address" data-lon="{{json_decode($resource->address)->lon}}" data-lat="{{json_decode($resource->address)->lat}}"></span></div>
                        @endif
                        @if($resource->landmark)
                        <div class="col-4 mb-2">Landmark</div>
                        <div class="col-8 mb-2 city">{{$resource->landmark}}</div>
                        @endif
                        @if($resource->status)
                        <div class="col-4 mb-2">Status</div>
                        <div class="col-8 mb-2">{{$resource->status}}</div>
                        @endif
                        <div class="col-12"><a href="{{route("resources.edit.hospital",$resource->id)}}" class="btn btn-success btn-block">Edit</a></div>
                    </div>
                        <hr>
                    @endforeach
                @else
                <div class="col-12">
                    No data found.
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script async src="https://maps.googleapis.com/maps/api/js?key={{env("GOOGLE_MAPS_API")}}&callback=initMap"></script>
<script>
    let map;
    let resource;
    let saddresses = [];

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
            @if($hospital->address)
            pos = {
                lat: {{json_decode($hospital->address)->lat}},
                lng: {{json_decode($hospital->address)->lon}},
            };
            marker = new google.maps.Marker({
                position: pos,
                map: map,
                icon: '{{asset("assets/icons/hospital.png")}}'
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
            @endif
            @endforeach
        @endif

        const addresses = $(".address");
        addresses.map((key,address) => {
            pos = {
                lng:$(address).data("lon"),
                lat:$(address).data("lat"),
            }
            const geocoder = new google.maps.Geocoder();
            getLocation(geocoder,map,pos,address);
        })
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

    function getLocation(geocoder, map,pos,content) {
        const latlng = {
            lat: parseFloat(pos.lat),
            lng: parseFloat(pos.lng),
        };
        geocoder.geocode({ location: latlng }, (results, status) => {
            if (status === "OK") {
            if (results[0]) {
                $(content).html(results[0].formatted_address);
                resource = $($($(content).parent()).parent()).html();
                saddresses[results[0].formatted_address] = resource;
            } else {
                window.alert("No results found");
            }
            } else {
            console.log("Geocoder failed due to: " + status);
            }
        });
    }
    function search(address){
        const addresses = Object.keys(saddresses);
        let regex;
        $("#searchr").html("");
        if(address!=null && address!=""){
            addresses.map((addresse,key) => {
                regex = new RegExp( address, 'i' );
                if(addresse.match(regex)){
                    $("#searchr").append(saddresses[addresse]);
                    $("#searchr").append("<hr/>");
                }
            })
        }
    }
    function searchC(address){
        const cities = $(".city");
        let regex;
        $("#searchr").html("");
        if(address!=null && address!=""){
            cities.map((key,city) => {
                regex = new RegExp( address, 'i' );
                if($(city).text().match(regex)){
                    $("#searchr").append($($(city).parent()));
                    $("#searchr").append("<hr/>");
                }
            })
        }
    }
</script>
@endsection