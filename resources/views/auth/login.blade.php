@extends('layouts.app')
@section("title","Login")
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3>Login</h3>
            <form action="{{route("login")}}" method="post">
                @csrf
                <div class="form-group mb-2">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group mb-2">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group mb-2">
                    <button class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection