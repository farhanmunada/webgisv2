<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['nama_kategori'];

    public function umkms()
    {
        return $this->hasMany(Umkm::class);
    }
}
