<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product\Product;

class ProductFill extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
        	[
        		'name' => 'Convense / Polo',
        		'categoryId' => 1,
        		'price' => 22.9,
        		'viewCount' => 89,
        		'saleCount' => 12,
        		'online' => true,
        		'az' => [
        			'description' => 'AZ desc'
        		],
        		'en' => [
        			'description' => 'RU desc'
        		]
        	],
        	[
        		'name' => 'Tommy Hilfigher',
        		'categoryId' => 1,
        		'price' => 22.9,
        		'viewCount' => 89,
        		'saleCount' => 12,
        		'online' => true,
        		'az' => [
        			'description' => 'AZ desc'
        		],
        		'en' => [
        			'description' => 'RU desc'
        		]
        	]
        ];

        foreach($products as $product)
        {
        	Product::create($product);
        }
    }
}
