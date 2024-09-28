<?php

namespace App\Models;

use App\Models\Kegiatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promosi extends Model
{
    use HasFactory;

    protected $table = 'promosi';

    protected $fillable =[
        'nama',
        'harga',
        'konten',
        'kegiatan_id',
        'paket_kegiatan_id',
        'gambar_nama',
        'gambar_path',
        'tanggal',
        'status',
        'created_by', 
        'updated_by',
    ];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}
