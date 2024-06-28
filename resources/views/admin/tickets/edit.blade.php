@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Ticket</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="/admin/tickets/{{ $ticket->id }}" method="POST">
        @csrf
        <div class="form
