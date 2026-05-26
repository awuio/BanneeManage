<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard with compiled aggregate statistics.
     */
    public function __invoke()
    {
        $categoriesCount = Category::count();
        $productsCount = Product::count();
        $postsCount = Post::count();

        $totalStockValue = Product::sum(DB::raw('price * quantity'));

        // Count products that are out of stock
        $outOfStockCount = Product::where('quantity', 0)->count();

        // Count products with low stock (1-5 units)
        $lowStockCount = Product::whereBetween('quantity', [1, 5])->count();

        // Top 5 most viewed products
        $topProducts = Product::orderBy('views', 'desc')->take(5)->get();

        // Products grouped by category for the distribution chart
        $productsByCategory = Category::withCount('products')
            ->orderBy('products_count', 'desc')
            ->take(6)
            ->get();

        $recentProducts = Product::with('category')->latest()->take(5)->get();
        $recentPosts = Post::with('category')->latest()->take(5)->get();

        return view('dashboard', compact(
            'categoriesCount',
            'productsCount',
            'postsCount',
            'totalStockValue',
            'outOfStockCount',
            'lowStockCount',
            'topProducts',
            'productsByCategory',
            'recentProducts',
            'recentPosts'
        ));
    }
}
