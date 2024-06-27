<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenshinImpactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Genshin Impact',
            'slug' => 'genshin-impact',
            'image' => 'gi-icon.jpg',
            'status' => 'Tersedia',
            'description' => '<p>Genshin Impact</p>']);
        
        Item::create([
            'product_id' => '6',
            'name' => '60 Genesis Crystal',
            'price'=> 12000,
            'image' => 'gi-pay.webp']);
        
        Item::create([
            'product_id' => '6',
            'name' => '330 Genesis Crystal',
            'price'=> 60000,
            'image' => 'gi-pay.webp']);

        Item::create([
            'product_id' => '6',
            'name' => '1090 Genesis Crystal',
            'price'=> 175000,
            'image' => 'gi-pay.webp']);
        
        Item::create([
            'product_id' => '6',
            'name' => '2240 Genesis Crystal',
            'price'=> 380000,
            'image' => 'gi-pay.webp']);
            
        Item::create([
            'product_id' => '6',
            'name' => '3880 Genesis Crystal',
            'price'=> 580000,
            'image' => 'gi-pay.webp']);
        
        Item::create([
            'product_id' => '6',
            'name' => '8080 Genesis Crystal',
            'price'=> 1200000,
            'image' => 'gi-pay.webp']);

        Payment::create([
            'product_id' => '6',
            'name' => 'QRIS',
            'image' => 'qris-logo.png',
            'qr_image' => 'qr.webp',]);
        
        Payment::create([
            'product_id' => '6',
            'name' => 'Gopay',
            'image' => 'gopay-logo.png',
            'qr_image' => 'qr.webp',]);
        
        Payment::create([
            'product_id' => '6',
            'name' => 'Shopee Pay',
            'image' => 'spay-logo.png',
            'qr_image' => 'qr.webp',]);
        
        Payment::create([
            'product_id' => '6',
            'name' => 'Dana',
            'image' => 'dana-logo.png',
            'qr_image' => 'qr.webp',]);

        Payment::create([
            'product_id' => '6',
            'name' => 'Ovo',
            'image' => 'ovo-logo.png',
            'qr_image' => 'qr.webp',]);
    }
}
