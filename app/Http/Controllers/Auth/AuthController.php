<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\AutoNumber;
use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\FormulirPendaftaran\FormulirPendaftaran;
use App\Models\Pengguna\Pengguna;
use Auth;
use Illuminate\Http\Request;
use Session;

class AuthController extends Controller
{
    public function loginView() {
    	return view('admin.auth.login');
    }

    public function loginPost(Request $request) {
    	$this->validate($request, [
    		'username' => 'required|max:25',
    		'password' => 'required'
    	]);

    	$data = [
    				'username' => $request['username'],
    				'password' => $request['password']
    			];

    	if ($request['level'] == 'admin') {
            if (auth()->guard('admin')->attempt($data)) {
                return redirect()->route('admin.landingPageView');
            }
            return redirect()->back()->with('danger', 'Maaf Username/Password Salah !');

        }elseif($request['level'] == 'pengguna') {
            if (Auth::guard('pengguna')->attempt($data)) {
                $pengguna = Pengguna::where('username', $data['username'])->first();
                $username = $pengguna['username'];
                $id = $pengguna['id_user'];
                return redirect()->route('akun.penggunaView');
            }
            return redirect('/');
        }else {
    	   return redirect()->back()->with('danger', 'Maaf Username/Password Salah !');
        }
    }

    public function loginAkun(Request $request) {
        $this->validate($request, [
            'username' => 'required|max:25',
            'password' => 'required'
        ]);

        $data = [
                    'username' => $request['username'],
                    'password' => $request['password']
                ];

            if (Auth::guard('pengguna')->attempt($data)) {
                $pengguna = Pengguna::where('username', $data['username'])->first();
                $username = $pengguna['username'];
                $id = $pengguna['id_user'];
                $formulir = FormulirPendaftaran::where('id_user', $id)->get()->first();
                return response()->json([$pengguna, $formulir]);
            }
            return response()->json(false);
    }

    public function registerPost(Request $request) {
        $this->validate($request, [
            'nama' => 'required',
            'username' => 'required|max:25|unique:pengguna,username',
            'password' => 'required',
            'email' => 'required|unique:pengguna,email',
            'whatsapp' => 'required|max:13',
        ]);

        $pengguna = Pengguna::create([
            'id_user' => AutoNumber::autoNumberPengguna('pengguna', 'id_user', 'P'),
            'nama' => $request['nama'],
            'username' => $request['username'],
            'password' => bcrypt($request['password']),
            'email' => $request['email'],
            'whatsapp' => $request['whatsapp'],
        ]);

        if ($request->ajax()) {
            $data = [
                    'username' => $pengguna['username'],
                    'password' => $pengguna['password']
                ];

            if (Auth::guard('pengguna')->attempt($data)) {
                $pengguna = Pengguna::where('username', $data['username'])->first();
                $username = $pengguna['username'];
                $id = $pengguna['id_user'];
                return response()->json($pengguna);
            }
        }
        return redirect()->back()->with('login', 'Selamat Akun Anda Sudah jadi');
    }

    public function logout() {
    	if (auth()->guard('admin')->check()) {
            Session::flush();
            return redirect()->route('admin.loginView');
        }else {
            Session::flush();
            auth()->guard('pengguna')->logout();
            return redirect('/');
        }
    }


}
