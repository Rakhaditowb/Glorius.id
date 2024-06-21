<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('product', 'user')
            ->where('user_id', auth()->user()->id)->get();
        
        return view('pages.home.order', [
            'title' => 'Dashboard - Transaksi',
            'active' => 'transaksi',
            'orders' => $orders
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'userId' => 'required|string',
            'price' => 'required|numeric',
            'item' => 'required|string',
            'payment' => 'required|string',
            'bukti_pembayaran' => 'required|file|mimes:jpg,jpeg,png,webp',
        ]);
    
        $data = $request->all();
    
        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/payments', $fileName);
    
            $data['bukti_pembayaran'] = $fileName;
        }
    
        $order = Order::create($data);
    
        if ($order) {
            session()->flash('success', 'Transaksi berhasil!');
        } else {
            session()->flash('error', 'Transaksi gagal!');
        }
    
        return redirect()->route('order.index');
    }
}
