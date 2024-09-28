<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Function untuk menampilkan halaman login.
	 * 
     * Akses:
     * - Admin
	 * 
	 * 
     * 
	 * Method: GET
     * URL: /login
     * 
     * @param  Request  $request
     * @return void
     */
    public function index()
    {
        $page = "Login";
        
        return view('login')
        ->with('page',$page);
    }


    /**
     * Function untuk menangani proses login.
     * URL: /login/proses
     * 
     * @param  Request  $request
     * @return void
     */
    public function process(Request $request)
{
    // melakukan validasi input dari form login
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    // melakukan verifikasi akun ke database (tabel "User")
    if (Auth::attempt($credentials)) {
        // Regenerate session to prevent fixation attacks
        $request->session()->regenerate();

        // simpan data user ke dalam session
        $role = Auth::user()->role;
        session([
            'id' => Auth::user()->id,
            'nama' => Auth::user()->nama,
            'role_id' => $role->id,
            'role_nama' => $role->nama
        ]);

        // alihkan ke halaman index dengan feedback
        return redirect('/admin/dashboard')->with('loginSuccess', Auth::user()->nama);
    }
}

	/**
	 * Function untuk menangani proses logout.
     * URL: /logout
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function logout(Request $request)
	{
		// melakukan proses logout
	    Auth::logout();
	 
	    $request->session()->invalidate();
	 
	    $request->session()->regenerateToken();
	 
	 	// mengalihkan ke url "/"
	    return redirect('/');
	}
}
