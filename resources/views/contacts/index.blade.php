@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto p-5">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="align-items-start">
                            <h3>Contact List</h3>
                        </div>
                        <div class="align-items-end">
                            <a href="{{ route('contacts.create') }}" class="btn btn-success">Add Contact</a>
                        </div>
                    </div>
                    @session('success')
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endsession
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($contacts as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <div>
                                                    <a href="{{ route('contacts.edit', $item->id) }}"
                                                        class="btn btn-warring btn-sm">Edit</a>
                                                </div>
                                                <form action="{{ route('contacts.destroy', $item->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                        {{ $contacts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
