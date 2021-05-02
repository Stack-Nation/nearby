@extends('layouts.app')
@section("title","Edit Resource")
@section('head')
<style>
    .description{
        border-radius: 3px;
        height:100px;
        border:0.7px solid #DFE5EC;
        padding: 0.5rem 1rem;
        overflow: auto;
        background:#FFFFFF;
    }
    [contenteditable=true]:empty:before{
        content: attr(placeholder);
        pointer-events: none;
        display: block; /* For Firefox */
        color: #C0CCDD;
    }
    .map{
        height: 300px;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="tab-content" id="pills-tabContent">
                <div>
                    <h3>Edit Oxygen Availability</h3>
                    <form action="{{route("resources.edit.oxygen",$oxygen->id)}}" method="post">
                        @csrf
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" value="{{$oxygen->name}}" placeholder="Provider Name" name="name">
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" value="{{$oxygen->phone}}" placeholder="Provider Phone Number" name="phone">
                        </div>
                        <div class="input-group mb-2">
                            <input type="number" class="form-control" value="{{$oxygen->price}}" placeholder="Price" name="price">
                        </div>
                        <div class="form-group mb-2">
                            <textarea name="description" id="odes" hidden>{{$oxygen->description}}</textarea>
                            <div class="description" contenteditable="true" placeholder="Description" onkeyup="document.getElementById('odes').value=this.innerHTML;">{!!$oxygen->description!!}</div>
                        </div>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" value="Click to change" onkeyup="findAdd(this.value,'oxygenmap','#olat','#olon');" placeholder="Address" name="address">
                        </div>
                        <div class="mb-2">
                            <div class="map" id="oxygenmap"></div>
                            <input type="hidden" id="olat" value="{{$oxygen->address==NULL?"":json_decode($oxygen->address)->lat}}" name="lat">
                            <input type="hidden" id="olon" value="{{$oxygen->address==NULL?"":json_decode($oxygen->address)->lon}}" name="lon">
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" value="{{$oxygen->landmark}}" placeholder="Landmark" name="landmark">
                        </div>
                        <div class="form-group mb-2">
                            <div class="form-group mb-2">
                                <input type="checkbox" name="status" value="Verified By Third Party" id="status" @if($oxygen->status==="Verified By Third Party") checked @endif>
                                <label for="status">Verified?</label>
                            </div>
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script async src="https://maps.googleapis.com/maps/api/js?key={{env("GOOGLE_MAPS_API")}}&callback=initMap&libraries=places"></script>
<script>
let map;
let smap;
let service;
let infowindow;
let mapid=[];

function initMap() {
  const sydney = new google.maps.LatLng(-33.867, 151.195);
  infowindow = new google.maps.InfoWindow();
  const cmaps = $(".map");
  cmaps.map((key,cmap) => {
    map = new google.maps.Map(cmap, {
        center: sydney,
        zoom: 15,
    });
    mapid[$(cmap).attr("id")] = map;
  })
}

async function findAdd (query,tmap,lat,lon){
  const request = {
    query: query,
    fields: ["name", "geometry"],
  };
  smap = mapid[tmap];
  console.log(smap);
  service = new google.maps.places.PlacesService(smap);
  service.findPlaceFromQuery(request, (results, status) => {
    if (status === google.maps.places.PlacesServiceStatus.OK && results) {
      for (let i = 0; i < results.length; i++) {
        createMarker(results[i]);
      }
      smap.setCenter(results[0].geometry.location);
      $(lat).val(results[0].geometry.location.lat());
      $(lon).val(results[0].geometry.location.lng());
    }
  });
}

function createMarker(place) {
  if (!place.geometry || !place.geometry.location) return;
  const marker = new google.maps.Marker({
    smap,
    position: place.geometry.location,
  });
  google.maps.event.addListener(marker, "click", () => {
    infowindow.setContent(place.name || "");
    infowindow.open(smap);
  });
}
</script>
@endsection