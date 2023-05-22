@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Transactions</div>

                    <div class="card-body">
                        <a href="{{ route('transactions.create') }}" class="btn btn-primary mb-3">Add Transaction</a>

                        <table class="table">
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

                        {{ $transactions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
