<?php

namespace App\Models;

use App\Models\Kegiatan;
use App\Models\Pemesanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaketKegiatan extends Model
{
    use HasFactory;

    protected $table = 'paket_kegiatan'; // nama tabel
    protected $primaryKey = 'id'; // primary key

    /**
     * The attributes that are guarded.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id'
    ];

    public function pemesanan()
    {
    return $this->belongsTo(Kegiatan::class, 'kegiatan_id', 'id');
    }
}
