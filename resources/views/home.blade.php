@extends('layouts.dashboard')

@section('content')
<div class="content-wrapper" style="padding:25px">
    <center><h5>Welcome to IO-Registration</h5></center><br>
  <table class="table ">
      {{-- <thead class="table-dark">
          <th>Date</th>
          <th>Reason</th>
          <th>Outing Duration</th>
          <th>Status</th>
      </thead> --}}
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
