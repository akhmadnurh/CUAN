<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Mutations extends Model
{
    use HasFactory;
    protected $table = 'mutations';
    protected $primaryKey = 'mutation_id';
    protected $fillable = [
        'user_id',
        'type_id',
        'category_id',
        'date',
        'time',
        'description',
        'total',
    ];
}
