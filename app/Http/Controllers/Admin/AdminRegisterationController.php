<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminRegisterationController extends Controller
{
    public function index()
    {
        return view('Dashboard.auth.register');
    }
    public function check(Request $request)
    {
        $admin_key = 'i am admin look at me';
        if($request->admin_key == $admin_key)
        {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'admin_key' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'password_confirmation' => ['required', 'string', 'min:8']
            ]);
            $password = $request->password;
            $password = Hash::make($password);
            Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $password
            ]);
            return redirect()->route('admin/login');
        }
        else
        return redirect()->back()->with('message','Access Denaied');
    }
}
