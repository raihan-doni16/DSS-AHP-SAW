<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hasil extends Model
{
    use HasFactory;
    protected $table = 'hasil';
    protected $primaryKey = 'id_hasil';

    protected $fillable = ['nama_karyawan', 'hasil'];

}
