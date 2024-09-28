<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Function untuk mengarahkan admin ke halaman dashboard.
	 * 
     * Akses:
     * - Admin
	 * 
	 * 
     * 
	 * Method: GET
     * URL: /admin/dashboard
     * 
     * @param  Request  $request
     * @return void
     */
    public function DashboardAdmin()
    {
        // ========================= PROSES VERIFIKASI ========================
        // cek session user
        if (!Auth::check()) {
            return redirect('/login');
        }

        // cek role user, hanya bisa diakses oleh TIM SELEKSI dengan role_id 2
        if(session()->get('role_id') != 1){
            return redirect('/');
        }

        // Ambil badge notifikasi dari controller NotifikasiController
        $badgeNotif = (new NotifikasiBadgeController)->badgeNotifAdmin();
        session()->put('badgeNotif', $badgeNotif); // Simpan ke session untuk digunakan di view
        
        // buat variabel untuk dikirim ke halaman view
        $judul = "Dashboard";
        $menu = "Dashboard";
        $page = "Overview";

        $totalKegiatan = Kegiatan::count();
        $totalPromosi = Kegiatan::where('status', 1)->count();
        $totalPesanan = Pemesanan::count();
        $totalPembayaranBelumVerifikasi = Pemesanan::where('status', 0)->count();
        $totalPembayaranSudahVerifikasi = Pemesanan::where('status', 1)->count();
        $totalPembayaranDitolak = Pemesanan::where('status', 2)->count();

        return view('admin.dashboard')
        ->with('judul', $judul)
		->with('menu', $menu)
		->with('menuAktif', 0) // menu utama tidak aktif
		->with('page', $page)
        ->with('badgeNotif', $badgeNotif)
        ->with('totalKegiatan', $totalKegiatan)
        ->with('totalPromosi', $totalPromosi)
        ->with('totalPesanan', $totalPesanan)
        ->with('totalPembayaranBelumVerifikasi', $totalPembayaranBelumVerifikasi)
        ->with('totalPembayaranSudahVerifikasi', $totalPembayaranSudahVerifikasi)
        ->with('totalPembayaranDitolak', $totalPembayaranDitolak);
    }
}
