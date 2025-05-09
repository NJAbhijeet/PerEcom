<?php

namespace App\Http\Controllers\Vendor;

use App\Models\Vendor;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\VendorProducts;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VendorProductController extends Controller
{
    public function vendorindex(Request $request)
    {
        $vendors = Auth::user()->id;
        $vendorproducts = VendorProducts::where('vendor_id', $vendors)
            ->orderBy('id', 'asc')->get();
        return view('vendorpro.vendorproduct.index', compact('vendorproducts'));
    }


    public function vendorcreate()
    {
        $vendors = Auth::user();  // get the logged-in vendor
        $categories = Category::where('status', 'active')->get();
        $products = Product::where('status', 'active')->get();
        return view('vendorpro.vendorproduct.create', compact('vendors', 'categories', 'products'));
    }

    public function vendorstore(Request $request)
    {
        // dd($request->all());
        $vendorproducts = new VendorProducts();
        $vendorproducts->vendor_id = $request->vendor_id;
        $vendorproducts->category_id = $request->category_id;
        $vendorproducts->product_id = $request->product_id;
        $vendorproducts->vendorproduct_price = $request->vendorproduct_price;
        $vendorproducts->status = $request->status;
        $vendorproducts->save();
        return redirect()->route('vendor-product-index')->with('flash_success', 'Vendor Product Added Successfully..!!');
    }

    public function vendoredit($id)
    {
        $vendorproducts = VendorProducts::find($id);
        $vendors = Vendor::where('approval_status', 'approved')->get();
        $categories = Category::where('status', 'active')->get();
        $products = Product::where('status', 'active')->get();
        return view('vendorpro.vendorproduct.edit', compact('vendors', 'categories', 'products', 'vendorproducts'));
    }

    public function vendorupdate(Request $request, $id)
    {
        // dd($request->all());
        $vendorproducts = VendorProducts::find($id);
        $vendorproducts->vendor_id = $request->vendor_id;
        $vendorproducts->category_id = $request->category_id;
        $vendorproducts->product_id = $request->product_id;
        $vendorproducts->vendorproduct_price = $request->vendorproduct_price;
        $vendorproducts->status = $request->status;
        $vendorproducts->save();
        return redirect()->route('vendor-product-index')->with('flash_success', 'Vendor Product Updated Successfully..!!');
    }

    public function vendordestroy($id)
    {
        $vendorproducts = VendorProducts::find($id);
        $vendorproducts->delete();
        return back()->with('flash_success', 'Vendor Product Deleted  Successfully!');
    }


}
