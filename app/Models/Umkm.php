<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    protected $fillable = [
        'user_id',
        'nama_umkm',
        'kategori_id',
        'kecamatan',
        'latitude',
        'longitude',
        'alamat',
        'foto',
        'deskripsi',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'kategori_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
