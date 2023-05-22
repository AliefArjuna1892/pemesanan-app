@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Room</div>

                    <div class="card-body">
                        <form action="{{ route('admin.rooms.update', $room->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="room_type_id">Room Type</label>
                                <select class="form-control" id="room_type_id" name="room_type_id">
                                    @foreach($roomTypes as $roomType)
                                        <option value="{{ $roomType->id }}" {{ $roomType->id == $room->room_type_id ? 'selected' : '' }}>
                                            {{ $roomType->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="room_name">Room Name</label>
                                <input type="text" class="form-control" id="room_name" name="room_name" value="{{ $room->name }}">
                            </div>

                            <div class="form-group">
                                <label for="area">Area</label>
                                <input type="text" class="form-control" id="area" name="area" value="{{ $room->area }}">
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price" value="{{ $room->price }}">
                            </div>

                            <div class="form-group">
                                <label for="facility">Facility</label>
                                <input type="text" class="form-control" id="facility" name="facility" value="{{ $room->facility }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
