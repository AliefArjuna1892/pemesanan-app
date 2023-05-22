@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reports</div>

                    <div class="card-body">
                        <form action="{{ route('reports.index') }}" method="GET">
                            <div class="form-group">
                                <label for="room_type">Room Type</label>
                                <select class="form-control" id="room_type" name="room_type">
                                    <option value="">All</option>
                                    @foreach($roomTypes as $roomType)
                                        <option value="{{ $roomType->id }}" @if(request('room_type') == $roomType->id) selected @endif>{{ $roomType->room_type }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ request('start_date') }}">
                            </div>

                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ request('end_date') }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Filter</button>
                        </form>

                        <table class="table mt-3">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Transaction Code</th>
                                    <th>Customer Name</th>
                                    <th>Total Room Price</th>
                                    <th>Total Extra Charge</th>
                                    <th>Final Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->id }}</td>
                                        <td>{{ $transaction->trans_code }}</td>
                                        <td>{{ $transaction->cust_name }}</td>
                                        <td>{{ $transaction->total_room_price }}</td>
                                        <td>{{ $transaction->total_extra_charge }}</td>
                                        <td>{{ $transaction->final_total }}</td>
                                        <td>
                                            <a href="{{ route('transactions.show', $transaction->id) }}" class="btn btn-sm btn-primary">Details</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $transactions->appends(request()->except('page'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
