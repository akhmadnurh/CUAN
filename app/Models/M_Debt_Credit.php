<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Debt_Credit extends Model
{
    use HasFactory;
    protected $table = 'debt_credits';
    protected $primaryKey = 'debt_id';
    protected $fillable = [
        'user_id',
        'paid',
        'status',
        'nominal',
    ];
   
}
