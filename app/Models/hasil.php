<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hasil extends Model
{
    use HasFactory;
    protected $table = 'hasil';
    protected $primaryKey = 'id_hasil';

    protected $fillable = ['id_karyawan', 'hasil'];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }
}
