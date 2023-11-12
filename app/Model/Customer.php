<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    protected $table = 'customer';
    use SoftDeletes;

    protected $fillable = [
        'nama',
        'alamat',
        'notelp',
        'IDcard',
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


