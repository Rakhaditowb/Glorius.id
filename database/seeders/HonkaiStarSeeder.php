<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HonkaiStarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Honkai Star Rail',
            'slug' => 'honkai-star-rail',
            'image' => 'hsr-icon.png',
            'status' => 'Tersedia',
            'description' => '<p>Honkai Star Rail</p>']);
        
        Item::create([
            'product_id' => '2',
            'name' => '60 Oneiric Shard',
            'price'=> 15000,
            'image' => 'hsr-pay.webp']);
        
        Item::create([
            'product_id' => '2',
            'name' => '330 Oneiric Shard',
            'price'=> 70000,
            'image' => 'hsr-pay.webp']);

        Item::create([
            'product_id' => '2',
            'name' => '1090 Oneiric Shard',
            'price'=> 225000,
            'image' => 'hsr-pay.webp']);
        
        Item::create([
            'product_id' => '2',
            'name' => '2240 Oneiric Shard',
            'price'=> 430000,
            'image' => 'hsr-pay.webp']);
            
        Item::create([
            'product_id' => '2',
            'name' => '3880 Oneiric Shard',
            'price'=> 720000,
            'image' => 'hsr-pay.webp']);
        
        Item::create([
            'product_id' => '2',
            'name' => '8080 Oneiric Shard',
            'price'=> 1440000,
            'image' => 'hsr-pay.webp']);

        Payment::create([
            'product_id' => '2',
            'name' => 'QRIS',
            'image' => 'qris-logo.png',
            'qr_image' => 'qr.webp',]);
        
        Payment::create([
            'product_id' => '2',
            'name' => 'Gopay',
            'image' => 'gopay-logo.png',
            'qr_image' => 'qr.webp',]);
        
        Payment::create([
            'product_id' => '2',
            'name' => 'Shopee Pay',
            'image' => 'spay-logo.png',
            'qr_image' => 'qr.webp',]);
        
        Payment::create([
            'product_id' => '2',
            'name' => 'Dana',
            'image' => 'dana-logo.png',
            'qr_image' => 'qr.webp',]);

        Payment::create([
            'product_id' => '2',
            'name' => 'Ovo',
            'image' => 'ovo-logo.png',
            'qr_image' => 'qr.webp',]);
    }
}
