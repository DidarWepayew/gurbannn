<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class SortBrandCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'brand:sort';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sort brands for home page';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $brands = Product::selectRaw('brand_id, sum(viewed) as viewed')
            ->groupBy('brand_id')
            ->orderBy('viewed', 'desc')
            ->with('brand')
            ->get();

        for ($i = 0; $i < $brands->count(); $i++) {
            $brand = $brands[$i]->brand;
            $brand->sort_order = $i + 1;
            $brand->update();
        }

        return Command::SUCCESS;
    }
}
