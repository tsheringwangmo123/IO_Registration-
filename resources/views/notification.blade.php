@extends('layouts.dashboard')

@section('content')

<div class="content-wrapper" style="padding:25px">
  <table class="table ">
      <thead class="table-dark">
          <th>Name</th>
          <th>Course</th>
          <th>Year</th>
          <th>Section</th>
          <th>Date</th>
          <th>Reason</th>
          <th>Outing Duration</th>
          <th>Status</th>
          <th>Action</th>
      </thead>
      <tbody class="table-hover">
          @foreach($outing as $o)
          <tr>
              <td>{{ $o->name }}</td>
              <td>{{ $o->course }}</td>
              <td>{{ $o->year }}</td>
              <td>{{ $o->section }}</td>
              <td>{{ $o->date }}</td>
              <td>{{ $o->reason }}</td>
              <td>{{ $o->outing_duration }}</td>
              <td>{{ $o->status }}</td>
              <td><button class="btn btn-success" onclick="approve({{ $o->id }})">Approve</button> <button class="btn btn-danger" onclick="cancel({{ $o->id }})">Decline</button></td>
          </tr>
          @endforeach
      </tbody>
  </table>
</div>
<script>
    function approve(id){
        $.ajax({
              url: "updatestatus"+"/"+id+"-"+"approved",
              type:"GET",
              success: function(res) {
                  window.location.reload();
              },
              error: function(error) {
                  console.log(error)
            }
          });
    }
    function cancel(id){
        $.ajax({
              url: "updatestatus"+"/"+id+"-"+"rejected",
              type:"GET",
              success: function(res) {
                window.location.reload();
              },
              error: function(error) {
                  console.log(error)
            }
          });
    }
</script>
@endsection
