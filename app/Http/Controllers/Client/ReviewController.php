<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $objs = Review::where('user_id', auth()->id())
            ->orderBy('id', 'desc')
            ->with('product', 'user')
            ->get();

        return view('client.review.index')
            ->with([
                'objs' => $objs,
            ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|min:1',
            'rating' => 'required|integer|between:0,5',
            'comment' => 'required|string|between:5,255',
        ]);

        $obj = new Review();
        $obj->user_id = auth()->id();
        $obj->product_id = $request->product_id;
        $obj->rating = $request->rating;
        $obj->comment = $request->comment;
        $obj->status = auth()->user()->is_admin ? 1 : 0;
        $obj->save();

        return redirect()->back()
            ->with([
                'success' => 'Thanks!',
            ]);
    }
}
