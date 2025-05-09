<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Unit;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('status', 'active')->get();
        $units = Unit::where('status', 'active')->get();
        return view('admin.products.create', compact('categories', 'units'));
    }

    public function store(Request $request)
    {


        // Generate a unique slug
        $slug = preg_replace('/-+/', '-', str_replace(['/', ' ', '\\', ','], '-', strtolower($request->product_name)));

        if (Product::where('slug', $slug)->exists()) {
            return back()->with('flash_error', 'Product Already Exists');
        }

        // Create the product
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->unit_id = $request->unit_id;
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->mrp = $request->mrp;
        $product->sp = $request->sp;
        $product->weight = $request->weight;
        $product->country_of_origin = $request->country_of_origin;
        $product->status = $request->status;
        $product->slug = $slug;
        $product->save();

        // Save product images if any
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $image) {
                $imagename = time() . '_' . $key . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('storage/product'), $imagename);

                $productImage = new ProductImage();
                $productImage->product_id = $product->id;
                $productImage->images = $imagename;
                $productImage->save();
            }
        }

        return redirect()->route('product-index')->with('success', 'Product added successfully.');
    }


    public function edit($id)
    {
        $categories = Category::where('status', 'active')->get();
        $units = Unit::where('status', 'active')->get();
        $products = Product::find($id);
        return view('admin.products.edit', compact('products', 'categories', 'units'));
    }

    public function update(Request $request, $id)
    {
        $slug = str_replace(['/', ' ', '\\', ','], '-', strtolower($request->product_name));
        $slug = preg_replace('/-+/', '-', $slug);
        if (Product::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            return back()->with('flash_error', 'Product Name already exists');
        } else {
            $products = Product::find($id);
            $products->category_id = $request->category_id;
            $products->unit_id = $request->unit_id;
            $products->product_name = $request->product_name;
            $products->description = $request->description;
            $products->mrp = $request->mrp;
            $products->sp = $request->sp;
            $products->weight = $request->weight;
            $products->country_of_origin = $request->country_of_origin;
            $products->status = $request->status;
            $products->slug = $slug;
            if ($request->hasfile('images')) {
                // dd('hi');
                $imgCount = 0;
                foreach ($request->file('images') as $key => $image) {
                    $imgCount++;
                    $file = $image;
                    $imagename = time() . $imgCount . "." . $file->getClientOriginalExtension();

                    $file->move(public_path('storage/product'), $imagename);

                    $filePath = 'storage/product/' . $imagename;

                    $product_images = new ProductImage;
                    $product_images->product_id = $products->id;
                    $product_images->images = $imagename;
                    $product_images->save();
                }
            }
            // dd($request->all());
            $products->save();
            return redirect()->route('product-index')->with('flash_success', 'product Updated Successfully');
        }
    }


    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return back()->with('success', 'Product deleted successfully.');
    }

    public function deleteSingleImage($id)
    {
        $product_image = ProductImage::find($id);
        $product_image->delete();
        return back()->with('flash_success', 'Image Deleted Successfully !');
    }
}
