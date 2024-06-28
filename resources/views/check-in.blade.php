@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Check-In</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <form action="/check-in" method="POST">
        @csrf
        <div class="form-group">
            <label for="ticket_id">Ticket ID:</label>
            <input type="text" id="ticket_id" name="ticket_id" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Check-In</button>
    </form>
</div>
@endsection
