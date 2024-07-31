
@extends('layout')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Contact Details</h1>

        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <h5 class="card-title">Contact Information</h5>
                    <p><strong>Name:</strong> {{ $contact->name }}</p>
                    <p><strong>Email:</strong> {{ $contact->email }}</p>
                    <p><strong>Phone:</strong> {{ $contact->phone }}</p>
                    <p><strong>Address:</strong> {{ $contact->address }}</p>
                    <p><strong>Created At:</strong> {{ $contact->created_at->format('d-m-Y H:i:s') }}</p>
                    <p><strong>Updated At:</strong> {{ $contact->updated_at->format('d-m-Y H:i:s') }}</p>
                </div>

                <div class="d-flex">
                    <a href="{{ url('/contacts/' . $contact->id . '/edit') }}" class="btn btn-warning  mr-3">Edit</a>
                    <form action="{{ url('/contacts/' . $contact->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mr-3" onclick="return confirm('Are you sure you want to delete this contact?')">Delete</button>
                    </form>
                    <a href="{{ url('/contacts') }}" class="btn btn-secondary ms-2">Back to List</a>
                </div>
            </div>
        </div>
    </div>
@endsection
