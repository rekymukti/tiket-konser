@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tickets</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
            <tr>
                <td>{{ $ticket->ticket_id }}</td>
                <td>{{ $ticket->name }}</td>
                <td>{{ $ticket->email }}</td>
                <td>{{ $ticket->phone }}</td>
                <td>
                    <a href="/admin/tickets/{{ $ticket->id }}/edit" class="btn btn-primary">Edit</a>
                    <form action="/admin/tickets/{{ $ticket->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
