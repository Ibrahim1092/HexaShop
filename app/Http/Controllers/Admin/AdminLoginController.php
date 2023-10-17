<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminLoginController extends Controller
{
    public function index() {
        return view('Dashboard.auth.login');
    }


    public function approval(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return redirect()->route('admin/show');
        }
        else
        {
            return redirect()->back()->withInput(['email' => $request->email , 'password' => $request->password])
            ->with('message' , 'the credentials do not match  our records');
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return view('Dashboard.auth.login');
    }
}
