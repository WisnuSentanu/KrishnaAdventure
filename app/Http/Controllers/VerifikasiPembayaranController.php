<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use App\Mail\PembayaranDitolak;
use App\Mail\KonfirmasiPembayaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\NotifikasiBadgeController;

class VerifikasiPembayaranController extends Controller
{
    /**
     * Function untuk menampilkan halaman verifikasi pembayaran.
	 * 
     * Akses:
     * - Admin
	 * 
	 * 
     * 
	 * Method: GET
     * URL: /pembayaran/verifikasiPembayaran
     * 
     * @param  Request  $request
     * @return void
     */
    public function indexPembayaran()
    {
        // ========================= PROSES VERIFIKASI ========================
            // cek session user
            if (!Auth::check()) {
                // jika tidak ada session user
                return redirect('/login');
            }
    
            // cek role user, hanya bisa diakses oleh TIM SELEKSI dengan role_id 2
            if (session()->get('role_id') != 1) {
                // jika bukan TIM SELEKSI, maka redirect ke halaman lain atau tampilkan pesan error
                return redirect('/');
            }

            $pemesanan = Pemesanan::all();

        // Ambil badge notifikasi dari controller NotifikasiController
        $badgeNotif = (new NotifikasiBadgeController)->badgeNotifAdmin();
        session()->put('badgeNotif', $badgeNotif); // Simpan ke session untuk digunakan di view

        // buat variabel untuk dikirim ke halaman view
        $judul = "Daftar Pembayaran";
        $menu = "Verifikasi Pembayaran";
        $page = "Daftar Pembayaran";

        return view('pembayaran.verifikasiPembayaran')
        ->with('judul', $judul)
		->with('menu', $menu)
		->with('menuAktif', 0) // menu utama tidak aktif
		->with('page', $page)
        ->with('badgeNotif', $badgeNotif)
        ->with('pemesanan', $pemesanan)
        ->with('badgeNotif', $badgeNotif);
    }

    /**
     * Function untuk menampilkan halaman detail pembayaran.
	 * 
     * Akses:
     * - Admin
	 * 
	 * 
     * 
	 * Method: GET
     * URL: /pembayaran/detail
     * 
     * @param  Request  $request
     * @return void
     */
    public function detailPembayaran(Request $request, $id)
    {
        // ========================= PROSES VERIFIKASI ========================
        // cek session user
        if (!Auth::check()) {
            // jika tidak ada session user
            return redirect('/login');
        }

        if(session()->get('role_id') != 1){
            // jika bukan SUPER ADMIN, maka redirect ke halaman lain atau tampilkan pesan error
            return redirect('/');
        }

        $pemesanan = Pemesanan::where('id', $id)->get();
        
        
        if (!$pemesanan) {
            return redirect()->back()->withErrors('Data pembayaran tidak ditemukan.');
        }

        // Ambil badge notifikasi dari controller NotifikasiController
        $badgeNotif = (new NotifikasiBadgeController)->badgeNotifAdmin();
        session()->put('badgeNotif', $badgeNotif); // Simpan ke session untuk digunakan di view

         // variabel untuk dikirim ke halaman view
         $judul = "Daftar Pembayaran";
         $menu = "Verifikasi Pembayaran";
         $page = "Daftar Pembayaran";
         $page_url = "/pembayaran/verifikasiPembayaran";
         $subpage = "Detail Pembayaran";
         
         // menampilkan halaman view
         return view('pembayaran.detail')
         ->with('judul', $judul)
         ->with('menu', $menu)
         ->with('menuAktif', 0) // menu utama tidak aktif
         ->with('page', $page)
         ->with('subpage', $subpage)
         ->with('pemesanan', $pemesanan)
         ->with('badgeNotif', $badgeNotif)
         ->with('page_url', $page_url);
     }

     /**
     * Function untuk memproses konfirmasi pembayaran.
	 * 
     * Akses:
     * - Admin
	 * 
	 * 
     * 
	 * Method: POST
     * URL: /pembayaran/konfirmasiPembayaran
     * 
     * @param  Request  $request
     * @return void
     */
     public function konfirmasiPembayaran(Request $request)
{
    // cek session user
    if (!Auth::check()) {
        return redirect('/login');
    }

    if(session()->get('role_id') != 1){
        return redirect('/');
    }
    try {
        // Cari pemesanan berdasarkan ID yang diterima dari request
        $pemesanan = Pemesanan::findOrFail($request->id);

        // Hanya update jika status saat ini adalah 0 (menunggu konfirmasi)
        if ($pemesanan->status == 0) {
            $pemesanan->update(['status' => 1]);
        }

            // Kirim email notifikasi ke pengguna yang bersangkutan
            Mail::to($pemesanan->email)->send(new KonfirmasiPembayaran());


        return redirect('/pembayaran/verifikasiPembayaran')->with('notif', 'konfirmasi_sukses');
    } catch (\Exception $ex) {
        return redirect('/pembayaran/verifikasiPembayaran')->with('notif', 'konfirmasi_gagal');
    }
}

    /**
     * Function untuk memproses tolak pembayaran.
	 * 
     * Akses:
     * - Admin
	 * 
	 * 
     * 
	 * Method: POST
     * URL: /pembayaran/tolakPembayaran
     * 
     * @param  Request  $request
     * @return void
     */
    public function tolakPembayaran(Request $request)
    {
        // cek session user
        if (!Auth::check()) {
            return redirect('/login');
        }

        if(session()->get('role_id') != 1){
            return redirect('/');
        }
        
        try {
        // Cari pemesanan berdasarkan ID yang diterima dari request
        $pemesanan = Pemesanan::findOrFail($request->id);

        // Hanya update jika status saat ini adalah 0 (menunggu konfirmasi)
        if ($pemesanan->status == 0) {
            $pemesanan->update(['status' => 2]);
        }
            // Kirim email notifikasi ke pengguna yang bersangkutan
            Mail::to($pemesanan->email)->send(new PembayaranDitolak());

            return redirect('/pembayaran/verifikasiPembayaran')->with('notif', 'tolak_sukses');
        } catch (\Exception $ex) {
            return redirect('/pembayaran/verifikasiPembayaran')->with('notif', 'tolak_gagal');
        }
    }
}