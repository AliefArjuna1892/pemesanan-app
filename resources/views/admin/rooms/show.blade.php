@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Room Details</div>

                    <div class="card-body">
                        <p><strong>ID:</strong> {{ $room->id }}</p>
                        <p><strong>Room Type:</strong> {{ $room->roomType->name }}</p>
                        <p><strong>Room Name:</strong> {{ $room->name }}</p>
                        <p><strong>Area:</strong> {{ $room->area }}</p>
                        <p><strong>Price:</strong> {{ $room->price }}</p>
                        <p><strong>Facility:</strong> {{ $room->facility }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
