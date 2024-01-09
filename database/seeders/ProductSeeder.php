<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $products = [[
            'name'=>'Apple Macbook 16',
            'details'=>"Apple M1 Pro. 16 GPU, 16GB, 512 GB",
            'description'=>"The good product and many choices from people in tech",
            'brand'=>'Apple',
            'price'=>2000,
            'shipping_cost'=>25,
            'image_path'=>'storage/product.png'
        ],
        [
            'name'=>'Samsung Galaxy Book Pro',
            'details'=>"13.3 inch, 8GB, DDR4 SDRAM, 256GB ",
            'description'=>"The good product and many choices from people",
            'brand'=>'Samsung',
            'price'=>1400,
            'shipping_cost'=>25,
            'image_path'=>'storage/product2.png'
        ]
        ];
        foreach($products as $key => $product){
            Product::create($product);
        }
    }
}
