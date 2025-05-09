<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function showVendors()
    {
        $vendors = Vendor::all();
        return view('admin.vendor.index', compact('vendors'));
    }

    public function approve($id)
    {
        $vendors = Vendor::findOrFail($id);
        $vendors->approval_status = 'approved';
        $vendors->save();
    
        return back()->with('success', 'vendors section approved!');
    }
    
    public function reject($id)
    {
        $vendors = Vendor::findOrFail($id);
        $vendors->approval_status = 'rejected';
        $vendors->save();
    
        return back()->with('success', 'vendors section rejected!');
    }
    
    
}
