<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPaymentController extends Controller
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
            'image' => 'required',
            'qr_image' => 'required',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/payments', $fileName);
    
            $data['image'] = $fileName;
        }

        if ($request->hasFile('qr_image')) {
            $file = $request->file('qr_image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/payments', $fileName);
    
            $data['qr_image'] = $fileName;
        }

        $payment = Payment::create($data);

        if ($payment) {
            session()->flash('success', 'Payment berhasil ditambahkan!');

        } else {
            session()->flash('error', 'Payment gagal ditambahkan!');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $payments = $product->payments()->get();

        return view('pages.admin.payment.index', [
            'title' => 'Product - Item',
            'active' => 'product',
            'product' => $product,
            'payments' => $payments
        ]);
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
        $payment = Payment::find($id);
        $payment->product_id = $request->input('product_id', $payment->product_id);
        $payment->name = $request->input('name', $payment->name);
        $payment->type = $request->input('type', $payment->type);

        if ($request->hasFile('image')) {
            // Hapus file lama jika ada
            if ($payment->image) {
                Storage::disk('public')->delete('payments/' . $payment->image);
            }

            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/payments', $fileName);

            $payment->image = $fileName;
        }

        if ($request->hasFile('qr_image')) {
            // Hapus file lama jika ada
            if ($payment->qr_image) {
                Storage::disk('public')->delete('payments/' . $payment->qr_image);
            }

            $file = $request->file('qr_image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/payments', $fileName);

            $payment->qr_image = $fileName;
        }

        $payment->save();

        if ($payment) {
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
        $payment = Payment::find($id);

        if ($payment->image) {
            Storage::disk('public')->delete('payments/' . $payment->image);
        }

        if ($payment->qr_image) {
            Storage::disk('public')->delete('payments/' . $payment->qr_image);
        }

        $payment->delete();

        if ($payment) {
            session()->flash('success', 'Item berhasil dihapus!');
            
        } else {
            session()->flash('error', 'Item gagal dihapus!');
        }
        return redirect()->back();
    }
}
