@extends('layouts.app')
@section("title","Apply for volunteering")
@section('head')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-10">
            <h3 class="text-center text-capitalize">Volunteer with us</h3>
            <form action="{{route("apply-volunteer")}}" method="post">
                @csrf
                <div class="form-group mb-2">
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
                <div class="form-group mb-2">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group mb-2">
                    <input type="text" name="phone" class="form-control" placeholder="Phone number">
                </div>
                <div class="form-group mb-2">
                    <select name="category" id="category" class="form-control">
                        <option value="">Select a category</option>
                        <option value="Resource Verifier">Resource Verifier</option>
                        <option value="Connection">Connection</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <button class="btn btn-primary">Apply</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection