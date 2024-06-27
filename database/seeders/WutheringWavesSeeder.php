<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WutheringWavesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Wuthering Waves',
            'slug' => 'wuthering-waves',
            'image' => 'ww-icon.png',
            'status' => 'Tersedia',
            'description' => '<p>Wuthering Waves</p>']);
        
        Item::create([
            'product_id' => '5',
            'name' => '60 Lunatic',
            'price'=> 15000,
            'image' => 'ww-pay.webp']);
        
        Item::create([
            'product_id' => '5',
            'name' => '300 Lunatic',
            'price'=> 70000,
            'image' => 'ww-pay.webp']);

        Item::create([
            'product_id' => '5',
            'name' => '980 Lunatic',
            'price'=> 210000,
            'image' => 'ww-pay.webp']);
        
        Item::create([
            'product_id' => '5',
            'name' => '1980 Lunatic',
            'price'=> 420000,
            'image' => 'ww-pay.webp']);
            
        Item::create([
            'product_id' => '5',
            'name' => '3280 Lunatic',
            'price'=> 700000,
            'image' => 'ww-pay.webp']);
        
        Item::create([
            'product_id' => '5',
            'name' => '6480 Lunatic',
            'price'=> 1400000,
            'image' => 'ww-pay.webp']);

        Payment::create([
            'product_id' => '5',
            'name' => 'QRIS',
            'image' => 'qris-logo.png',
            'qr_image' => 'qr.webp',]);
        
        Payment::create([
            'product_id' => '5',
            'name' => 'Gopay',
            'image' => 'gopay-logo.png',
            'qr_image' => 'qr.webp',]);
        
        Payment::create([
            'product_id' => '5',
            'name' => 'Shopee Pay',
            'image' => 'spay-logo.png',
            'qr_image' => 'qr.webp',]);
        
        Payment::create([
            'product_id' => '5',
            'name' => 'Dana',
            'image' => 'dana-logo.png',
            'qr_image' => 'qr.webp',]);

        Payment::create([
            'product_id' => '5',
            'name' => 'Ovo',
            'image' => 'ovo-logo.png',
            'qr_image' => 'qr.webp',]);
    }
}
