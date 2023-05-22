<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_type_id',
        'room_name',
        'area',
        'price',
        'facility',
    ];

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }

    public function transactions()
    {
        return $this->hasMany(DetailTransaction::class);
    }
}
