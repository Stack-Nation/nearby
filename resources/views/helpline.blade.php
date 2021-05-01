@extends('layouts.app')
@section("title","Covid-19 Helpline")
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h4 class="text-center">Covid-19 Helpline</h4>
            @if($helplines->count()==0)
            <p>No helpline found.</p>
            @else
            <select name="state" id="state" class="form-control" onchange="document.getElementById('phone').innerHTML=this.value;">
                <option value="">Select a state</option>
                @foreach($helplines as $helpline)
                <option value="{{$helpline->phone}}">{{$helpline->state}}</option>
                @endforeach
            </select>
            @endif
            <p id="phone" class="mt-4"></p>
        </div>
    </div>
</div>
@endsection