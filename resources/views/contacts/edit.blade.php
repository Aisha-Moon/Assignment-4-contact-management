@extends('layout')

@section('content')
    <h1 class="mb-4">Edit Contact</h1>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="/contacts/{{ $contact->id }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $contact->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ $contact->email }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone:</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="{{ $contact->phone }}">
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address:</label>
                        <input type="text" id="address" name="address" class="form-control" value="{{ $contact->address }}">
                    </div>

                    <div class="d-flex ">
                        <button type="submit" class="btn btn-primary mr-3">Update</button>
                        <a href="{{ url('/contacts') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
