<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NannyBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'price',
        'start_datetime',
        'end_datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
