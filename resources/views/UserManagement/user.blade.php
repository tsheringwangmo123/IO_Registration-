@extends('layouts.dashboard')
@section('content')
    <div class="content-wrapper row">
        <div class="col-md-12" style="padding: 25px">
            <div class="border border-success" style="padding: 15px">
                <input type="text" class="form-control"  id="myInput" onkeyup="search()" placeholder="Search for users..">
                <table class="table" id="myTable">
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Course</th>
                        <th>Year</th>
                        <th>Section</th>
                        <th>Action</th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <center><a class="primary" style="cursor:pointer" onclick="edit({{ $user }})"><i class="fas fa-eye"></i></a></center>
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->gender }}</td>
                            <td>{{ $user->course }}</td>
                            <td>{{ $user->year }}</td>
                            <td>{{ $user->section }}</td>
                            <td>
                                <a class="text-danger" style="cursor:pointer;" onclick="deletedata({{ $user }})"><i class="fas fa-user-minus"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div id="userModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-xl">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <strong>User</strong>
                    </h5>
                    <button type="button" onclick="resetModel()" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="/users" method="post">
                        @csrf
                        <div class="row" style="padding: 15px">
                            <div class="col-md-6">
                               <input type="text" name="name" class="form-control" placeholder="Full Name" required id="name"><br>
                                <select name="gender" class="form-control" required id="gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select><br>
                                <input type="text" name="id" id="id" hidden>
                                <input type="text" name="year" class="form-control" placeholder="Year" required><br>
                                <select name="role" class="form-control" required id="role">
                                    <option>------ Choose Role ---------</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select><br>
                            </div>
                            <div class="col-md-6">
                               <input type="text" name="email" class="form-control" placeholder="email address" required id="email"><br>
                                <input type="text" name="course" class="form-control" placeholder="Course" required><br>
                                <input type="text" name="section" class="form-control" placeholder="Section" required><br>
                                <input type="text" name="password" class="form-control" placeholder="Password" required>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="" class="btn btn-success"  style="color: whitesmoke">
                    <button type="button" onclick="resetModel()" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <button type="button" class="floatingButton" data-toggle="modal" data-target="#userModal">&nbsp<i class="fas fa-plus nav-icon">&nbsp</i></button>
    <script>
        function resetModel(data){
            $('#name').val('')
            $('#email').val('')
            $('#password').val('')
            $("#address").val('')
            $("#dzongkhag").val('')
            $('#gender').val('')
            $('#role').val('')
            $('#contact').val('')
            $("#id").val('')
        }
        function edit(data){
            $('#userModal').modal('show')
            $('#name').val(data.name)
            $('#email').val(data.email)
            $('#password').val(data.password)
            $("#address").val(data.address)
            $("#dzongkhag").val(data.dzongkhag)
            $('#gender').val(data.gender)
            $('#role').val(data.role)
            $('#contact').val(data.contact_no)
            $("#id").val(data.id);
        }
        function deletedata(user){
        let url = "{{ url('deleteuser/:id') }}";
        url = url.replace(':id', user.id);
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
                swal("User deleted successfully.", {
                  icon: "success",
                });
              }
            });
    }
    function search() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        td1 =  tr[i].getElementsByTagName("td")[2];
        if (td) {
        txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }       
    }
    }
    </script>
@endsection
