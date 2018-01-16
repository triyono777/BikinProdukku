<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\AutoNumber;
use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Pengguna\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
                return redirect()->route('admin.landingPage');
            }
            return redirect()->back()->with('danger', 'Maaf Username/Password Salah !');

        }elseif($request['level'] == 'pengguna') {
            if (auth()->guard('pengguna')->attempt($data)) {
                return redirect()->route('admin.landingPengguna');
            }
        }else {
    	   return redirect()->back()->with('danger', 'Maaf Username/Password Salah !');
        }
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
            'password' => $request['password'],
            'email' => $request['email'],
            'whatsapp' => $request['whatsapp'],
        ]);

        if ($pengguna) {
            auth()->guard('pengguna')->attempt(['username' => $pengguna['username'], 'password' => $pengguna['password']]);
            return redirect()->route('admin.penggunaView', [$pengguna['username'], $pengguna['id_user']]);
        }
    }

    public function logout() {
    	Session::flush();
    	return redirect()->route('admin.loginView');
    }
}
