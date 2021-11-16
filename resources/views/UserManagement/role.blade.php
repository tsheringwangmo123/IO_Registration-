@extends('layouts.dashboard')
@section('content')
    <div class="content-wrapper" style="padding:15px">
        <form action="/roles" method="post">
            @csrf
            <div >
                <div class="row">
                    <div class="col-md-9 border border-success">
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <input type="text" name="role_name" class="form-control" placeholder="Role Name">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3" style="padding: 15px">
                                <strong>Create</strong><br>
                                <hr>
                                @foreach($permissions as $permission)
                                    @if($permission->type == "create")
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">&nbsp {{ $permission->name }}
                                        <br>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-md-3" style="padding: 15px">
                                <strong>View</strong><br>
                                <hr>
                                @foreach($permissions as $permission)
                                    @if($permission->type == "view")
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">&nbsp {{ $permission->name }}
                                        <br>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-md-3" style="padding: 15px">
                                <strong>Edit</strong><br>
                                <hr>
                                @foreach($permissions as $permission)
                                    @if($permission->type == "edit")
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">&nbsp {{ $permission->name }}
                                        <br>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-md-3" style="padding: 15px">
                                <strong>Delete</strong><br>
                                <hr>
                                @foreach($permissions as $permission)
                                    @if($permission->type == "delete")
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">&nbsp {{ $permission->name }}
                                        <br>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-success">
                                    <a style="color: whitesmoke">Create Role</a>
                                </button>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-md-3">
                        <div class="border border-dark" style="padding: 15px">
                            <br>
                            <center>
                                <strong style="letter-spacing: 5px">ROLE</strong>
                                <hr>
                            </center>
                                <ul>
                                    @foreach($roles as $role)
                                        <div class="row">
                                            <div class="col-md-8">
                                                <li>{{ $role->name }} &nbsp &nbsp </li>
                                            </div>
                                            <a style="cursor:pointer;" class="danger"onclick="deleteData({{ $role }})">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    @endforeach
                                </ul>

                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
    function deleteData(role){
        let url = "{{ url('deleterole/:id') }}";
        url = url.replace(':id', role.id);
        // document.location.href=url;
        swal({
              title: "Are you sure?",
              text: "You won't be able to revert this!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                document.location.href=url;
                swal("Role deleted successfully.", {
                  icon: "success",
                });
              }
            });
    }
    </script>
@endsection
