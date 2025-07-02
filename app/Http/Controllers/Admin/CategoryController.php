<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
    {
        public function index()
        {
            $categories = Category::orderBy('id', 'asc')->get();
            return view('admin.category.index', compact('categories'));
        }

        public function create()
        {
            return view('admin.category.create');
        }

        public function store(Request $request)
        {
            // dd($request->all());
            $slug = str_replace(['/', ' ', '\\', ','], '-', strtolower($request->name));
            $slug = preg_replace('/-+/', '-', $slug);

            // dd($request->all());
            $categories = new Category;
            $categories->name = $request->name;
            $categories->status = $request->status;
            $categories->slug = $slug;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $imageName = time() . '.' . $file->getClientOriginalExtension();
                $imagePath = 'category/' . $imageName;
                // Store the original image
                Storage::disk('public')->putFileAs('category', $file, $imageName);
                $categories->image = $imageName;
            }
            $categories->save();
            return redirect()->route('category-index')->with('flash_success', 'Category Added Successfully..!!');
        }

        public function edit($id)
        {
            $categories = Category::find($id);
            return view('admin.category.edit', compact('categories'));
        }

        public function update(Request $request)
        {
            $id = $request->id;
            $slug = str_replace(['/', ' ', '\\', ','], '-', strtolower($request->name));
            $slug = preg_replace('/-+/', '-', $slug);

            $categories = Category::find($id);
            $categories->name = $request->name;
            $categories->status = $request->status;
            $categories->slug = $slug;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $imageName = time() . '.' . $file->getClientOriginalExtension();
                $imagePath = 'category/' . $imageName;
                // Store the original image
                Storage::disk('public')->putFileAs('category', $file, $imageName);
                $categories->image = $imageName;
            }
            $categories->save();
            return redirect()->route('category-index')->with('flash_success', 'Category updated successfully');
        }

        public function destroy($id)
        {
            $categories = Category::find($id);
            $categories->delete();
            return back()->with('flash_success', 'Category Deleted  Successfully!');
        }
    }
