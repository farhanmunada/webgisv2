<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'umkm_id',
        'nama_produk',
        'foto_produk',
        'deskripsi',
        'harga',
    ];

    public function umkm()
    {
        return $this->belongsTo(Umkm::class);
    }
}
