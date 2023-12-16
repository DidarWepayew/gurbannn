<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\Models\ProductView;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            BrandSeeder::class,
            AttributeSeeder::class,
        ]);

        User::factory(10)->create();
        Product::factory(100)
            ->has(ProductView::factory()->count(10))
            ->has(Review::factory()->count(5))
            ->create();

        $products = Product::with('productViews', 'reviews')
            ->orderBy('id')
            ->get();
        foreach ($products as $product) {
            $product->rating = round($product->reviews->where('status', 1)->avg('rating'), 2);
            $product->viewed = $product->productViews->sum('viewed');
            $product->update();
        }

        Artisan::command('php artisan brand:sort', function () {
            return 1;
        });
    }
}
