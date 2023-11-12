<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kendaraan extends Model
{
    protected $table = 'kendaraan';
    use SoftDeletes;

    protected $fillable = [
        'nama',
        'jenis',
        'model',
        'tahun',
        'jumlah_penumpang',
        'manufaktur',
        'harga',
        'bahan_bakar',
        'luas_bagasi',
        'jumlah_roda',
        'luas_kargo',
        'ukuran_bagasi',
        'kapasitas_bensin',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}

