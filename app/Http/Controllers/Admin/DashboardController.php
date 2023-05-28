<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalBrands = Brand::count();

        $totalAllUsers = User::count();
        $totalUsers = User::where('role_as', '0')->count();
        $totalAdmins = User::where('role_as', '1')->count();

        $todayDate = Carbon::now()->format('d-m-Y');
        $thisMonth = Carbon::now()->format('m');
        $thisYear = Carbon::now()->format('Y');

        $totalOrder = Order::count();
        $todayOrder = Order::whereDate('created_at', $todayDate)->count();
        $thisMonthOrder = Order::whereMonth('created_at', $thisMonth)->count();
        $thisYearOrder = Order::whereMonth('created_at', $thisYear)->count();

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalCategories',
            'totalBrands',
            'totalAllUsers',
            'totalUsers',
            'totalAdmins',
            'totalOrder',
            'todayOrder',
            'thisMonthOrder',
            'thisYearOrder'
        ));
    }
}
