<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClashRoyaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Clash Royale',
            'slug' => 'clash-royale',
            'image' => 'cr-icon.jpeg',
            'status' => 'Tersedia',
            'description' => '<p>Clash Royale</p>']);
        
        Item::create([
            'product_id' => '7',
            'name' => '80 Gems',
            'price'=> 12000,
            'image' => 'cr-pay.png']);
        
        Item::create([
            'product_id' => '7',
            'name' => '500 Gems',
            'price'=> 60000,
            'image' => 'cr-pay.png']);

        Item::create([
            'product_id' => '7',
            'name' => '1200 Gems',
            'price'=> 120000,
            'image' => 'cr-pay.png']);
        
        Item::create([
            'product_id' => '7',
            'name' => '2500 Gems',
            'price'=> 240000,
            'image' => 'cr-pay.png']);
            
        Item::create([
            'product_id' => '7',
            'name' => '7500 Gems',
            'price'=> 700000,
            'image' => 'cr-pay.png']);
        
        Item::create([
            'product_id' => '7',
            'name' => '14000 Gems',
            'price'=> 1200000,
            'image' => 'cr-pay.png']);

        Payment::create([
            'product_id' => '7',
            'name' => 'QRIS',
            'image' => 'qris-logo.png',
            'qr_image' => 'qr.png',]);
        
        Payment::create([
            'product_id' => '7',
            'name' => 'Gopay',
            'image' => 'gopay-logo.png',
            'qr_image' => 'qr.png',]);
        
        Payment::create([
            'product_id' => '7',
            'name' => 'Shopee Pay',
            'image' => 'spay-logo.png',
            'qr_image' => 'qr.png',]);
        
        Payment::create([
            'product_id' => '7',
            'name' => 'Dana',
            'image' => 'dana-logo.png',
            'qr_image' => 'qr.png',]);

        Payment::create([
            'product_id' => '7',
            'name' => 'Ovo',
            'image' => 'ovo-logo.png',
            'qr_image' => 'qr.png',]);
    }
}
