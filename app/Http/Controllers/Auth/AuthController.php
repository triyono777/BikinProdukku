<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
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

    	if (auth()->guard('admin')->attempt($data)) {
    		return redirect()->route('admin.landingPageView');
    	}

    	return redirect()->back()->with('danger', 'Maaf Username/Password Salah !');
    }

    public function logout() {
    	Session::flush();
        Auth::guard('admin')->logout();
    	return redirect()->route('admin.loginView');
    }
}
