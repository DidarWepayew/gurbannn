<?php

namespace Database\Factories;

use App\Models\AttributeGroup;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Configure the model factory.
     */
    public function configure(): static
    {
        return $this->afterMaking(function (Product $product) {
            // ...
        })->afterCreating(function (Product $product) {
            $attributeGroups = AttributeGroup::orderBy('sort_order')
                ->with('attributes.attributeValues')
                ->get();

            foreach ($attributeGroups as $attributeGroup) {
                foreach ($attributeGroup->attributes as $attribute) {
                    $attributeValues = $attribute->attributeValues->random(rand(1, 2))->pluck('id');
                    $product->attributeValues()->attach($attributeValues);
                }
            }

            $product->slug = str($product->name)->slug() . '-' . $product->id;
            $product->update();
        });
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $brand = Brand::inRandomOrder()->first();
        $name = fake()->streetSuffix();
        return [
            'brand_id' => $brand->id,
            'name' => $name,
            'slug' => str()->random(5),
            'recommended' => rand(1, 100),
        ];
    }
}
