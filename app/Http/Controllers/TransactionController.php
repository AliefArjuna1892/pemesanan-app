<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaction;
use App\Models\ExtraCharge;
use App\Models\Room;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('details')->paginate(10);

        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $rooms = Room::all();
        $extraCharges = ExtraCharge::all();

        return view('transactions.create', compact('rooms', 'extraCharges'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'trans_code' => 'required',
            'trans_date' => 'required|date',
            'cust_name' => 'required',
            'room_id' => 'required|array',
            'room_id.*' => 'required|exists:rooms,id',
            'days' => 'required|array',
            'days.*' => 'required|integer|min:1',
            'extra_charge_id' => 'required|array',
            'extra_charge_id.*' => 'required|exists:extra_charges,id',
            'quantity' => 'required|array',
            'quantity.*' => 'required|integer|min:1',
        ]);

        $transaction = Transaction::create([
            'trans_code' => $request->trans_code,
            'trans_date' => $request->trans_date,
            'cust_name' => $request->cust_name,
        ]);

        $totalRoomPrice = 0;
        $totalExtraCharge = 0;

        foreach ($request->room_id as $index => $roomId) {
            $room = Room::find($roomId);

            $subTotalRoom = $room->price * $request->days[$index];
            $totalRoomPrice += $subTotalRoom;

            $extraCharge = ExtraCharge::find($request->extra_charge_id[$index]);
            $subTotalExtraCharge = $extraCharge->price * $request->quantity[$index];
            $totalExtraCharge += $subTotalExtraCharge;

            DetailTransaction::create([
                'transaction_id' => $transaction->id,
                'room_id' => $roomId,
                'days' => $request->days[$index],
                'sub_total_room' => $subTotalRoom,
                'extra_charge_id' => $request->extra_charge_id[$index],
                'quantity' => $request->quantity[$index],
            ]);
        }

        $finalTotal = $totalRoomPrice + $totalExtraCharge;

        $transaction->update([
            'total_room_price' => $totalRoomPrice,
            'total_extra_charge' => $totalExtraCharge,
            'final_total' => $finalTotal,
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }
}
