<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.home.index', [
            'title' => 'Glorius.id',
            'active' => 'home',
        ]);
    }

    public function details($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        return view('pages.home.product', [
            'title' => 'Glorius.id',
            'active' => 'home',
            'product' => $product
        ]);
    }
}
