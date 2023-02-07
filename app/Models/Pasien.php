<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pasien extends Model
{
    use SoftDeletes;
    protected $table = 'pasien';
    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'alamat'
    ];
    protected $hidden;
}
