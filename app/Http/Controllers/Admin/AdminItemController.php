<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/images', $fileName);
    
            $data['image'] = $fileName;
        }

        $item = Item::create($data);

        if ($item) {
            session()->flash('success', 'Item berhasil ditambahkan!');

        } else {
            session()->flash('error', 'Item gagal ditambahkan!');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Item::find($id);
        $item->product_id = $request->input('product_id', $item->product_id);
        $item->name = $request->input('name', $item->name);
        $item->price = $request->input('price', $item->price);

        if ($request->hasFile('image')) {
            // Hapus file lama jika ada
            if ($item->image) {
                Storage::disk('public')->delete('images/' . $item->image);
            }

            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/images', $fileName);

            $item->image = $fileName;
        }

        $item->save();

        if ($item) {
            session()->flash('success', 'Item berhasil diedit!');

        } else {
            session()->flash('error', 'Item gagal diedit!');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Item::find($id);
        
        if ($item->image) {
            Storage::disk('public')->delete('images/' . $item->image);
        }

        $item->delete();

        if ($item) {
            session()->flash('success', 'Item berhasil dihapus!');
            
        } else {
            session()->flash('error', 'Item gagal dihapus!');
        }
        return redirect()->back();
    }
}
