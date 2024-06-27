<?php

namespace App\Http\Controllers;

use App\Models\Item;
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
    
        $order = Order::create([
            'user_id' => $data['user_id'],
            'code' => $data['code'],
            'product_id' => $data['product_id'],
            'userId' => $data['userId'],
            'serverId' => $data['serverId'] ?? null,
            'price' => Item::find($request->item)->price,
            'item_id' => Item::find($request->item)->id,
            'payment' => $data['payment'],
            'bukti_pembayaran' => $data['bukti_pembayaran'],
        ]);
    
        if ($order) {
            session()->flash('success', 'Transaksi berhasil!');
        } else {
            session()->flash('error', 'Transaksi gagal!');
        }
    
        return redirect()->route('order.index');
    }
}
