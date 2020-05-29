<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
	public function showLoginForm()
	{
		return view('auth.admin.login');
	}
	
	public function login(Request $request)
	{
		$this->validateLogin($request);
		
		$admin = Admin::where('username', $request->username);
		
		if ( empty($admin->get()) ) {
			return redirect()->back()->with('error', 'Login failed wrong admin credentials');
		}
		
		$hashedPassword = $admin->select()->value('password');
		
		if (! Hash::check($request->password, $hashedPassword) ) {
			return redirect()->back()->with('error', 'Login failed wrong admin password');
		}
		
		return redirect()->route('admin.dashboard');
	}
	
	public function validateLogin(Request $request)
	{
		$request->validate([
			'username' => 'required|string',
			'password' => 'required|string',
		]);
	}

    public function dashboard()
    {
    	return view('admin.index');
    }
}
