@extends('layout')

@section('content')
<div class="container mt-5">
    <h1>Edit Contact</h1>
    <form method="POST" action="/contacts/{{ $contact->id }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $contact->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $contact->email }}" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $contact->phone }}">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $contact->address }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ url('/contacts') }}" class="btn btn-danger">Cancel</a>
    </form>
</div>
@endsection
