<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Size;

class SizeFill extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = [
        	['label' => 'XS'],
        	['label' => 'S'],
        	['label' => 'M'],
        	['label' => 'L'],
        	['label' => 'XL'],
        ];

        foreach($sizes as $size)
        {
        	Size::create($size);
        }
    }
}
