<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Models\VendorProducts;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VendorHomeController extends Controller
{
    public function vendordashboard()
    {
         $vendors = Auth::user()->id;
         $vendorproducts = VendorProducts::where('vendor_id', $vendors)->count();
        return view('vendorpro.dashboard', compact('vendorproducts'));
    }

    public function vendorsignin()
    {
        return view('vendorpro.login');
    }
    public function vendorlogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('vendor')->attempt($credentials)) {

            $proffessional = Auth::guard('vendor')->user();
            $request->session()->regenerate();

            return redirect()->route('vendordashboard')->with('flash_succes', 'vendor Login Successful');
        }
        return back()->with([
            'flash_error' => 'The provided credentials do not match our records.',
        ]);
    }

    public function vendorlogout(Request $request)
    {
        Auth::guard('vendor')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('vendor-login')->with('flash_success', "Logout Successfully.");
    }

    public function vendorprofile()
    {
        $vendors = Auth::guard('vendor')->user();
        return view('vendorpro.vendorprofile.profile', compact('vendors'));
    }
    public function vendorprofile_post(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'

        ]);
        $vendors = Auth::guard('vendor')->user();
        $vendors->name = $request->name;
        $vendors->email = $request->email;
        $vendors->phone = $request->phone;


        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $filePath = 'storage/vendor/' . $filename;
            $file->move(public_path('storage/vendor'), $filePath);
            $vendors->image = $filename;
        }


        $vendors->save();
        return back();
    }
 
}
