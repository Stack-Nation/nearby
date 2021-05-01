@extends('layouts.app')
@section("title","Pending Volunteers")
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h4 class="text-center">Volunteering Requests</h4>
            @if($volunteers->count()==0)
            <p>No data found.</p>
            @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone number</th>
                        <th>Category</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($volunteers as $volunteer)
                        <tr>
                            <td>{{$volunteer->name}}</td>
                            <td>{{$volunteer->email}}</td>
                            <td>{{$volunteer->phone}}</td>
                            <td>{{$volunteer->category}}</td>
                            <td>
                                <form action="{{route("admin.volunteers.approve")}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$volunteer->id}}">
                                    <button class="btn btn-success">Approve</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{route("admin.volunteers.delete")}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$volunteer->id}}">
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection