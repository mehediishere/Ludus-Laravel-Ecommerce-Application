<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductBrand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = Product::select('brand')->get();
        foreach ($brands as $brn){
            if (ProductBrand::where('brand', $brn->brand)->first()) {
                ProductBrand::where('brand', $brn->brand)->increment('product_counts');
            }else{
                ProductBrand::create([
                    'brand' => $brn->brand
                ]);
            }
        }
    }
}
