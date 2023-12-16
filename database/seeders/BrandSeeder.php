<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $objs = [
            'SAMSUNG',
            'APPLE',
            'HUAWEI',
            'NOKIA',
            'SONY',
            'LG',
            'HTC',
            'MOTOROLA',
            'LENOVO',
            'XIAOMI',
            'GOOGLE',
            'OPPO',
            'REALME',
            'ONEPLUS',
            'VIVO',
            'MEIZU',
            'BLACKBERRY',
            'ASUS',
            'ALCATEL',
            'ZTE',
            'MICROSOFT',
            'VODAFONE',
        ];

        foreach ($objs as $obj) {
            $brand = Brand::create([
                'name' => $obj,
                'slug' => str()->random(5),
            ]);

            $brand->slug = str($brand->name)->slug() . '-' . $brand->id;
            $brand->update();
        }
    }
}
