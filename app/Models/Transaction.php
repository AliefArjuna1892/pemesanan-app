<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'trans_code',
        'trans_date',
        'cust_name',
        'total_room_price',
        'total_extra_charge',
        'final_total',
    ];

    public function details()
    {
        return $this->hasMany(DetailTransaction::class);
    }
}
