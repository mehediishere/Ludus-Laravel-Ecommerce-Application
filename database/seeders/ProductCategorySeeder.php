<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::get('https://dummyjson.com/products/categories');
        $responseData = $response->object();
        foreach ($responseData as $category) {
            ProductCategory::updateOrCreate([
                'category' => $category,
            ]);
        }
    }
}
