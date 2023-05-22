@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Transaction</div>

                    <div class="card-body">
                        <form action="{{ route('transactions.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="trans_code">Transaction Code</label>
                                <input type="text" class="form-control" id="trans_code" name="trans_code">
                            </div>

                            <div class="form-group">
                                <label for="trans_date">Transaction Date</label>
                                <input type="date" class="form-control" id="trans_date" name="trans_date">
                            </div>

                            <div class="form-group">
                                <label for="cust_name">Customer Name</label>
                                <input type="text" class="form-control" id="cust_name" name="cust_name">
                            </div>

                            <div id="rooms-container">
                                <div class="room-form">
                                    <hr>
                                    <h5>Room 1</h5>
                                    <div class="form-group">
                                        <label for="room_id_1">Room</label>
                                        <select class="form-control" id="room_id_1" name="room_id[]">
                                            @foreach($rooms as $room)
                                                <option value="{{ $room->id }}">{{ $room->room_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="days_1">Number of Days</label>
                                        <input type="number" class="form-control" id="days_1" name="days[]" min="1">
                                    </div>
                                    <div class="form-group">
                                        <label for="extra_charge_id_1">Extra Charge</label>
                                        <select class="form-control" id="extra_charge_id_1" name="extra_charge_id[]">
                                            @foreach($extraCharges as $extraCharge)
                                                <option value="{{ $extraCharge->id }}">{{ $extraCharge->charge_name }} - {{ $extraCharge->price }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity_1">Quantity</label>
                                        <input type="number" class="form-control" id="quantity_1" name="quantity[]" min="1">
                                    </div>
                                </div>
                            </div>

                            <button type="button" class="btn btn-primary" id="add-room-btn">Add Room</button>

                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var roomIndex = 2;

            $('#add-room-btn').click(function() {
                var roomForm = `
                    <div class="room-form">
                        <hr>
                        <h5>Room ${roomIndex}</h5>
                        <div class="form-group">
                            <label for="room_id_${roomIndex}">Room</label>
                            <select class="form-control" id="room_id_${roomIndex}" name="room_id[]">
                                @foreach($rooms as $room)
                                    <option value="{{ $room->id }}">{{ $room->room_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="days_${roomIndex}">Number of Days</label>
                            <input type="number" class="form-control" id="days_${roomIndex}" name="days[]" min="1">
                        </div>
                        <div class="form-group">
                            <label for="extra_charge_id_${roomIndex}">Extra Charge</label>
                            <select class="form-control" id="extra_charge_id_${roomIndex}" name="extra_charge_id[]">
                                @foreach($extraCharges as $extraCharge)
                                    <option value="{{ $extraCharge->id }}">{{ $extraCharge->charge_name }} - {{ $extraCharge->price }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantity_${roomIndex}">Quantity</label>
                            <input type="number" class="form-control" id="quantity_${roomIndex}" name="quantity[]" min="1">
                        </div>
                    </div>
                `;

                $('#rooms-container').append(roomForm);

                roomIndex++;
            });
        });
    </script>
@endsection
