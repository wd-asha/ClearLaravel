<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;

class WelcomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::latest()->where('news', 'LIKE', '1')->orderBy('id', 'asc')->paginate(6);
        $wishlists = Wishlist::all();
        return view('welcome', compact('categories', 'products', 'wishlists'));
    }

    public function categories()
    {
        $categories = Category::all();
        return view('categories', compact('categories'));
    }

    public function category($id)
    {
        $category = Category::find($id);
        $products = Product::all()->where('category_id', 'LIKE', $id);
        $wishlists = Wishlist::all();
        return view('category', compact('category', 'products', 'id', 'wishlists'));
    }

    public function products()
    {
        $categories = Category::all();
        $products = Product::latest()->paginate(6);
        $wishlists = Wishlist::all();
        return view('products', compact('categories', 'products', 'wishlists'));
    }

    public function product($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        $wishlists = Wishlist::all();
        return view('product', compact('categories', 'product', 'wishlists'));
    }

    public function delivery()
    {
        return view('delivery');
    }

    public function wash()
    {
        return view('wash');
    }

    public function promo()
    {
        $categories = Category::all();
        $products = Product::all()->where('promo', 'LIKE', '1');
        return view('promo', compact('categories', 'products'));
    }

    public function contacts()
    {
        return view('contacts');
    }
}
