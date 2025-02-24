<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('status', 'active')
            ->latest()
            ->take(8)
            ->get();
            
        $categories = Category::where('status', 'active')
            ->with('products')
            ->get();

        return view('home', compact('featuredProducts', 'categories'));
    }
}