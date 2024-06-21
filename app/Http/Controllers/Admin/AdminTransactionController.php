<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('product', 'user')->get();
        
        return view('pages.admin.transaction.index', [
            'title' => 'Dashboard - Transaksi',
            'active' => 'transaksi',
            'orders' => $orders
        ]);
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
        //
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
        $order = Order::find($id);
        $order->status = $request->input('status', $order->status);

        $order->save();

        if ($order) {
            session()->flash('success', 'Transaksi berhasil diedit!');

        } else {
            session()->flash('error', 'Transaksi gagal diedit!');
        }
        return redirect()->route('transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::find($id);

        if ($order->image) {
            Storage::disk('public')->delete('payments/' . $order->bukti_pembayaran);
        }

        $order->delete();

        if ($order) {
            session()->flash('success', 'Transaksi berhasil dihapus!');

        } else {
            session()->flash('error', 'Transaksi gagal dihapus!');
        }
        return redirect()->route('transaction.index');
    }
}
