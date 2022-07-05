<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    public $primaryKey = 'nip';
    public $incrementing = false;
    public $timestamps = false;

    public function Jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'kode_jabatan', 'kode_jabatan');
    }
    public function Golongan()
    {
        return $this->belongsTo(Golongan::class, 'kode_golongan', 'kode_golongan');
    }
    public function Master_gaji()
    {
        return $this->hasMany(Master_gaji::class, 'nip', 'nip');
    }
}
