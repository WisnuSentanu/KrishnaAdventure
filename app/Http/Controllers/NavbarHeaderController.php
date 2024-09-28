<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class NavbarHeaderController extends Controller
{
    /**
     * Function untuk menampilkan halaman marine adventure.
	 * 
     * Akses:
     * - User
	 * 
	 * 
     * 
	 * Method: GET
     * URL: /Marine-Adventure
     * 
     * @param  Request  $request
     * @return void
     */
    public function indexMarine()
    {
         // Mengambil data kegiatan berdasarkan paket kegiatan id
        $marineAdventure = Kegiatan::where('paket_kegiatan_id', 1)->get();   

        // Mengambil tanggal saat ini
        $currentDate = Carbon::now();

        // Ambil kegiatan Marine Adventure yang sedang promo atau tidak ada promo
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

        $page = "marine";

        return view('Marine-Adventure')
        ->with('page', $page)
        ->with('marineAdventure', $marineAdventure);
    }

    /**
     * Function untuk menampilkan halaman land adventure.
	 * 
     * Akses:
     * - User
	 * 
	 * 
     * 
	 * Method: GET
     * URL: /Land-Adventure
     * 
     * @param  Request  $request
     * @return void
     */
    public function indexLand()
    {
         // Mengambil data kegiatan berdasarkan paket kegiatan id
         $landAdventure = Kegiatan::where('paket_kegiatan_id', 2)->get();     


         // Mengambil tanggal saat ini
        $currentDate = Carbon::now();

        // Ambil kegiatan Land Adventure yang sedang promo atau tidak ada promo
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

        $page = "land";

        return view('Land-Adventure')
        ->with('page', $page)
        ->with('landAdventure', $landAdventure);
    }

    /**
     * Function untuk menampilkan halaman transport & tour.
	 * 
     * Akses:
     * - User
	 * 
	 * 
     * 
	 * Method: GET
     * URL: /Transport-Tour
     * 
     * @param  Request  $request
     * @return void
     */
    public function indexTransTour()
    {
         // Mengambil data kegiatan berdasarkan paket kegiatan id
        $transportTour = Kegiatan::where('paket_kegiatan_id', 3)->get();   

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
            
        $page = "transport";

        return view('Transport-Tour')
        ->with('page', $page)
        ->with('transportTour', $transportTour);
    }

    /**
     * Function untuk menampilkan halaman place to stay.
	 * 
     * Akses:
     * - User
	 * 
	 * 
     * 
	 * Method: GET
     * URL: /Place-To-Stay
     * 
     * @param  Request  $request
     * @return void
     */
    public function indexPlaceStay()
    {
         // Mengambil data kegiatan berdasarkan paket kegiatan id
        $placeStay = Kegiatan::where('paket_kegiatan_id', 4)->get();   

        // Mengambil tanggal saat ini
        $currentDate = Carbon::now();

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
            
        $page = "place";

        return view('Place-To-Stay')
        ->with('page', $page)
        ->with('placeStay', $placeStay);
    }

    /**
     * Function untuk mengarahkan user ke halaman contact us.
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
    public function contactUs(Request $request)
    {
        $page = "contact";

        return view('Contact-Us', [
            'page' => $page,
        ]);
    }
}
