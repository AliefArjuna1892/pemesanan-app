<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraphController extends Controller
{
    public function index(Request $request)
    {
        $startPeriod = $request->input('start_period', Carbon::now()->subMonth()->format('Y-m-d'));
        $endPeriod = $request->input('end_period', Carbon::now()->format('Y-m-d'));

        $roomTypes = RoomType::pluck('room_type');
        $transactions = Transaction::whereBetween('trans_date', [$startPeriod, $endPeriod])
            ->with('details.room.roomType')
            ->get();

        $data = [];

        foreach ($roomTypes as $roomType) {
            $roomTypeTransactions = $transactions->filter(function ($transaction) use ($roomType) {
                return $transaction->details->pluck('room.roomType.room_type')->contains($roomType);
            });

            $totalRoomPrice = $roomTypeTransactions->sum(function ($transaction) {
                return $transaction->details->sum('sub_total_room');
            });

            $totalExtraCharge = $roomTypeTransactions->sum(function ($transaction) {
                return $transaction->details->sum(function ($detail) {
                    return $detail->extraCharge->price * $detail->quantity;
                });
            });

            $finalTotal = $roomTypeTransactions->sum('final_total');

            $data[] = [
                'room_type' => $roomType,
                'total_room_price' => $totalRoomPrice,
                'total_extra_charge' => $totalExtraCharge,
                'final_total' => $finalTotal,
            ];
        }

        return view('graphs.index', compact('data', 'startPeriod', 'endPeriod'));
    }
}
