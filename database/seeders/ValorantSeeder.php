<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ValorantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Valorant',
            'slug' => 'valorant',
            'image' => 'valorant-icon.jpg',
            'status' => 'Tersedia',
            'description' => '<p>Valorant</p>']);
        
        Item::create([
            'product_id' => '4',
            'name' => '125 Vp',
            'price'=> 15000,
            'image' => 'valorant-pay.webp']);
        
        Item::create([
            'product_id' => '4',
            'name' => '420 Vp',
            'price'=> 45000,
            'image' => 'valorant-pay.webp']);

        Item::create([
            'product_id' => '4',
            'name' => '700 Vp',
            'price'=> 75000,
            'image' => 'valorant-pay.webp']);
                
        Item::create([
            'product_id' => '4',
            'name' => '1475 Vp',
            'price'=> 145000,
            'image' => 'valorant-pay.webp']);
        
        Item::create([
            'product_id' => '4',
            'name' => '2400 Vp',
            'price'=> 240000,
            'image' => 'valorant-pay.webp']);
        
        Item::create([
            'product_id' => '4',
            'name' => '6000 Vp',
            'price'=> 570000,
            'image' => 'valorant-pay.webp']);

        Payment::create([
            'product_id' => '4',
            'name' => 'QRIS',
            'image' => 'qris-logo.png',
            'qr_image' => 'qr.webp',]);
        
        Payment::create([
            'product_id' => '4',
            'name' => 'Gopay',
            'image' => 'gopay-logo.png',
            'qr_image' => 'qr.webp',]);
        
        Payment::create([
            'product_id' => '4',
            'name' => 'Shopee Pay',
            'image' => 'spay-logo.png',
            'qr_image' => 'qr.webp',]);
        
        Payment::create([
            'product_id' => '4',
            'name' => 'Dana',
            'image' => 'dana-logo.png',
            'qr_image' => 'qr.webp',]);

        Payment::create([
            'product_id' => '4',
            'name' => 'Ovo',
            'image' => 'ovo-logo.png',
            'qr_image' => 'qr.webp',]);
    }
}
