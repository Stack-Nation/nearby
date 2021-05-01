@extends('layouts.app')
@section("title","Volunteers")
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h4 class="text-center">Volunteers</h4>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
            {{$volunteers->links()}}
        </div>
    </div>
</div>
@endsection