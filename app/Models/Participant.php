<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillablele = [
        'sweepstake_id',
        'name',
        'email',
        'awarded_at',
    ];

    public function sweepstake()
    {
        return $this->belongsTo(Sweepstake::class);
    }
}
