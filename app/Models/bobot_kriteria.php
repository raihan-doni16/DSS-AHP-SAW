<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bobot_kriteria extends Model
{
    use HasFactory;
    protected $table = 'bobot_kriteria';
    protected $primaryKey = 'id_bobot';

    protected $fillable = ['id_kriteria', 'nilai'];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria');
    }
}
