<?php

namespace App\Models;

use App\Models\Promosi;
use App\Models\PaketKegiatan;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';

    protected $fillable =[
        'nama',
        'harga',
        'konten',
        'paket_kegiatan_id',
        'gambar_nama',
        'gambar_path',
        'tanggal_mulai_promo',
        'tanggal_selesai_promo',
        'status',
        'harga_promo',
        'konten_promo',
        'created_by', 
        'updated_by',
    ];

    public function paket_kegiatan()
    {
        return $this->belongsTo(PaketKegiatan::class, 'paket_kegiatan_id', 'id');
    }

    public function promosi()
    {
        return $this->hasMany(Promosi::class);
    }

    /**
    * Function untuk memanggil created_at dengan format tertentu.
    */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y H:i:s');
    }

    /**
    * Function untuk memanggil updated_at dengan format tertentu.
    */
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y H:i:s');
    }
}
