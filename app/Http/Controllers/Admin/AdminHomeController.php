<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminHomeController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function signin()
    {
        return view('admin.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {

            $proffessional = Auth::guard('admin')->user();
            $request->session()->regenerate();

            return redirect()->route('dashboard')->with('flash_succes', 'Admin Login Successful');
        }
        return back()->with([
            'flash_error' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin-login')->with('flash_success', "Logout Successfully.");
    }

    public function adminprofile()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.adminprofile.profile', compact('admin'));
    }
    public function adminprofile_post(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'

        ]);
        $admin = Auth::guard('admin')->user();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->address = $request->address;


        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $filePath = 'storage/admin/' . $filename;
            $file->move(public_path('storage/admin'), $filePath);
            $admin->image = $filename;
        }


        $admin->save();
        return back();
    }
    public function adminchangepassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'password_confirmation' => 'required|same:new_password',
        ]);
        $user = Auth::user();
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect']);
        }
        $user->password = Hash::make($request->new_password);
        $user->passwordhint = $request->new_password;
        $user->save();
        session()->flash('message', 'password is changed!');
        return back()->with('flash_success', 'Your password has been changed.');
    }
}
