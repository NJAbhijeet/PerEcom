<?php

namespace App\Http\Controllers\Admin;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::orderBy('id', 'asc')->get();
        return view('admin.unit.index', compact('units'));
    }

    public function create()
    {
        return view('admin.unit.create');
    }

    public function store(Request $request)
    {

        $units = new Unit;
        $units->name = $request->name;
        $units->status = $request->status;
        $units->save();
        return redirect()->route('unit-index')->with('flash_success', 'Unit Added Successfully..!!');
    }

    public function edit($id)
    {
        $units = Unit::find($id);
        return view('admin.unit.edit', compact('units'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $slug = str_replace(['/', ' ', '\\', ','], '-', strtolower($request->name));
        $slug = preg_replace('/-+/', '-', $slug);

        $units = Unit::find($id);
        $units->name = $request->name;
        $units->status = $request->status;
        $units->save();
        return redirect()->route('unit-index')->with('flash_success', 'Unit updated successfully');
    }

    public function destroy($id)
    {
        $units = Unit::find($id);
        $units->delete();
        return back()->with('flash_success', 'Unit Deleted  Successfully!');
    }
}