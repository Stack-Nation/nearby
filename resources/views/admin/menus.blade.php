@extends('layouts.app')
@section("title","Menu Links")
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h4 class="text-center">Menu Links</h4>
            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addModal">Add new menu</button>
            @if($menus->count()==0)
            <p>No data found.</p>
            @else
            <table class="table mt-2">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Link</th>
                        <th>Icon</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menus as $menu)
                        <tr>
                            <td>{{$menu->title}}</td>
                            <td>{{$menu->link}}</td>
                            <td>{{$menu->icon}}</td>
                            <td><button class="btn btn-success" data-id="{{$menu->id}}" data-title="{{$menu->title}}" data-link="{{$menu->link}}" data-icon="{{$menu->icon}}" onclick="edit(this);">Edit</button></td>
                            <td>
                                <form action="{{route("admin.menu.delete")}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$menu->id}}">
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
            {{$menus->links()}}
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
        <form action="{{route("admin.menu")}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group mb-2">
              <input type="text" class="form-control" name="title" placeholder="Title">
          </div>
          <div class="form-group mb-2">
              <input type="text" class="form-control" name="link" placeholder="Link">
          </div>
          <div class="form-group mb-2">
              <input type="text" class="form-control" name="icon" placeholder="Icon">
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
          <h3>Edit Menu</h3>
          <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route("admin.menu.edit")}}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" id="editId" name="id">
          <div class="form-group mb-2">
              <input type="text" id="editTitle" class="form-control" name="title" placeholder="Title">
          </div>
          <div class="form-group mb-2">
              <input type="text" id="editLink" class="form-control" name="link" placeholder="Link">
          </div>
          <div class="form-group mb-2">
              <input type="text" id="editIcon" class="form-control" name="icon" placeholder="Icon">
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
        const title = $(obj).data("title");
        const link = $(obj).data("link");
        const icon = $(obj).data("icon");
        $("#editTitle").val(title);
        $("#editLink").val(link);
        $("#editIcon").val(icon);
        $("#editId").val(id);
        $("#editModal").modal("show");
    }
</script>
@endsection