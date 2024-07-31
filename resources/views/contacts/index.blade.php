<!-- resources/views/contacts/index.blade.php -->

@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <h4 class="card-title">Search Contact</h4>

                    </div>

                    <form method="GET" action="">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" id="name" name="name" value="{{ Request()->name }}" class="form-control" placeholder="Enter Name">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" id="email" name="email" value="{{ Request()->email }}" class="form-control" placeholder="Enter Email">
                                </div>
                            </div>

                        <div class="col-sm-3 mt-4">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <a href="{{ url('/contacts') }}" class="btn btn-danger">Reset</a>

                </div>
                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <h4 class="card-title">Contacts List</h4>
                        <div class="d-flex align-items-center">
                            <a href="{{ url('/contacts/create') }}" class="btn btn-primary">Add Contact</a>
                        </div>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ $contact->address }}</td>
                                    <td>{{ date('d-m-Y', strtotime($contact->created_at)) }}</td>
                                    <td>
                                        <a href="{{ url('/contacts/' . $contact->id) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ url('/contacts/' . $contact->id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ url('/contacts/' . $contact->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this contact?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="12" class="text-center text-danger">No Record Found</td>
                                </tr>

                                @endforelse
                        </tbody>
                    </table>

                    <div class="pagination">
                        {{ $contacts->appends(['name' => request()->get('name'), 'email' => request()->get('email')])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
