<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    protected $table = 'order';
    use SoftDeletes;

    protected $fillable = [
        'id_kendaraan',
        'id_customer',
        'jumlah_kendaraan',
        'total_harga',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'id_kendaraan');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer');
    }




}


