@extends('layouts.app')
@section("title","Add Resource")
@section('head')
<style>
    .description{
        border-radius: 3px;
        height:100px;
        border:0.7px solid #DFE5EC;
        padding: 0.3rem;
        overflow: auto;
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
            <h2 class="text-center">Add Resource <hr></h2>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pills-hospital-tab" data-toggle="pill" href="#hospital" role="tab" aria-controls="pills-hospital" aria-selected="true">Hospital Availability</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-plasma-tab" data-toggle="pill" href="#plasma" role="tab" aria-controls="pills-plasma" aria-selected="false">Plasma Donor Availability</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-testing-tab" data-toggle="pill" href="#testing" role="tab" aria-controls="pills-testing" aria-selected="false">COVID-19 Testing Facilities</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-ambulance-tab" data-toggle="pill" href="#ambulance" role="tab" aria-controls="pills-ambulance" aria-selected="false">Ambulance Service Availability</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-vaccination-tab" data-toggle="pill" href="#vaccination" role="tab" aria-controls="pills-vaccination" aria-selected="false">Vaccination Centers</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-oxygen-tab" data-toggle="pill" href="#oxygen" role="tab" aria-controls="pills-oxygen" aria-selected="false">Oxygen Availability</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-medicines-tab" data-toggle="pill" href="#medicines" role="tab" aria-controls="pills-medicines" aria-selected="false">Medicines Availability</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="hospital" role="tabpanel" aria-labelledby="pills-hospital-tab">
                    <h3>Add Hospital Availability</h3>
                    <form action="{{route("resources.add.hospital")}}" method="post">
                        @csrf
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" placeholder="Contact Name" name="contact_name">
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" placeholder="Hospital Name" name="name">
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" placeholder="Contact Phone Number" name="phone">
                        </div>
                        <div class="form-group mb-2">
                            <textarea name="description" id="hdes" hidden></textarea>
                            <div class="description" contenteditable="true" placeholder="Description" onkeyup="document.getElementById('hdes').value=this.innerHTML;"></div>
                        </div>
                        <div class="form-group mb-2">
                            <input type="number" class="form-control" placeholder="Number of beds" name="beds">
                        </div>
                        <div class="input-group mb-2">
                            <input type="number" class="form-control" placeholder="Price" name="price">
                            <div class="input-group-append"><span class="input-group-text">per</span><input type="text" class="form-control" name="per"></div>
                        </div>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" onkeyup="findAdd(this.value,'hospitalmap','#hlat','#hlon');" placeholder="Address" name="address">
                        </div>
                        <div class="mb-2">
                            <div class="map" id="hospitalmap"></div>
                            <input type="hidden" id="hlat" name="lat">
                            <input type="hidden" id="hlon" name="lon">
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" placeholder="Pin Code" name="pin_code">
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" placeholder="Landmark" name="landmark">
                        </div>
                        <div class="form-group mb-2">
                            <select name="status" class="form-control">
                                <option value="">Select a status</option>
                                <option value="Responding">Responding</option>
                                <option value="Available">Available</option>
                                <option value="Not Available">Not Available</option>
                                <option value="Not Responding">Not Responding</option>
                                <option value="Unknown">Unknown</option>
                            </select>
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="plasma" role="tabpanel" aria-labelledby="pills-plasma-tab">plasma</div>
                <div class="tab-pane fade" id="testing" role="tabpanel" aria-labelledby="pills-testing-tab">testing</div>
                <div class="tab-pane fade" id="ambulance" role="tabpanel" aria-labelledby="pills-ambulance-tab">ambulance</div>
                <div class="tab-pane fade" id="vaccination" role="tabpanel" aria-labelledby="pills-vaccination-tab">vaccination</div>
                <div class="tab-pane fade" id="oxygen" role="tabpanel" aria-labelledby="pills-oxygen-tab">oxygen</div>
                <div class="tab-pane fade" id="medicines" role="tabpanel" aria-labelledby="pills-medicines-tab">medicines</div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script async src="https://maps.googleapis.com/maps/api/js?key={{env("GOOGLE_MAPS_API")}}&callback=initMap&libraries=places"></script>
<script>
let map;
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
    mapid[cmaps.attr("id")] = map;
  })
}

async function findAdd (query,tmap,lat,lon){
  const request = {
    query: query,
    fields: ["name", "geometry"],
  };
  map = mapid[tmap];
  service = new google.maps.places.PlacesService(map);
  service.findPlaceFromQuery(request, (results, status) => {
    if (status === google.maps.places.PlacesServiceStatus.OK && results) {
      for (let i = 0; i < results.length; i++) {
        createMarker(results[i]);
      }
      map.setCenter(results[0].geometry.location);
      $(lat).val(results[0].geometry.location.lat());
      $(lon).val(results[0].geometry.location.lng());
    }
  });
}

function createMarker(place) {
  if (!place.geometry || !place.geometry.location) return;
  const marker = new google.maps.Marker({
    map,
    position: place.geometry.location,
  });
  google.maps.event.addListener(marker, "click", () => {
    infowindow.setContent(place.name || "");
    infowindow.open(map);
  });
}
</script>
@endsection