<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master_gaji extends Model
{
    use HasFactory;
    protected $table = 'master_gaji';
    public $primaryKey = 'id';
    public $timestamps = false;
    
    public function Pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'nip', 'nip');
    }
}
