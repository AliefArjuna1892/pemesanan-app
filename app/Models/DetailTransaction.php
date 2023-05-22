<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'room_id',
        'days',
        'sub_total_room',
        'extra_charge_id',
        'quantity',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function extraCharge()
    {
        return $this->belongsTo(ExtraCharge::class);
    }
}
