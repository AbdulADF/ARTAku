<?php

namespace App\Models;

use App\Models\Income;
use App\Models\Expense;
use App\Models\BudgetingPlan;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
    ];

    public function incomes()
    {
        return $this->hasMany(Income::class);
    }

    public function budgeting_plan()
    {
        return $this->belongsTo(budgeting_plan::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
}
