<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function __construct()
    {
        /* Actions for auth only */
        $this->middleware('auth');
    }

    public function wishlist()
    {
        $wishlists = Wishlist::all();
        $products = Product::all();
        $categories = Category::all();
        return view('wishlist', compact('categories', 'products', 'wishlists'));
    }

    /* ----------------------- */
    /* Add product in wishlist */
    /* ----------------------- */
    public function favorite($id)
    {
        /* preparing the data */
        $data = array();
        $data['user_id'] = Auth::user()->id;
        $data['product_id'] = $id;
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();
        /* add product in wishlist */
        Wishlist::insert($data);
        $notification = array(
            'message' => 'Товар добавлен в избранное',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* end add product in wishlist */

    /* ---------------------------- */
    /* Delete product from wishlist */
    /* ---------------------------- */
    public function destroy($id)
    {
        Wishlist::find($id)->forceDelete();
        $notification = array(
            'message' => 'Товар удален из избранного',
            'alert-type' => 'success'
        );
        /* to User's personal account */
        return Redirect()->back()->with($notification);
    }
    /* end delete product from wishlist */

}
