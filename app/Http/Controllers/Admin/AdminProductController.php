<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $tersedia = Product::where('status', 'Tersedia')->count();
        $habis = Product::where('status', 'Habis')->count();

        return view('pages.admin.product.index', [
            'title' => 'Dashboard - Products',
            'active' => 'product',
            'products' => $products,
            'tersedia' => $tersedia,
            'habis' => $habis
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.product.create', [
            'title' => 'Dashboard - Tambah Product',
            'active' => 'product'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // Membuat slug
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/images', $fileName);
    
            $data['image'] = $fileName;
        }

        $product = Product::create($data);

        if ($product) {
            session()->flash('success', 'Product berhasil ditambahkan!');

        } else {
            session()->flash('error', 'Product gagal ditambahkan!');
        }
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $items = $product->items()->get();

        return view('pages.admin.item.index', [
            'title' => 'Product - Item',
            'active' => 'product',
            'product' => $product,
            'items' => $items
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        return view('pages.admin.product.edit', [
            'title' => 'Dashboard - Edit Product',
            'active' => 'product',
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->name = $request->input('name', $product->name);
        $product->status = $request->input('status', $product->status);
        $product->description = $request->input('description', $product->description);

        $product['slug'] = Str::slug($request->name);


        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete('images/' . $product->image);
            }

            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/images', $fileName);

            $product->image = $fileName;
        }

        $product->save();

        if ($product) {
            session()->flash('success', 'Product berhasil diedit!');

        } else {
            session()->flash('error', 'Product gagal diedit!');
        }
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        
        if ($product->image) {
            Storage::disk('public')->delete('images/' . $product->image);
        }

        $product->delete();

        if ($product) {
            session()->flash('success', 'Product berhasil dihapus!');
             
        } else {
            session()->flash('error', 'Product gagal dihapus!');
        }
        return redirect()->route('product.index');
    }
}
