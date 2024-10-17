<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    use HasFactory;

    public $table = 'fuels';
    protected $fillable = [ 'type', 'price', 'stock'];
    // protected $nullable = ['name'];
}
