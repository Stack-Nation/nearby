@extends('layouts.app')
@section("title","Home")
@section('head')
<style>
    #map{
        height:500px;
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
            <p>Data</p>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcbPnM3CegYU_yShaxZrMQgl_WOPTqbrE&callback=initMap">
</script>
<script>
    let map;

    function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: -34.397, lng: 150.644 },
        zoom: 8,
    });
    }
</script>
@endsection