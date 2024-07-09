<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kriteria extends Model
{
    use HasFactory;
    protected $table = 'kriteria';
    protected $primaryKey = 'id_kriteria';

    protected $fillable = ['nama_kriteria', 'tipe'];

    public function bobotKriteria()
    {
        return $this->hasMany(BobotKriteria::class, 'id_kriteria');
    }

    public function nilaiAlternative()
    {
        return $this->hasMany(NilaiAlternative::class, 'id_kriteria');
    }

    public function nilaiKaryawan()
    {
        return $this->hasMany(NilaiKaryawan::class, 'id_kriteria');
    }
}
