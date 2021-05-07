<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Product\ProductImage;

class ProductImageFill extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = [
        	[
        		'productId' => 1,
        		'disk' => 'uploads',
        		'path' => '/products/images/1/photo-1619593593542-0fe36df281eb.jpg',
        	],
        	[
        		'productId' => 1,
        		'disk' => 'uploads',
        		'path' => '/products/images/1/photo-1619789397529-ec50c3588876.jpg',
        	],
        	[
        		'productId' => 1,
        		'disk' => 'uploads',
        		'path' => '/products/images/1/photo-1620000617495-02d687f9ecec.jpg',
        	],
        	[
        		'productId' => 2,
        		'disk' => 'uploads',
        		'path' => '/products/images/2/photo-1619694773412-64dd5bb9159d.jpg',
        	],
        	[
        		'productId' => 2,
        		'disk' => 'uploads',
        		'path' => '/products/images/2/photo-1620000617495-02d687f9ecec.jpg',
        	],
        	[
        		'productId' => 2,
        		'disk' => 'uploads',
        		'path' => '/products/images/2/photo-1619870332593-50c9960c66c7.jpg',
        	],
        ];

        foreach($images as $image)
        {
        	ProductImage::create($image);
        }
    }
}
