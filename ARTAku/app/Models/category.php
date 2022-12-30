<?php

namespace App\Models;

use App\Models\Expense;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    public function expense()
    {
        return $this->hasMany(Expense::class);
    }
}
