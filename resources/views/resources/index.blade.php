@extends('layouts.app')
@section("title","Add Resource")
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