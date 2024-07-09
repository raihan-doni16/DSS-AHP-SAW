<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    use HasFactory;
    protected $table = 'karyawan';
    protected $primaryKey = 'id_karyawan';

    protected $fillable = ['nama_karyawan'];

    public function nilaiKaryawan()
    {
        return $this->hasMany(NilaiKaryawan::class, 'id_karyawan');
    }

    public function hasil()
    {
        return $this->hasOne(Hasil::class, 'id_karyawan');
    }
}
