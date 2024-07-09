<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai_alternative extends Model
{
    use HasFactory;
    protected $table = 'nilai_alternative';
    protected $primaryKey = 'id_nilai_alternative';

    protected $fillable = ['id_kriteria', 'nilai'];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria');
    }

    public function nilaiKaryawan()
    {
        return $this->hasMany(NilaiKaryawan::class, 'id_nilai_alternative');
    }
}
