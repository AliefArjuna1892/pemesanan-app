@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Manage Rooms</div>

                    <div class="card-body">
                        <a href="{{ route('admin.rooms.create') }}" class="btn btn-primary mb-3">Add New Room</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Room Type</th>
                                    <th>Room Name</th>
                                    <th>Area</th>
                                    <th>Price</th>
                                    <th>Facility</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rooms as $room)
                                    <tr>
                                        <td>{{ $room->id }}</td>
                                        <td>{{ $room->roomType->name }}</td>
                                        <td>{{ $room->name }}</td>
                                        <td>{{ $room->area }}</td>
                                        <td>{{ $room->price }}</td>
                                        <td>{{ $room->facility }}</td>
                                        <td>
                                            <a href="{{ route('admin.rooms.edit', $room->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="POST" style="display: inline-block;">
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
                </div>
            </div>
        </div>
    </div>
@endsection
