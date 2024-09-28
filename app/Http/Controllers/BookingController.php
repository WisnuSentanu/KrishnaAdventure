<?php

namespace App\Http\Controllers;

use Log;
use App\Mail\Booking;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function submitBooking(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_telepon' => 'required|string|max:20',
            'tanggal' => 'required|date',
            'payment_proof' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048', // Validasi untuk bukti pembayaran
            'kegiatan_id' => 'required|integer|exists:kegiatan,id',
        ]);

        // Menyimpan file bukti pembayaran
    if ($request->hasFile('payment_proof')) {
        $file = $request->file('payment_proof');
        $filename = time() . '_' . $file->getClientOriginalName();
        // Simpan ke folder 'public/payment_receipts' agar bisa diakses dari public
        $path = $file->storeAs('public/payment_receipts', $filename); 
        // Menghapus 'public/' agar path relatif sesuai dengan URL storage
        $path = str_replace('public/', '', $path); 
    }

        // Buat pemesanan baru
        $pemesanan = Pemesanan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
            'tanggal' => $request->tanggal,
            'receipt_nama' => $filename,
            'receipt_path' => $path,
            'status' => '0', // Status default untuk pemesanan baru
            'kegiatan_id' => $request->kegiatan_id,
            'created_by' => null, // Atau hapus baris ini jika tidak diperlukan
            'updated_by' => null, // Atau hapus baris ini jika tidak diperlukan
        ]);

        $adminEmail = 'wisnuwira628@gmail.com';

    $bookingDetails = [
        'nama' => $pemesanan->nama,
        'email' => $pemesanan->email,
        'no_telepon' => $pemesanan->no_telepon,
        'tanggal' => $pemesanan->tanggal,
        'kegiatan_id' => $pemesanan->kegiatan_id,
    ];

    Mail::to($adminEmail)->send(new Booking($bookingDetails));


        return redirect()->back()->with('success', 'Booking berhasil disimpan!');
    }
}
