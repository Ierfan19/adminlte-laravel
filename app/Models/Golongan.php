<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use HasFactory;
    protected $table = 'golongan';
    public $primaryKey = 'kode_golongan';
    public $incrementing = false;
    public $timestamps = false;
}
