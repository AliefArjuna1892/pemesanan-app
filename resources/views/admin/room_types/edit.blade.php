@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Room Type</div>

                    <div class="card-body">
                        <form action="{{ route('admin.room_types.update', $roomType->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="room_type">Room Type</label>
                                <input type="text" class="form-control" id="room_type" name="room_type" value="{{ $roomType->room_type }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
