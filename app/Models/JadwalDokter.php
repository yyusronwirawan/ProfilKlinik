<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class JadwalDokter extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }
    protected function poliklinik()
    {
        return $this->belongsTo(Layanan_poliklinik::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('dokter_id', 'like', '%' . $search . '%');
        });
    }
}
