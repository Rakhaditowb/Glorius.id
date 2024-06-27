<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MobileLegendsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Mobile Legends',
            'slug' => 'mobile-legends',
            'image' => 'ml-icon.jpg',
            'status' => 'Tersedia',
            'description' => '<p>Mobile Legends</p>']);
        
        Item::create([
            'product_id' => '1',
            'name' => '40 Diamonds',
            'price'=> 10000,
            'image' => 'ml-pay.webp']);
        
        Item::create([
            'product_id' => '1',
            'name' => '85 Diamonds',
            'price'=> 22000,
            'image' => 'ml-pay.webp']);

        Item::create([
            'product_id' => '1',
            'name' => '170 Diamonds',
            'price'=> 43000,
            'image' => 'ml-pay.webp']);
        
        Item::create([
            'product_id' => '1',
            'name' => '408 Diamonds',
            'price'=> 105000,
            'image' => 'ml-pay.webp']);
            
        Item::create([
            'product_id' => '1',
            'name' => '875 Diamonds',
            'price'=> 220000,
            'image' => 'ml-pay.webp']);
        
        Item::create([
            'product_id' => '1',
            'name' => '4830 Diamonds',
            'price'=> 1140000,
            'image' => 'ml-pay.webp']);

        Payment::create([
            'product_id' => '1',
            'name' => 'QRIS',
            'image' => 'qris-logo.png',
            'qr_image' => 'qr.webp',]);
        
        Payment::create([
            'product_id' => '1',
            'name' => 'Gopay',
            'image' => 'gopay-logo.png',
            'qr_image' => 'qr.webp',]);
        
        Payment::create([
            'product_id' => '1',
            'name' => 'Shopee Pay',
            'image' => 'spay-logo.png',
            'qr_image' => 'qr.webp',]);
        
        Payment::create([
            'product_id' => '1',
            'name' => 'Dana',
            'image' => 'dana-logo.png',
            'qr_image' => 'qr.webp',]);

        Payment::create([
            'product_id' => '1',
            'name' => 'Ovo',
            'image' => 'ovo-logo.png',
            'qr_image' => 'qr.webp',]);

            
    }
}
