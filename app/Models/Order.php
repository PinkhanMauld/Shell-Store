<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'fuels', 'name_customer', 'total_price'];

    protected $casts = [
        'fuels' => 'array'
    ];
}
