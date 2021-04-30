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
            <ul class="nav rounded-lg mb-2 p-2 shadow-sm" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="btn active" id="hospital-tab" data-bs-toggle="tab" data-bs-target="#hospital" type="button" role="tab" aria-controls="hospital" aria-selected="true">Hospital Availability</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="btn" id="plasma-tab" data-bs-toggle="tab" data-bs-target="#plasma" type="button" role="tab" aria-controls="plasma" aria-selected="false">Plasma Donor Availability</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="btn" id="testing-tab" data-bs-toggle="tab" data-bs-target="#testing" type="button" role="tab" aria-controls="testing" aria-selected="false">COVID-19 Testing Facilities</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="btn" id="ambulance-tab" data-bs-toggle="tab" data-bs-target="#ambulance" type="button" role="tab" aria-controls="ambulance" aria-selected="false">Ambulance Service Availability</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="btn" id="vaccination-tab" data-bs-toggle="tab" data-bs-target="#vaccination" type="button" role="tab" aria-controls="vaccination" aria-selected="false">Vaccination Centers</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="btn" id="oxygen-tab" data-bs-toggle="tab" data-bs-target="#oxygen" type="button" role="tab" aria-controls="oxygen" aria-selected="false">Oxygen Availability</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="btn" id="medicines-tab" data-bs-toggle="tab" data-bs-target="#medicines" type="button" role="tab" aria-controls="medicines" aria-selected="false">Medicines Availability</a>
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
                <div class="tab-pane fade" id="plasma" role="tabpanel" aria-labelledby="pills-plasma-tab">
                    <h3>Add Palsma Donor Availability</h3>
                    <form action="{{route("resources.add.plasma")}}" method="post">
                        @csrf
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" placeholder="Contact Name" name="name">
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" placeholder="Contact Phone Number" name="phone">
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" placeholder="Blood Group" name="blood_group">
                        </div>
                        <div class="form-group mb-2">
                            <textarea name="description" id="pdes" hidden></textarea>
                            <div class="description" contenteditable="true" placeholder="Description" onkeyup="document.getElementById('pdes').value=this.innerHTML;"></div>
                        </div>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" onkeyup="findAdd(this.value,'plasmamap','#plat','#plon');" placeholder="Address" name="address">
                        </div>
                        <div class="mb-2">
                            <div class="map" id="plasmamap"></div>
                            <input type="hidden" id="plat" name="lat">
                            <input type="hidden" id="plon" name="lon">
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
                <div class="tab-pane fade" id="testing" role="tabpanel" aria-labelledby="pills-testing-tab">
                    <h3>Add COVID-19 Testing Facilities</h3>
                    <form action="{{route("resources.add.testing")}}" method="post">
                        @csrf
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" placeholder="Facility Name" name="name">
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" placeholder="Facility Phone Number" name="phone">
                        </div>
                        <div class="input-group mb-2">
                            <input type="number" class="form-control" placeholder="Price" name="price">
                        </div>
                        <div class="form-group mb-2">
                            <textarea name="description" id="tdes" hidden></textarea>
                            <div class="description" contenteditable="true" placeholder="Description" onkeyup="document.getElementById('tdes').value=this.innerHTML;"></div>
                        </div>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" onkeyup="findAdd(this.value,'testingmap','#tlat','#tlon');" placeholder="Address" name="address">
                        </div>
                        <div class="mb-2">
                            <div class="map" id="testingmap"></div>
                            <input type="hidden" id="tlat" name="lat">
                            <input type="hidden" id="tlon" name="lon">
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
                <div class="tab-pane fade" id="ambulance" role="tabpanel" aria-labelledby="pills-ambulance-tab">
                    <h3>Ambulance Service Availability</h3>
                    <form action="{{route("resources.add.ambulance")}}" method="post">
                        @csrf
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" placeholder="Contact Name" name="name">
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" placeholder="Contact Phone Number" name="phone">
                        </div>
                        <div class="form-group mb-2">
                            <textarea name="description" id="ades" hidden></textarea>
                            <div class="description" contenteditable="true" placeholder="Description" onkeyup="document.getElementById('ades').value=this.innerHTML;"></div>
                        </div>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" onkeyup="findAdd(this.value,'ambulancemap','#alat','#alon');" placeholder="Address" name="address">
                        </div>
                        <div class="mb-2">
                            <div class="map" id="ambulancemap"></div>
                            <input type="hidden" id="alat" name="lat">
                            <input type="hidden" id="alon" name="lon">
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
                <div class="tab-pane fade" id="vaccination" role="tabpanel" aria-labelledby="pills-vaccination-tab">
                    <h3>Add Vaccination Centers</h3>
                    <form action="{{route("resources.add.vaccination")}}" method="post">
                        @csrf
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" placeholder="Center Name" name="name">
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" placeholder="Center Phone Number" name="phone">
                        </div>
                        <div class="form-group mb-2">
                            <textarea name="description" id="vdes" hidden></textarea>
                            <div class="description" contenteditable="true" placeholder="Description" onkeyup="document.getElementById('vdes').value=this.innerHTML;"></div>
                        </div>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" onkeyup="findAdd(this.value,'vaccinationmap','#vlat','#vlon');" placeholder="Address" name="address">
                        </div>
                        <div class="mb-2">
                            <div class="map" id="vaccinationmap"></div>
                            <input type="hidden" id="vlat" name="lat">
                            <input type="hidden" id="vlon" name="lon">
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
                <div class="tab-pane fade" id="oxygen" role="tabpanel" aria-labelledby="pills-oxygen-tab">
                    <h3>Add Oxygen Availability</h3>
                    <form action="{{route("resources.add.oxygen")}}" method="post">
                        @csrf
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" placeholder="Provider Name" name="name">
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" placeholder="Provider Phone Number" name="phone">
                        </div>
                        <div class="input-group mb-2">
                            <input type="number" class="form-control" placeholder="Price" name="price">
                        </div>
                        <div class="form-group mb-2">
                            <textarea name="description" id="odes" hidden></textarea>
                            <div class="description" contenteditable="true" placeholder="Description" onkeyup="document.getElementById('odes').value=this.innerHTML;"></div>
                        </div>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" onkeyup="findAdd(this.value,'oxygenmap','#olat','#olon');" placeholder="Address" name="address">
                        </div>
                        <div class="mb-2">
                            <div class="map" id="oxygenmap"></div>
                            <input type="hidden" id="olat" name="lat">
                            <input type="hidden" id="olon" name="lon">
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
                <div class="tab-pane fade" id="medicines" role="tabpanel" aria-labelledby="pills-medicines-tab">
                    <h3>Add Medicines Availability</h3>
                    <form action="{{route("resources.add.medicines")}}" method="post">
                        @csrf
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" placeholder="Provider Name" name="name">
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" placeholder="Provider Phone Number" name="phone">
                        </div>
                        <div class="input-group mb-2">
                            <select name="categories[]" class="form-control" multiple>
                                <option value="">Select categories</option>
                                <option value="Masks">Masks</option>
                                <option value="Vitamins">Vitamins</option>
                                <option value="Aspirin">Aspirin</option>
                                <option value="Emergency Medicines">Emergency Medicines</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <textarea name="description" id="mdes" hidden></textarea>
                            <div class="description" contenteditable="true" placeholder="Description" onkeyup="document.getElementById('mdes').value=this.innerHTML;"></div>
                        </div>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" onkeyup="findAdd(this.value,'medicinesmap','#mlat','#mlon');" placeholder="Address" name="address">
                        </div>
                        <div class="mb-2">
                            <div class="map" id="medicinesmap"></div>
                            <input type="hidden" id="mlat" name="lat">
                            <input type="hidden" id="mlon" name="lon">
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
  console.log(mapid);
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