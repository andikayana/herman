<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Alfa6661\AutoNumber\AutoNumberTrait;

class PasienVisitation extends Model
{
    use HasFactory;

    use SoftDeletes;
    use AutoNumberTrait;

    protected $table = 'pasien_visitation';
}
