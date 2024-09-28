<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class NotifikasiBadgeController extends Controller
{
    public function badgeNotifAdmin()
    {
        // ambil notifikasi registrasi user baru
        $pemesanan = Pemesanan::where('status', 0) // status permohonan Verifikasi Berkas
        ->get()->count();
        $notifikasi['pemesanan'] = $pemesanan; //asosiate array
    
    return $notifikasi;
    }
}
