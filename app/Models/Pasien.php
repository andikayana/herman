<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Pasien extends Model
{
    use SoftDeletes;
    use AutoNumberTrait;
    use HasFactory;

    protected $table = 'pasien';
    protected $fillable = [
        'norm',
        'nama',
        'jenis_kelamin',
        'alamat'
    ];
    protected $hidden;

    public function getAutoNumberOptions()
    {
        return [
            'norm' => [
                // 'format' => '?', // Format kode yang akan digunakan.
                'length' => 6 // Jumlah digit yang akan digunakan sebagai nomor urut
            ]
        ];
    }

}
