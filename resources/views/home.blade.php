@extends('layouts.dashboard')

@section('content')
<div class="content-wrapper" style="padding:25px">
   <center> <font face = "Monotype Corsiva" size = "25" color="orange">Welcome To</font><center><br>
  
    {{-- <center><font size = "">Welcome to IO-Registration</font> </center><br> --}}
  <table class="table ">
      {{-- <thead class="table-dark">
          <th>Date</th>
          <th>Reason</th>
          <th>Outing Duration</th>
          <th>Status</th>
      </thead> --}}
 <center><img src="/Dashboard/images/1.png" alt="" height="400" width="800" > </center>


      
      <tbody class="table-hover">
          @foreach($outing as $o)
          @if($o->name == Auth::user()->name)
          <tr>
              <td>{{ $o->name }}</td>
              <td>{{ $o->reason }}</td>
              <td>{{ $o->outing_duration }}</td>
              <td>{{ $o->status }}</td>
          </tr>
          @endif
          @endforeach
      </tbody>
  </table>
</div>
@endsection
