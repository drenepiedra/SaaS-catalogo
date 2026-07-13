<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();
        $categoriesCount = Category::where('user_id', $user->id)->count();
        $productsCount = Product::where('user_id', $user->id)->count();
        $recentProducts = Product::where('user_id', $user->id)
            ->with('category')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard.index', compact('categoriesCount', 'productsCount', 'recentProducts'));
    }
}
