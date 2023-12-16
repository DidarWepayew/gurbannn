<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeGroup;
use App\Models\AttributeValue;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductView;
use App\Models\Review;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $objs = [
            ['name' => trans('app.products'), 'count' => Product::count()],
            ['name' => trans('app.reviews'), 'count' => Review::count()],
            ['name' => trans('app.brands'), 'count' => Brand::count()],
            ['name' => trans('app.attributes'), 'count' => AttributeGroup::count() . ' ' . Attribute::count() . ' ' . AttributeValue::count()],
            ['name' => trans('app.users'), 'count' => User::where('is_admin', 1)->count() . ' ' . User::where('is_admin', 0)->count()],
        ];

        $viewByDays = ProductView::where('date', '>', Carbon::today()->subWeek(1))
            ->selectRaw('count(id) as count, DATE(date) as day')
            ->groupBy('day')
            ->orderBy('day', 'desc')
            ->get();

        return view('admin.dashboard.index')
            ->with([
                'objs' => $objs,
                'viewByDays' => $viewByDays,
            ]);
    }
}
