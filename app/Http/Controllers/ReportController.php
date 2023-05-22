<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $transactions = Transaction::query();

        if ($request->has('room_type')) {
            $transactions->whereHas('details.room', function ($query) use ($request) {
                $query->where('room_type_id', $request->room_type);
            });
        }

        if ($request->has('start_date') && $request->has('end_date')) {
            $transactions->whereBetween('trans_date', [$request->start_date, $request->end_date]);
        }

        $transactions = $transactions->with('details')->paginate(10);

        return view('reports.index', compact('transactions'));
    }
}
