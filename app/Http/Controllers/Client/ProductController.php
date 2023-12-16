<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\AttributeGroup;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($slug)
    {
        $obj = Product::where('slug', $slug)
            ->with(['brand', 'attributeValues.attribute.attributeGroup',
                'reviews' => function ($query) {
                    $query->when(auth()->check(), function ($query) {
                        $query->when(!auth()->user()->is_admin, function ($query) {
                            $query->where('status', 1)
                                ->orWhere('user_id', auth()->id());
                        });
                    }, function ($query) {
                        $query->where('status', 1);
                    });
                    $query->with('user');
                }])
            ->firstOrFail();

        return view('client.product.show')
            ->with([
                'obj' => $obj,
            ]);
    }


    public function compare(Request $request)
    {
        $request->validate([
            'phone1' => 'required|integer|min:1',
            'phone2' => 'nullable|integer|min:1',
            'phone3' => 'nullable|integer|min:1',
        ]);

        $attributeValues = [];
        $obj2 = null;
        $obj3 = null;

        $obj1 = Product::where('id', $request->phone1)
            ->with('brand', 'attributeValues:id')
            ->firstOrFail();
        $attributeValues[] = $obj1->attributeValues->pluck('id');

        if (isset($request->phone2)) {
            $obj2 = Product::where('id', $request->phone2)
                ->with('brand', 'attributeValues:id')
                ->firstOrFail();
            $attributeValues[] = $obj2->attributeValues->pluck('id');
        }

        if (isset($request->phone3)) {
            $obj3 = Product::where('id', $request->phone3)
                ->with('brand', 'attributeValues:id')
                ->firstOrFail();
            $attributeValues[] = $obj3->attributeValues->pluck('id');
        }

        $attributeValues = collect($attributeValues)->flatten()->unique()->values();


        $attributeGroups = AttributeGroup::with(['attributes.attributeValues' => function ($query) use ($attributeValues) {
            $query->whereIn('id', $attributeValues);
        }])
            ->orderBy('sort_order')
            ->get();

        return view('client.product.compare')
            ->with([
                'obj1' => $obj1,
                'obj2' => $obj2,
                'obj3' => $obj3,
                'attributeGroups' => $attributeGroups,
            ]);
    }
}
