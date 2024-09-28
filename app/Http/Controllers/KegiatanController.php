<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use App\Models\PaketKegiatan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class KegiatanController extends Controller
{
    /**
     * Function untuk mengarahkan admin ke halaman daftar kegiatan.
	 * 
     * Akses:
     * - Admin
	 * 
	 * 
     * 
	 * Method: GET
     * URL: /kegiatan/daftarKegiatan
     * 
     * @param  Request  $request
     * @return void
     */
    public function indexKegiatan()
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

        $kegiatan = Kegiatan::orderBy('created_at', 'asc')->get();
        $paketKegiatan = PaketKegiatan::all();

        // Ambil badge notifikasi dari controller NotifikasiController
        $badgeNotif = (new NotifikasiBadgeController)->badgeNotifAdmin();
        session()->put('badgeNotif', $badgeNotif); // Simpan ke session untuk digunakan di view

        // buat variabel untuk dikirim ke halaman view
        $judul = "Daftar Kegiatan";
        $menu = "Kelola Kegiatan";
        $page = "Daftar Kegiatan";

        return view('kegiatan.daftarKegiatan')
        ->with('judul', $judul)
		->with('menu', $menu)
		->with('menuAktif', 0) // menu utama tidak aktif
		->with('page', $page)
        ->with('kegiatan', $kegiatan)
        ->with('badgeNotif', $badgeNotif)
        ->with('paketKegiatan', $paketKegiatan);
    }

    /**
     * Function untuk mengarahkan admin ke halaman tambah kegiatan.
	 * 
     * Akses:
     * - Admin
	 * 
	 * 
     * 
	 * Method: GET
     * URL: /kegiatan/tambahKegiatan
     * 
     * @param  Request  $request
     * @return void
     */
    public function tambahKegiatan()
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

        $kegiatan = Kegiatan::all();  
        $paketKegiatan = PaketKegiatan::all();

        // Ambil badge notifikasi dari controller NotifikasiController
        $badgeNotif = (new NotifikasiBadgeController)->badgeNotifAdmin();
        session()->put('badgeNotif', $badgeNotif); // Simpan ke session untuk digunakan di view

        // variabel untuk dikirim ke halaman view
        $judul = "Penambahan Kegiatan Baru";
        $menu = "Kelola Kegiatan";
        $page = "Daftar Kegiatan";
        $page_url = "/kegiatan/daftarKegiatan";
        $subpage = "Tambah Kegiatan";

        // menampilkan halaman view
        return view('kegiatan.tambahKegiatan')
        ->with('judul', $judul)
        ->with('menu', $menu)
        ->with('menuAktif', 0) // menu utama tidak aktif
        ->with('page', $page)
        ->with('page_url', $page_url)
        ->with('paketKegiatan', $paketKegiatan)
        ->with('badgeNotif', $badgeNotif)
        ->with('subpage', $subpage);
    }


    /**
     * Function untuk memproses tambah kegiatan pada admin.
     * 
     * Akses:
     * - Admin
     * 
     * Method: POST
     * URL: /kegiatan/tambahKegiatan
     *
     * @return \Illuminate\Http\Response
     */
    public function prosesTambahKegiatan(Request $request)
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
        
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'harga' => 'required|string|max:255',
                'konten' => 'required|string',
                'paket_kegiatan_id' => 'required|exists:paket_kegiatan,id',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            ]);

           
            // Simpan file gambar
            $gambarNama = null;
            $gambarPath = null;

            if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarNama = $gambar->getClientOriginalName();
            $gambarPath = $gambar->storeAs('gambar', $gambarNama, 'public');
            }

            $storage="storage/content";
            $dom=new \DOMDocument();
            libxml_use_internal_errors(true);
            $dom->loadHTML($request->konten,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
            libxml_clear_errors();
            $images=$dom->getElementsByTagName('img');
            foreach($images as $img){
                $src=$img->getAttribute('src');
                if(preg_match('/data:image/',$src)){
                    preg_match('/data:image\/(?<mime>.*?)\;/',$src,$groups);
                    $mimetype=$groups['mime'];
                    $fileNameContent = $img->getAttribute('data-filename');
                    if (!$fileNameContent) {
                        $fileNameContent = uniqid();
                    }
                    $fileNameContentRand = $fileNameContent . '_' . time();
                    $filePath=("$storage/$fileNameContentRand.$mimetype");
                    $image=Image::make($src)
                        ->resize(1200,1200)
                        ->encode($mimetype,100)
                        ->save(public_path());
                    $new_src=asset($filePath);
                    $img->removeAttribute('src');
                    $img->setAttribute('src',$new_src);
                    $img->setAttribute('class','img-responsive');
                }
            }
            $kontenHtml = $dom->saveHTML();

         // Simpan data konten ke dalam database
         $kegiatan = new Kegiatan();
         $kegiatan->nama = $request->input('nama');
         $kegiatan->harga = $request->input('harga');
         $kegiatan->konten = $kontenHtml;
         $kegiatan->paket_kegiatan_id = $request->input('paket_kegiatan_id');
         $kegiatan->gambar_nama = $gambarNama; 
         $kegiatan->gambar_path = $gambarPath; 
         $kegiatan->created_by = (string) Auth::user()->id; 
         $kegiatan->updated_by = (string) Auth::user()->id;  
         $kegiatan->save();

        }
        catch(QueryException $ex){
        return redirect('/kegiatan/daftarKegiatan/')->with('notif', 'simpan_gagal');
        }
        return redirect('/kegiatan/daftarKegiatan/')->with('notif', 'simpan_sukses');
    }


    /**
     * Function untuk mengupload gambar pada konten kegiatan.
     * 
     * Akses:
     * - Admin
     * 
     * Method: GET
     * URL: /upload-image
     *
     * @return \Illuminate\Http\Response
     */

    public function uploadImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);

        $imageUrl = asset('images/'.$imageName);
        return response()->json(['url' => $imageUrl], 200);
    }

    /**
     * Function untuk menampilkan form edit kegiatan pada admin.
     * 
     * Akses:
     * - Admin
     * 
     * Method: GET
     * URL: /kegiatan/editKegiatan
     *
     * @return \Illuminate\Http\Response
     */
    public function editKegiatan($id)
{

    // ========================= PROSES VERIFIKASI ========================
        // cek session user
        if (!Auth::check()) {
            // jika tidak ada session user
            return redirect('/login');
        }

        // cek role user, hanya bisa diakses oleh TIM SELEKSI dengan role_id 2
        if(session()->get('role_id') != 1){
        // jika bukan TIM SELEKSI, maka redirect ke halaman lain atau tampilkan pesan error
            return redirect('/');
        }

        // Ambil kegiatan berdasarkan ID
        $kegiatan = Kegiatan::find($id); // Mengambil data kegiatan berdasarkan ID
        if (!$kegiatan) {
        // Jika tidak ditemukan, redirect atau tampilkan pesan error
        return redirect('/kegiatan/daftarKegiatan')->withErrors('Data kegiatan tidak ditemukan.');
    }
        $paketKegiatan = PaketKegiatan::all();

        // Ambil badge notifikasi dari controller NotifikasiController
        $badgeNotif = (new NotifikasiBadgeController)->badgeNotifAdmin();
        session()->put('badgeNotif', $badgeNotif); // Simpan ke session untuk digunakan di view

        // variabel untuk dikirim ke halaman view
        $judul = "Edit Data Kegiatan";
        $menu = "Kelola Kegiatan";
        $page = "Daftar Kegiatan";
        $page_url = "/kelolaSeleksi/daftarSeleksi";
        $subpage = "Edit Kegiatan";

        return view('kegiatan.editKegiatan', compact('kegiatan'))
        ->with('judul', $judul)
        ->with('menu', $menu)
        ->with('menuAktif', 0) // menu utama tidak aktif
        ->with('page', $page)
        ->with('page_url', $page_url)
        ->with('paketKegiatan', $paketKegiatan)
        ->with('badgeNotif', $badgeNotif)
        ->with('subpage', $subpage);
    }

    /**
     * Function untuk memproses edit kegiatan pada admin.
     * 
     * Akses:
     * - Admin
     * 
     * Method: POST
     * URL: /kegiatan/editKegiatan
     *
     * @return \Illuminate\Http\Response
     */
    public function updateKegiatan(Request $request, $id)
{
    try {
        // Verifikasi apakah pengguna sudah login
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Verifikasi apakah pengguna adalah TIM SELEKSI dengan role_id 2
        if (Auth::user()->role_id != 1) {
            return redirect('/');
        }

        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|string|max:255',
            'konten' => 'required|string',
            'paket_kegiatan_id' => 'required|exists:paket_kegiatan,id',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        // Ambil data seleksi yang akan diperbarui
        $kegiatan = Kegiatan::findOrFail($id);
        
        // Simpan data yang diperbarui
        $kegiatan->nama = $request->nama;
        $kegiatan->harga = $request->harga;
        $kegiatan->paket_kegiatan_id = $request->paket_kegiatan_id;
        $kegiatan->konten = $request->konten;
       
        
        // Periksa apakah file gambar diunggah
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($kegiatan->gambar_path) {
                Storage::disk('public')->delete($kegiatan->gambar_path);
            }
            $gambar = $request->file('gambar');
            $gambarNama = $gambar->getClientOriginalName();
            $gambarPath = $gambar->storeAs('gambar', $gambarNama, 'public');

            // Perbarui properti model untuk gambar
            $kegiatan->gambar_nama = $gambarNama;
            $kegiatan->gambar_path = $gambarPath;
        }
        
        // Perbarui kolom updated_by
        $kegiatan->updated_by = Auth::id();

        // Simpan perubahan
        $kegiatan->save();

        // Redirect dengan notifikasi sukses
        return redirect('kegiatan/daftarKegiatan')->with('notif', 'update_sukses');
    } catch (\Exception $e) {
        // Redirect dengan notifikasi gagal
        return redirect('kegiatan/daftarKegiatan')->with('notif', 'update_gagal');
    }
}

    /**
     * Function untuk memproses hapus konten kegiatan pada admin.
     * 
     * Akses:
     * - Admin
     * 
     * Method: GET
     * URL: /kegiatan/hapusKegiatan
     *
     * @return \Illuminate\Http\Response
     */
    public function hapusKegiatan($id)
    {
        // ========================= PROSES VERIFIKASI ========================
            // cek session user
            if (!Auth::check()) {
                // jika tidak ada session user
                return redirect('/login');
            }

            // cek role user, hanya bisa diakses oleh TIM SELEKSI dengan role_id 2
            if(session()->get('role_id') != 1){
                // jika bukan TIM SELEKSI, maka redirect ke halaman lain atau tampilkan pesan error
                return redirect('/');
            }

            try {
            
                // Temukan seleksi berdasarkan ID
                $kegiatan = Kegiatan::findOrFail($id);

                
                // Hapus seleksi dari database
                $kegiatan->delete();

                // Jika berhasil, kirim respons dengan pesan sukses
                return redirect('/kegiatan/daftarKegiatan')->with('notif', 'hapus_sukses');
            } catch (\Exception $e) {
                // jika proses hapus gagal, kirim respons dengan pesan gagal
                return redirect('/kegiatan/daftarKegiatan')->with('notif', 'hapus_gagal');
            }
    }

    /**
     * Function untuk mengarahkan admin ke halaman tambah promosi.
	 * 
     * Akses:
     * - Admin
	 * 
	 * 
     * 
	 * Method: GET
     * URL: /kegiatan/tambahPromosi
     * 
     * @param  Request  $request
     * @return void
     */
    public function tambahPromosi($id) {

        $kegiatan = Kegiatan::findOrFail($id);


        // Ambil badge notifikasi dari controller NotifikasiController
        $badgeNotif = (new NotifikasiBadgeController)->badgeNotifAdmin();
        session()->put('badgeNotif', $badgeNotif); // Simpan ke session untuk digunakan di view

        $judul = "Tambah Data Promosi";
        $menu = "Kelola Kegiatan";
        $page = "Daftar Kegiatan";
        $page_url = "/kegiatan/daftarKegiatan";
        $subpage = "Tambah Promosi";
        $menuAktif = "Tambah Promosi";

        return view('kegiatan.tambahPromosi')
        ->with('judul', $judul)
        ->with('menu', $menu)
        ->with('page', $page)
        ->with('page_url', $page_url)
        ->with('subpage', $subpage)
        ->with('menuAktif', $menuAktif)
        ->with('kegiatan', $kegiatan)
        ->with('badgeNotif', $badgeNotif);
    }
    
    /**
     * Function untuk memproses tambah promosi pada admin.
	 * 
     * Akses:
     * - Admin
	 * 
	 * 
     * 
	 * Method: GET
     * URL: /kegiatan/tambahPromosi
     * 
     * @param  Request  $request
     * @return void
     */
    public function storePromosi(Request $request, $id) 
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

    try {
        $request->validate([
            'harga_promo' => 'required|string|max:255',
            'konten_promo' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'tanggal_mulai_promo' => 'required|date',
            'tanggal_selesai_promo' => 'required|date',
            'status' => 'required|in:1,0',
        ]);

        Log::info($request->all());

        // Ambil data kegiatan berdasarkan kegiatan_id
        $kegiatan = Kegiatan::findOrFail($request->kegiatan_id);

        // Update data promosi dalam tabel kegiatan
        $kegiatan->harga_promo = $request->harga_promo;
        $kegiatan->konten_promo = $request->konten_promo;
        $kegiatan->tanggal_mulai_promo = $request->tanggal_mulai_promo;
        $kegiatan->tanggal_selesai_promo = $request->tanggal_selesai_promo;
        $kegiatan->status = $request->status;

        // Periksa apakah file gambar diunggah
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($kegiatan->gambar_path) {
                Storage::disk('public')->delete($kegiatan->gambar_path);
            }
            $gambar = $request->file('gambar');
            $gambarNama = $gambar->getClientOriginalName();
            $gambarPath = $gambar->storeAs('gambar', $gambarNama, 'public');

            // Perbarui properti model untuk gambar
            $kegiatan->gambar_nama = $gambarNama;
            $kegiatan->gambar_path = $gambarPath;
        }

        $kegiatan->save();

        // Redirect dengan notifikasi sukses
        return redirect('kegiatan/daftarKegiatan')->with('notif', 'promo_sukses');
    } catch (\Exception $e) {
        // Redirect dengan notifikasi gagal
        Log::error($e->getMessage());
        return redirect('kegiatan/daftarKegiatan')->with('notif', 'promo_gagal');
    }
}    
    
}
