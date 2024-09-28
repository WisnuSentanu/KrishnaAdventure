<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HomeController extends Controller
{
    /**
     * Function untuk menampilkan halaman utama website.
	 * 
     * Akses:
     * - User
	 * 
	 * 
     * 
	 * Method: GET
     * URL: /index
     * 
     * @param  Request  $request
     * @return void
     */
    public function LandingPage()
    {

        // Mengambil tanggal saat ini
        $currentDate = Carbon::now();

        // Ambil semua kegiatan Transport & Tour, baik yang sedang promo maupun yang tidak
        $marineAdventure = Kegiatan::where('paket_kegiatan_id', 1)
        ->get()
        ->map(function ($kegiatan) use ($currentDate) {
            // Cek apakah promo aktif
            if ($kegiatan->tanggal_mulai_promo && $kegiatan->tanggal_selesai_promo) {
                if ($kegiatan->tanggal_mulai_promo <= $currentDate && $kegiatan->tanggal_selesai_promo >= $currentDate) {
                    // Promo masih aktif
                    $kegiatan->isPromoAktif = true;
                } else {
                    // Promo sudah berakhir
                    $kegiatan->isPromoAktif = false;
                }
            } else {
                // Tidak ada promo
                $kegiatan->isPromoAktif = false;
            }
            return $kegiatan;
        });

        // Ambil semua kegiatan Transport & Tour, baik yang sedang promo maupun yang tidak
        $landAdventure = Kegiatan::where('paket_kegiatan_id', 2)
        ->get()
        ->map(function ($kegiatan) use ($currentDate) {
            // Cek apakah promo aktif
            if ($kegiatan->tanggal_mulai_promo && $kegiatan->tanggal_selesai_promo) {
                if ($kegiatan->tanggal_mulai_promo <= $currentDate && $kegiatan->tanggal_selesai_promo >= $currentDate) {
                    // Promo masih aktif
                    $kegiatan->isPromoAktif = true;
                } else {
                    // Promo sudah berakhir
                    $kegiatan->isPromoAktif = false;
                }
            } else {
                // Tidak ada promo
                $kegiatan->isPromoAktif = false;
            }
            return $kegiatan;
        });

       // Ambil semua kegiatan Transport & Tour, baik yang sedang promo maupun yang tidak
       $transportTour = Kegiatan::where('paket_kegiatan_id', 3)
       ->get()
       ->map(function ($kegiatan) use ($currentDate) {
           // Cek apakah promo aktif
           if ($kegiatan->tanggal_mulai_promo && $kegiatan->tanggal_selesai_promo) {
               if ($kegiatan->tanggal_mulai_promo <= $currentDate && $kegiatan->tanggal_selesai_promo >= $currentDate) {
                   // Promo masih aktif
                   $kegiatan->isPromoAktif = true;
               } else {
                   // Promo sudah berakhir
                   $kegiatan->isPromoAktif = false;
               }
           } else {
               // Tidak ada promo
               $kegiatan->isPromoAktif = false;
           }
           return $kegiatan;
       });

        $page = "home";

        return view('index')
        ->with('page', $page)
        ->with('marineAdventure', $marineAdventure)
        ->with('landAdventure', $landAdventure)
        ->with('transportTour', $transportTour);
    }

    /**
     * Function untuk mengarahkan user ke halaman pembelian kegiatan.
	 * 
     * Akses:
     * - User
	 * 
	 * 
     * 
	 * Method: GET
     * URL: /buy-tour-marine
     * 
     * @param  Request  $request
     * @return void
     */
    public function tourMarine(Request $request, $id)
    {
    
        try {
            // Ambil kegiatan berdasarkan ID
            $kegiatan = Kegiatan::find($id);
            
            // Mengambil tanggal saat ini
            $currentDate = Carbon::now();

            // Ambil semua kegiatan Transport & Tour, baik yang sedang promo maupun yang tidak
            $marineAdventure = Kegiatan::where('paket_kegiatan_id', 1)
            ->get()
            ->map(function ($kegiatan) use ($currentDate) {
                // Cek apakah promo aktif
                if ($kegiatan->tanggal_mulai_promo && $kegiatan->tanggal_selesai_promo) {
                    if ($kegiatan->tanggal_mulai_promo <= $currentDate && $kegiatan->tanggal_selesai_promo >= $currentDate) {
                        // Promo masih aktif
                        $kegiatan->isPromoAktif = true;
                    } else {
                        // Promo sudah berakhir
                        $kegiatan->isPromoAktif = false;
                    }
                } else {
                    // Tidak ada promo
                    $kegiatan->isPromoAktif = false;
                }
                return $kegiatan;
            });

            // Ambil kegiatan lain yang memiliki kategori sama, kecuali kegiatan yang sedang ditampilkan
            $relatedKegiatan = Kegiatan::where('paket_kegiatan_id', '1')
            ->where('id', '!=', $kegiatan->id)
            ->take(3)
            ->get();

            $page = "marine";
            
            return view('buy-marine-adventure', [
                'kegiatan' => $kegiatan,
                'page' => $page,
                'marineAdventure' => $marineAdventure,
                'relatedKegiatan' => $relatedKegiatan,
            ]);
            
        } catch (ModelNotFoundException $e) {
            // Tangani exception jika tidak ditemukan
            return redirect()->back()->with('error', 'Kegiatan tidak ditemukan atau tidak aktif.');
        }
    }


    /**
     * Function untuk mengarahkan user ke halaman pembelian kegiatan.
	 * 
     * Akses:
     * - User
	 * 
	 * 
     * 
	 * Method: GET
     * URL: /buy-tour-land
     * 
     * @param  Request  $request
     * @return void
     */
    public function tourLand(Request $request, $id)
    {
        try {
            // Ambil kegiatan berdasarkan ID
            $kegiatan = Kegiatan::find($id);

            // Mengambil tanggal saat ini
            $currentDate = Carbon::now();

            // Ambil semua kegiatan Transport & Tour, baik yang sedang promo maupun yang tidak
            $landAdventure = Kegiatan::where('paket_kegiatan_id', 2)
            ->get()
            ->map(function ($kegiatan) use ($currentDate) {
                // Cek apakah promo aktif
                if ($kegiatan->tanggal_mulai_promo && $kegiatan->tanggal_selesai_promo) {
                    if ($kegiatan->tanggal_mulai_promo <= $currentDate && $kegiatan->tanggal_selesai_promo >= $currentDate) {
                        // Promo masih aktif
                        $kegiatan->isPromoAktif = true;
                    } else {
                        // Promo sudah berakhir
                        $kegiatan->isPromoAktif = false;
                    }
                } else {
                    // Tidak ada promo
                    $kegiatan->isPromoAktif = false;
                }
                return $kegiatan;
            });
            
            // Ambil kegiatan lain yang memiliki kategori sama, kecuali kegiatan yang sedang ditampilkan
            $relatedKegiatan = Kegiatan::where('paket_kegiatan_id', '2')
            ->where('id', '!=', $kegiatan->id)
            ->take(3)
            ->get();

            $page = "land";
            
            return view('buy-land-adventure', [
                'kegiatan' => $kegiatan,
                'page' => $page,
                'landAdventure' => $landAdventure,
                'relatedKegiatan' => $relatedKegiatan,
            ]);
            
        } catch (ModelNotFoundException $e) {
            // Tangani exception jika tidak ditemukan
            return redirect()->back()->with('error', 'Kegiatan tidak ditemukan atau tidak aktif.');
        }
    }

    /**
     * Function untuk mengarahkan user ke halaman pembelian kegiatan.
	 * 
     * Akses:
     * - User
	 * 
	 * 
     * 
	 * Method: GET
     * URL: /buy-transport-tour
     * 
     * @param  Request  $request
     * @return void
     */
    public function transportTour(Request $request, $id)
    {
        try {
            // Ambil kegiatan berdasarkan ID
            $kegiatan = Kegiatan::find($id);

            // Mengambil tanggal saat ini
            $currentDate = Carbon::now();

            // Ambil semua kegiatan Transport & Tour, baik yang sedang promo maupun yang tidak
            $transportTour = Kegiatan::where('paket_kegiatan_id', 3)
            ->get()
            ->map(function ($kegiatan) use ($currentDate) {
                // Cek apakah promo aktif
                if ($kegiatan->tanggal_mulai_promo && $kegiatan->tanggal_selesai_promo) {
                    if ($kegiatan->tanggal_mulai_promo <= $currentDate && $kegiatan->tanggal_selesai_promo >= $currentDate) {
                        // Promo masih aktif
                        $kegiatan->isPromoAktif = true;
                    } else {
                        // Promo sudah berakhir
                        $kegiatan->isPromoAktif = false;
                    }
                } else {
                    // Tidak ada promo
                    $kegiatan->isPromoAktif = false;
                }
                return $kegiatan;
            });
            
            // Ambil kegiatan lain yang memiliki kategori sama, kecuali kegiatan yang sedang ditampilkan
            $relatedKegiatan = Kegiatan::where('paket_kegiatan_id', '3')
            ->where('id', '!=', $kegiatan->id)
            ->take(3)
            ->get();
            
            $page = "transport";

            return view('buy-transport-tour', [
                'kegiatan' => $kegiatan,
                'page' => $page,
                'transportTour' => $transportTour,
                'relatedKegiatan' => $relatedKegiatan,
            ]);
            
        } catch (ModelNotFoundException $e) {
            // Tangani exception jika tidak ditemukan
            return redirect()->back()->with('error', 'Kegiatan tidak ditemukan atau tidak aktif.');
        }
    }

    /**
     * Function untuk mengarahkan user ke halaman pembelian kegiatan.
	 * 
     * Akses:
     * - User
	 * 
	 * 
     * 
	 * Method: GET
     * URL: /buy-place-stay
     * 
     * @param  Request  $request
     * @return void
     */
    public function placeStay(Request $request, $id)
    {
        try {
            // Ambil kegiatan berdasarkan ID
            $kegiatan = Kegiatan::find($id);

            // Mengambil tanggal saat ini
            $currentDate = Carbon::now();

            // Ambil semua kegiatan Transport & Tour, baik yang sedang promo maupun yang tidak
            $placeStay = Kegiatan::where('paket_kegiatan_id', 4)
            ->get()
            ->map(function ($kegiatan) use ($currentDate) {
                // Cek apakah promo aktif
                if ($kegiatan->tanggal_mulai_promo && $kegiatan->tanggal_selesai_promo) {
                    if ($kegiatan->tanggal_mulai_promo <= $currentDate && $kegiatan->tanggal_selesai_promo >= $currentDate) {
                        // Promo masih aktif
                        $kegiatan->isPromoAktif = true;
                    } else {
                        // Promo sudah berakhir
                        $kegiatan->isPromoAktif = false;
                    }
                } else {
                    // Tidak ada promo
                    $kegiatan->isPromoAktif = false;
                }
                return $kegiatan;
            });
            
            // Ambil kegiatan lain yang memiliki kategori sama, kecuali kegiatan yang sedang ditampilkan
            $relatedKegiatan = Kegiatan::where('paket_kegiatan_id', '4')
            ->where('id', '!=', $kegiatan->id)
            ->take(3)
            ->get();
            
            $page = "place";

            return view('buy-place-stay', [
                'kegiatan' => $kegiatan,
                'page' => $page,
                'placeStay' => $placeStay,
                'relatedKegiatan' => $relatedKegiatan,
            ]);
            
        } catch (ModelNotFoundException $e) {
            // Tangani exception jika tidak ditemukan
            return redirect()->back()->with('error', 'Kegiatan tidak ditemukan atau tidak aktif.');
        }
    }

}
