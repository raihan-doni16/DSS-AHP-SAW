<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai_karyawan extends Model
{
    use HasFactory;
    
    protected $table = 'nilai_karyawan';
    protected $primaryKey = 'id_nilai_karyawan';

    protected $fillable = ['id_karyawan', 'id_alternative', 'id_kriteria', 'id_nilai_alternative'];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }

    public function alternative()
    {
        return $this->belongsTo(NilaiAlternative::class, 'id_alternative');
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria');
    }

    public function nilaiAlternative()
    {
        return $this->belongsTo(NilaiAlternative::class, 'id_nilai_alternative');
    }
}
