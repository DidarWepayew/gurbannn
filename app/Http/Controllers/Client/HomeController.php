<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')
            ->take(40)
            ->get();

        return view('client.home.index')
            ->with([
                'products' => $products,
            ]);
    }
}
