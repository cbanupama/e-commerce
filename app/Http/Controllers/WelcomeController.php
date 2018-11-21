<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('welcome', compact('products'));
    }

    public function browse(string $slug)
    {
        $category = Category::where('slug', '=', $slug)->firstOrFail();
        $products = Product::where('category_id', '=', $category->id)->get();
        return view('browse', compact('products'));
    }

    public function item(string $slug)
    {
        $product = Product::where('slug', '=', $slug)->firstOrFail();
        return view('item', compact('product'));
    }
}
