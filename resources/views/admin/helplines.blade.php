@extends('layouts.app')
@section("title","Covid-19 Helplines")
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h4 class="text-center">Covid-19 Helplines</h4>
            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addModal">Add new helpline</button>
            @if($helplines->count()==0)
            <p>No data found.</p>
            @else
            <table class="table mt-2">
                <thead>
                    <tr>
                        <th>State</th>
                        <th>Phone</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($helplines as $helpline)
                        <tr>
                            <td>{{$helpline->state}}</td>
                            <td>{{$helpline->phone}}</td>
                            <td><button class="btn btn-success" data-id="{{$helpline->id}}" data-state="{{$helpline->state}}" data-phone="{{$helpline->phone}}" onclick="edit(this);">Edit</button></td>
                            <td>
                                <form action="{{route("admin.helpline.delete")}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$helpline->id}}">
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
            {{$helplines->links()}}
        </div>
    </div>
</div>
@endsection
@section('modals')
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h3>Add Helpline</h3>
          <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route("admin.helpline")}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group mb-2">
              <input type="text" class="form-control" name="state" placeholder="State">
          </div>
          <div class="form-group mb-2">
              <input type="text" class="form-control" name="phone" placeholder="Phone Number">
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
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h3>Edit <span id="editState"></span> Helpline</h3>
          <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route("admin.helpline.edit")}}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" id="editId" name="id">
          <div class="form-group mb-2">
              <input type="text" id="editPhone" class="form-control" name="phone" placeholder="Phone Number">
          </div>
          <button type="submit" class="btn btn-success">Edit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script>
    function edit(obj){
        const id = $(obj).data("id");
        const state = $(obj).data("state");
        const phone = $(obj).data("phone");
        $("#editState").html(state);
        $("#editPhone").val(phone);
        $("#editId").val(id);
        $("#editModal").modal("show");
    }
</script>
@endsection