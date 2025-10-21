<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Category, Brand, Product, Variant, Review, User};
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Buat kategori
        $category = Category::create([
            'name' => 'Elektronik',
            'slug' => 'elektronik',
            'description' => 'Kategori barang elektronik',
        ]);

        // Buat brand
        $brand = Brand::create([
            'name' => 'Samsung',
            'slug' => 'samsung',
            'description' => 'Produk dari Samsung',
        ]);

        // Buat produk
        $product = Product::create([
            'name' => 'Samsung Galaxy S24',
            'slug' => 'samsung-galaxy-s24',
            'sku' => 'SGS24',
            'description' => 'Smartphone flagship terbaru dari Samsung.',
            'short_description' => 'HP premium 2025',
            'price' => 14999000,
            'stock' => 25,
            'category_id' => $category->id,
            'brand_id' => $brand->id,
            'status' => 'published',
            'is_featured' => true,
        ]);

        // Buat variasi produk
        Variant::create([
            'product_id' => $product->id,
            'name' => 'Warna Hitam 256GB',
            'sku' => 'SGS24-BLK256',
            'price' => 14999000,
            'stock' => 10,
            'attributes' => json_encode(['color' => 'Hitam', 'storage' => '256GB']),
        ]);

        // Buat user dummy (jika belum ada)
        $user = User::first() ?? User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        // Tambahkan review
        Review::create([
            'product_id' => $product->id,
            'user_id' => $user->id,
            'rating' => 5,
            'comment' => 'Produk keren banget, performanya mantap!',
            'is_approved' => true,
        ]);
    }
}
