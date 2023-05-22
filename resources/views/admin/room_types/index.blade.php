@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Room Types</div>

                    <div class="card-body">
                        <a href="{{ route('admin.room_types.create') }}" class="btn btn-primary mb-3">Add Room Type</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Room Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roomTypes as $roomType)
                                    <tr>
                                        <td>{{ $roomType->id }}</td>
                                        <td>{{ $roomType->room_type }}</td>
                                        <td>
                                            <a href="{{ route('admin.room_types.edit', $roomType->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('admin.room_types.destroy', $roomType->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this room type?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $roomTypes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
