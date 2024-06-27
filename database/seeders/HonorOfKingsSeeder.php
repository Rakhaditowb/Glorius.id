<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HonorOfKingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Honor Of Kings',
            'slug' => 'honor-of-kings',
            'image' => 'hok-icon.png',
            'status' => 'Tersedia',
            'description' => '<p>Honor Of Kings</p>']);
        
        Item::create([
            'product_id' => '3',
            'name' => '80 Tokens',
            'price'=> 12000,
            'image' => 'hok-pay.png']);
        
        Item::create([
            'product_id' => '3',
            'name' => '240 Tokens',
            'price'=> 42000,
            'image' => 'hok-pay.png']);

        Item::create([
            'product_id' => '3',
            'name' => '800 Tokens',
            'price'=> 115000,
            'image' => 'hok-pay.png']);
                
        Item::create([
            'product_id' => '3',
            'name' => '1200 Tokens',
            'price'=> 190000,
            'image' => 'hok-pay.png']);
        
        Item::create([
            'product_id' => '3',
            'name' => '2400 Tokens',
            'price'=> 425000,
            'image' => 'hok-pay.png']);
        
        Item::create([
            'product_id' => '3',
            'name' => '8000 Tokens',
            'price'=> 1150000,
            'image' => 'hok-pay.png']);

        Payment::create([
            'product_id' => '3',
            'name' => 'QRIS',
            'image' => 'qris-logo.png',
            'qr_image' => 'qr.png',]);
        
        Payment::create([
            'product_id' => '3',
            'name' => 'Gopay',
            'image' => 'gopay-logo.png',
            'qr_image' => 'qr.png',]);
        
        Payment::create([
            'product_id' => '3',
            'name' => 'Shopee Pay',
            'image' => 'spay-logo.png',
            'qr_image' => 'qr.png',]);
        
        Payment::create([
            'product_id' => '3',
            'name' => 'Dana',
            'image' => 'dana-logo.png',
            'qr_image' => 'qr.png',]);

        Payment::create([
            'product_id' => '3',
            'name' => 'Ovo',
            'image' => 'ovo-logo.png',
            'qr_image' => 'qr.png',]);
    }
}
