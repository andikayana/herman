<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Alfa6661\AutoNumber\AutoNumberTrait;

class PasienVisitation extends Model
{
    use SoftDeletes;
    use AutoNumberTrait;
    use HasFactory;

    protected $table = 'pasien_visitation';

    protected $fillable = [
        'pasien_id',
        'visit_id',
        'tanggal_kunjungan',
        'sistolik',
        'diastolik',
        'suhu',
        'keluhan',
        'rencana_kerja',
        'diagnosa',
        'dokter_id'
    ];

    public function getAutoNumberOptions()
    {
        return [
            'visit_id' => [
                'format' => function () {
                    return date('Ymd').'?';
                },
                'length' => 4 // Jumlah digit yang akan digunakan sebagai nomor urut
            ]
        ];
    }

    /* public function pasien()
    {
        return $this->hasMany(PasienVisitation::class);
    } */
}
