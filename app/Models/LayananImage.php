<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananImage extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected function layanan()
    {
        return $this->belongsTo(Layanan_poliklinik::class);
    }
}
