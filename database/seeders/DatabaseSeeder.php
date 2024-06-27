<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'roles' => 'admin'
        ]);
        
        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user1234'),
            'roles' => 'user'
        ]);

        User::factory(10)->create();

        $this->call([
            MobileLegendsSeeder::class,
            HonkaiStarSeeder::class,
            HonorOfKingsSeeder::class,
            ValorantSeeder::class,
            WutheringWavesSeeder::class,
            GenshinImpactSeeder::class,
            ClashRoyaleSeeder::class,
        ]);
        
    }
}
