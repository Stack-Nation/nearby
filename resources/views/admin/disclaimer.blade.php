@extends('layouts.app')
@section("title","Disclaimer")
@section('head')
<style>
    .description{
        border-radius: 3px;
        height:100px;
        border:0.7px solid #DFE5EC;
        padding: 0.5rem 1rem;
        overflow: auto;
        background:#FFFFFF;
    }
    [contenteditable=true]:empty:before{
        content: attr(placeholder);
        pointer-events: none;
        display: block; /* For Firefox */
        color: #C0CCDD;
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h4 class="text-center">Disclaimer</h4>
            @if($disclaimer===NULL)
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#disclaimerModal">Add Disclaimer</button>
            @else
            <form action="{{route("admin.disclaimer.edit")}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group mb-2">
                  <input type="text" class="form-control" name="title" value="{{$disclaimer->title}}" placeholder="Disclaimer Title">
              </div>
              <div class="form-group mb-2">
                  <input type="file" class="form-control" name="image" accept=".png,.jpeg,.jpg" placeholder="Disclaimer Image">
              </div>
              <div class="form-group mb-2">
                  <textarea name="description" id="des" hidden>{{$disclaimer->description}}</textarea>
                  <div class="description" contenteditable="true" placeholder="Description" onkeyup="document.getElementById('des').value=this.innerHTML;">{!!$disclaimer->description!!}</div>
              </div>
              <button type="submit" class="btn btn-success">Add</button>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection
@if($disclaimer===NULL)
@section('modals')
<div class="modal fade" id="disclaimerModal" tabindex="-1" aria-labelledby="disclaimerLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h3>Add Disclaimer</h3>
          <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route("admin.disclaimer")}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group mb-2">
              <input type="text" class="form-control" name="title" placeholder="Disclaimer Title">
          </div>
          <div class="form-group mb-2">
              <input type="file" class="form-control" name="image" accept=".png,.jpeg,.jpg" placeholder="Disclaimer Image">
          </div>
          <div class="form-group mb-2">
              <textarea name="description" id="des" hidden></textarea>
              <div class="description" contenteditable="true" placeholder="Description" onkeyup="document.getElementById('des').value=this.innerHTML;"></div>
          </div>
          <button type="submit" class="btn btn-success">Add</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
@endif