<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Lowongan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('posisi', 'like', '%' . $search . '%');
        });
    }

    public function lamaran()
    {
        return $this->hasMany(Lamaran::class);
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('d F Y');
    }

    public function getPeriodeAkhirAttribute()
    {
        return Carbon::parse($this->attributes['periode_akhir'])->translatedFormat('d F Y');
    }
}
