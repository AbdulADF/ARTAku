<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class income extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'token',
        'amount',
        'date',
        'User_id',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
