<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        $discountedProducts = Product::whereNotNull('discount_price')
            ->where('discount_price', '>', 0)
            ->get();
        return view('index', compact('categories', 'products', 'discountedProducts'));
    }
}
