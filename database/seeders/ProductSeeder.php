<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::get('https://dummyjson.com/products?limit=100');
        $responseData = $response->json();
        foreach ($responseData['products'] as $data){
            ProductCategory::where('category',$data['category'])->increment('product_count');
            Product::updateOrCreate([
                'title' => $data['title'],
                'description' => $data['description'],
                'price' => $data['price'],
                'discountPercentage' => $data['discountPercentage'],
                'rating' => $data['rating'],
                'stock' => $data['stock'],
                'brand' => $data['brand'],
                'category' => $data['category'],
                'thumbnail' => $data['thumbnail'],
                'images' => implode(',', $data['images']),
            ]);
        }
    }
}
