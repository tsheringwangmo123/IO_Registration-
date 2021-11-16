@extends('layouts.dashboard')
@section('content')
<div class="content-wrapper">
    <form action="/outing" method="post">
    @csrf
    <div class="row" style="padding: 25px">
        <input type="date" class="form-control" name="date"><br><br>
        <input type="text" class="form-control" name="outing_duration" placeholder="Outing Timing"><br><br>
        <input type="text" name="contact" class = "form-control" placeholder="Contact Number"><br><br>
        <textarea name="reason" rows="5" class="form-control"></textarea>
        <input name="name" value="{{ Auth::user()->name }}" hidden>
        <input name="year" value="{{ Auth::user()->year }}" hidden>
        <input name="course" value="{{ Auth::user()->course }}" hidden>
        <input name="section" value="{{ Auth::user()->section }}" hidden>
        <input name="status" value="pending" hidden>
        <div style="padding:5px">
        <button class="btn btn-primary">Submit</button>
        </div>

    </div>
</div>
@endsection
