<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // Total counts for key entities
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalStocks = Stock::sum('quantity'); // Sum of all stock quantities
        $totalWarehouses = DB::table('warehouses')->count();

        // Fetch categories and calculate total stock per category
        $categories = Category::all();
        $chartLabels = $categories->pluck('category_name')->toArray(); // Category names
        $chartData = $categories->map(function ($category) {
            return DB::table('products')
                ->join('stocks', 'products.id', '=', 'stocks.product_id')
                ->where('products.category_id', $category->id)
                ->sum('stocks.quantity');
        })->toArray();

        return view('home', compact(
            'totalProducts',
            'totalCategories',
            'totalStocks',
            'totalWarehouses',
            'chartLabels',
            'chartData'
        ));
    }
    public function getChartData()
    {
        // Fetch categories and calculate total stock per category
        $categories = Category::all();
        $chartLabels = $categories->pluck('category_name')->toArray(); // Category names
        $chartData = $categories->map(function ($category) {
            return DB::table('products')
                ->join('stocks', 'products.id', '=', 'stocks.product_id')
                ->where('products.category_id', $category->id)
                ->sum('stocks.quantity');
        })->toArray();

        return response()->json([
            'labels' => $chartLabels,
            'data' => $chartData,
        ]);
    }
}




