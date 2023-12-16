<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function show($slug)
    {
        $obj = Brand::where('slug', $slug)
            ->firstOrFail();

        $products = Product::where('brand_id', $obj->id)
            ->orderBy('id', 'desc')
            ->paginate(40);

        return view('client.brand.show')
            ->with([
                'obj' => $obj,
                'products' => $products,
            ]);
    }
}
