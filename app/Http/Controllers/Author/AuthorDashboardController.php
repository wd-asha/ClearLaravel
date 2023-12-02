<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class AuthorDashboardController extends Controller
{

    public function __construct()
    {
        /* Actions for auth only */
        $this->middleware('auth');
    }

    /* ------------------------------------------------------- */
    /* User's personal account after authorization (not admin) */
    /* ------------------------------------------------------- */
    /* duplicate HomeController */
    public function index()
    {
        $orders = Order::all();
        return view('account', compact('orders'));
    }

}
