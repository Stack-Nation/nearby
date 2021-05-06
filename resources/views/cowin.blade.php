@extends('layouts.app')
@section("title","Cowin")
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Search for vaccination slots.</h4>
                </div>
                <div class="card-body">
                    <div class="colorful-tab">
                      <ul class="nav p-1 mb-3 shadow-sm" id="affanTab3" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="btn btn-primary active" id="district-tab" data-bs-toggle="tab" data-bs-target="#district" type="button" role="tab" aria-controls="district" aria-selected="true">District</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="btn btn-primary" id="pin-tab" data-bs-toggle="tab" data-bs-target="#pin" type="button" role="tab" aria-controls="pin" aria-selected="false">Pin Code</button>
                        </li>
                      </ul>
                      <div class="tab-content shadow-sm p-3" id="affanTab3Content">
                        <div class="tab-pane fade show active" id="district" role="tabpanel" aria-labelledby="district-tab">
                            <select name="state" id="state" class="form-select" onchange="getDistricts(this.value);">
                                <option value="">Select a state</option>
                            </select>
                            <select name="district" id="districtel" class="form-select mt-2" onchange="getSlotsByDistrict(this.value);">
                                <option value="" id="stateOptionDistrict">Select a state first</option>
                            </select>
                        </div>
                        <div class="tab-pane fade show" id="pin" role="tabpanel" aria-labelledby="pin-tab">
                            <form onsubmit="getSlotsByPin();event.preventDefault();">
                                <div class="form-group mb-2">
                                    <input type="text" class="form-control" id="pinele" name="pin" placeholder="Pincode">
                                </div>
                                <div class="form-group mb-2">
                                    <input type="submit" class="btn btn-primary" value="Search">
                                </div>
                            </form>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="card mt-3" id="dataCard" style="display: none">
                <div class="card-header">
                    <div class="row">
                        <div class="col-4">
                            <select name="age" id="age" class="form-select">
                                <option value="">All</option>
                                <option value="18">18+</option>
                                <option value="45">45+</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <select name="vaccine" id="vaccine" class="form-select">
                                <option value="">All</option>
                                <option value="Covishield">Covishield</option>
                                <option value="Covaxin">Covaxin</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <select name="price" id="price" class="form-select">
                                <option value="">All</option>
                                <option value="Free">Free</option>
                                <option value="Paid">Paid</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <button class="btn btn-success mt-3" onclick="filterData();">Filter</button>
                        </div>
                    </div>
                </div>
                <div class="card-body" id="data"></div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{asset("assets/cowin/main.js")}}"></script>
@endsection